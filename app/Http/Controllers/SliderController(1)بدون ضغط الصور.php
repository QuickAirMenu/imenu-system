<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['pagename'] = __('dash.slider');
        $data['sliders']  = Slider::all();
        return view('slider.index',$data);
    }

    public function create()
    {
        $data['pagename'] = __('dash.slider').' '.__('dash.add');
        return view('slider.create',$data);
    }

    public function store(Request $request)
    {
        $data =$request->validate([
            'ar_title' => 'required',
            'en_title' => 'required',
            'ar_desc' => 'required',
            'en_desc' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images" . DIRECTORY_SEPARATOR . "sliders"), $imageName);
            $request->image = $imageName;
        }

        Slider::create([
            'ar_title' => $request->ar_title,
            'en_title' => $request->en_title,
            'ar_desc' => $request->ar_desc,
            'en_desc' => $request->en_desc,
            'image' => $request->image,

        ]);
       toast(__('dash.store-success'), 'success');
        return redirect()->route('slider.create');


    }

    public function edit($id)
    {
        $data['slider'] = Slider::findOrfail($id);
        $data['pagename'] = __('dash.slider').' '.__('dash.edit');
        return view('slider.edit',$data);
    }

    public function update(Request $request ,$id)
    {
        $slider = Slider::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sliders' . DIRECTORY_SEPARATOR . $slider->image);

        if ($request->hasFile('image')) {

            if (File::exists($image)) {
                File::delete($image);
            }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/sliders"), $imageName);
            $request->image = $imageName;
            $slider->image = $imageName;
        }


        $slider->ar_title = $request->ar_title;
        $slider->en_title = $request->en_title;
        $slider->ar_desc = $request->ar_desc;
        $slider->en_desc = $request->en_desc;



        $slider->save();

        toast(__('dash.edit-success'), 'success');
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $type = Slider::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sliders' . DIRECTORY_SEPARATOR . $type->image);

        if (File::exists($image)) {
            File::delete($image);
        }
        $type->delete();
       toast(__('dash.delete-success'), 'success');;
        return redirect()->route('slider.index');
    }
}
