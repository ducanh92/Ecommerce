<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelInstanceTrait;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use StorageImageTrait, DeleteModelInstanceTrait;

    private $slider;
    
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->paginate(5);

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderAddRequest $request)
    {
        try {
            $dataCreateSlider = [
                'name' => $request->name,
                'description' => $request->description,
            ];
    
            $dataSliderImageUpload = $this->storageUploadTrait($request, 'image_path', 'slider');
    
            if( !empty($dataSliderImageUpload) ){
                $dataCreateSlider['image_path'] = $dataSliderImageUpload['file_path'];
                $dataCreateSlider['image_name'] = $dataSliderImageUpload['file_name'];
            }
    
            $this->slider->create($dataCreateSlider);
        }
        catch (\Exception $exception) {
            Log::error('Error: ' . $exception->getMessage() . '. Line: ' . $exception->getLine);
        }

        return redirect()->route('slider.create');
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        try {
            $dataUpdateSlider = [
                'name' => $request->name,
                'description' => $request->description,
            ];
    
            $dataSliderImageUpload = $this->storageUploadTrait($request, 'image_path', 'slider');
    
            if( !empty($dataSliderImageUpload) ){
                $dataUpdateSlider['image_path'] = $dataSliderImageUpload['file_path'];
                $dataUpdateSlider['image_name'] = $dataSliderImageUpload['file_name'];
            }
    
            $slider->update($dataUpdateSlider);
        }
        catch (\Exception $exception) {
            Log::error('Error: ' . $exception->getMessage() . '. Line: ' . $exception->getLine());
        }

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        return $this->deleteInstance($slider);
    }
}
