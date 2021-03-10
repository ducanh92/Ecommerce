<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelInstanceTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use DeleteModelInstanceTrait;

    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(5);

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPermissions = $this->permission->where('parent_id', 0)->get();

        return view('admin.role.add', compact('parentPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $role = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
    
            $role->permissions()->attach($request->permission_id);
    
            return redirect()->route('roles.index');
        }
        catch(\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine() . '.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $parentPermissions = $this->permission->where('parent_id', 0)->get();
        $checkedPermissions = $role->permissions;

        return view('admin.role.edit', compact('role', 'parentPermissions', 'checkedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        try{
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);
    
            $role->permissions()->sync($request->permission_id);

            DB::commit();
    
            return redirect()->route('roles.index');
        }
        catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine() . '.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        return $this->deleteInstance($role);
    }
}
