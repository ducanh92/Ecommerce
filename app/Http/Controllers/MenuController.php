<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecursive;
use App\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $menuRecursive;
    private $menus;

    public function __construct(MenuRecursive $menuRecursive, Menu $menus)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menus = $menus;
    }

    public function index()
    {
        $menus = $this->menus->paginate(5);
        return view('admin.menu.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuOptions = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menu.add')->with('menuOptions', $menuOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menus->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('menus.create');
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
    public function edit(Menu $menu)
    {
        $htmlOptions = $this->menuRecursive->menuRecursiveEdit($menu->parent_id);
        return view('admin.menu.edit')->with([
            'menu' => $menu,
            'htmlOptions' => $htmlOptions
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function delete($id)
    {
        $this->menus->find($id)->delete();

        return redirect()->route('menus.index');
    }
}
