<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Tinify\Tinify;
use Tinify\Source;

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
        return view('slider.index', $data);
    }

    public function create()
    {
        $data['pagename'] = __('dash.slider') . ' ' . __('dash.add');
        return view('slider.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_title' => 'required',
            'en_title' => 'required',
            'ar_desc' => 'required',
            'en_desc' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/sliders");

            // حفظ الصورة مؤقتًا
            $imageFile->move($destinationPath, $imageName);
            $originalPath = $destinationPath . DIRECTORY_SEPARATOR . $imageName;

            // ضغط الصورة باستخدام TinyPNG
            try {
                Tinify::setKey(env('TINYPNG_API_KEY'));
                $source = Source::fromFile($originalPath);
                $source->toFile($originalPath);
            } catch (\Tinify\Exception $e) {
                return back()->with('error', 'Error compressing image: ' . $e->getMessage());
            }

            $data['image'] = $imageName;
        }

        Slider::create($data);

        toast(__('dash.store-success'), 'success');
        return redirect()->route('slider.create');
    }

    public function edit($id)
    {
        $data['slider'] = Slider::findOrFail($id);
        $data['pagename'] = __('dash.slider') . ' ' . __('dash.edit');
        return view('slider.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $data = $request->validate([
            'ar_title' => 'required',
            'en_title' => 'required',
            'ar_desc' => 'required',
            'en_desc' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // التحقق مما إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            $oldImage = public_path("images/sliders/" . $slider->image);

            // حذف الصورة القديمة
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/sliders");

            // حفظ الصورة مؤقتًا
            $imageFile->move($destinationPath, $imageName);
            $originalPath = $destinationPath . DIRECTORY_SEPARATOR . $imageName;

            // ضغط الصورة باستخدام TinyPNG
            try {
                Tinify::setKey(env('TINYPNG_API_KEY'));
                $source = Source::fromFile($originalPath);
                $source->toFile($originalPath);
            } catch (\Tinify\Exception $e) {
                return back()->with('error', 'Error compressing image: ' . $e->getMessage());
            }

            $data['image'] = $imageName;
        }

        $slider->update($data);

        toast(__('dash.edit-success'), 'success');
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $image = public_path("images/sliders/" . $slider->image);

        if (File::exists($image)) {
            File::delete($image);
        }

        $slider->delete();

        toast(__('dash.delete-success'), 'success');
        return redirect()->route('slider.index');
    }
}
