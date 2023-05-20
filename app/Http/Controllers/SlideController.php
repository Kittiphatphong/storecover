<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Slide;
use App\Http\Controllers\Trail\UploadImage;
use Illuminate\Support\Facades\Auth;

class SlideController extends Controller
{

    public function __construct()
    {
        if (Auth::user()->user_type != 'admin'){
            return abort(404);
        }
    }

    use UploadImage;
    public function index()
    {
        return view('slide.listSlide')
            ->with('list_slides',Slide::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSlideRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlideRequest $request)
    {
        $slide = new Slide();
        $slide->slide($request);
        $slide->image = $this->upload($request,'slide_images');
        $slide->save();

        return back()->with('success','ສໍາເລັດ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::find($id);
        $status = $slide->status;
        if($status == 0){
            $slide->status = 1;

        }else{
            $slide->status = 0;
        }
        $slide->save();
        return  back()->with('success','ສໍາເລັດ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('slide.editSlide')
            ->with('list_slides','list_slides')
            ->with('edit',Slide::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSlideRequest  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlideRequest $request, $id)
    {
        $slider = Slide::find($id);
        $slider->slide($request);
        if($request->image){
            $slider->image = $this->editImage($request,$slider->image,'slide_images');
        }

        $slider->save();

        return redirect()->route('slide.index')->with('success','ສໍາເລັດ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $this->deleteImageJ($slide->image,'slide_images');
        $slide->delete();
        return back()->with('success','ສໍາເລັດ');
    }
}
