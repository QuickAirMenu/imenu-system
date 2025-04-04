<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Tinify\Tinify;
use Tinify\Source;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['pagename'] = __('dash.meals');
        $data['meals']  = Meal::with('section')->latest()->get();
        return view('meals.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pagename'] = __('dash.add-meals');
        $data['sections'] = Section::whereHas('children')->get();
        return view('meals.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'price' => 'required|integer',
            'section_id' => 'required|integer',
            'children_id' => 'required|integer',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/meals");

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

        Meal::create($data);

        toast(__('dash.store-success'), 'success');
        return redirect()->route('meal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['meal'] = Meal::findOrFail($id);
        $data['sections'] = Section::all();
        $data['pagename'] = __('dash.edit') . ' ' . __('dash.meals');
        return view('meals.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['meal'] = Meal::findOrFail($id);
        $data['meal']->load(['section', 'chsection']);
        $data['sections'] = Section::whereHas('children')->get();
        $data['pagename'] = __('dash.edit') . ' ' . __('dash.meals');
        return view('meals.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meal = Meal::findOrFail($id);

        $data = $request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'price' => 'required|integer',
            'section_id' => 'required|integer',
            'children_id' => 'required|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // التحقق مما إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            $oldImage = public_path("images/meals/" . $meal->image);

            // حذف الصورة القديمة
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/meals");

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

        $meal->update($data);

        toast(__('dash.edit-success'), 'success');
        return redirect()->route('meal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Meal::findOrFail($id);
        $image = public_path('images/meals/' . $type->image);

        if (File::exists($image)) {
            File::delete($image);
        }

        $type->delete();
        toast(__('dash.delete-success'), 'success');
        return redirect()->route('meal.index');
    }
}
