<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Tinify\Tinify;
use Tinify\Source;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['pagename'] = __('dash.sections');
        $data['sections']  = Section::whereHas('children')->withCount('children')->latest()->get();
        return view('sections.test', $data);
    }

    public function test()
    {
        $data['pagename'] = __('dash.sections');
        $data['sections']  = Section::whereHas('children')->withCount('children')->latest()->get();
        return view('sections.test', $data);
    }

    public function test2($section_id)
    {
        $data['pagename'] = __('dash.sections');
        $data['sections']  = Section::where('parent_id', $section_id)->latest()->get();
        return view('sections.test2', $data);
    }

    public function create()
    {
        $data['pagename'] = __('dash.add') . ' ' . __('dash.sections');
        $data['parents']   = Section::get();
        return view('sections.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'parent_id' => 'nullable|integer',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty($request->parent_id)) {
            $parentExists = Section::where('id', $request->parent_id)->exists();
            if (!$parentExists) {
                return back()->with('error', '❌ Error: The selected parent section does not exist.');
            }
        } else {
            $data['parent_id'] = null;
        }

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/sctions");

            $imageFile->move($destinationPath, $imageName);
            $originalPath = $destinationPath . DIRECTORY_SEPARATOR . $imageName;

            try {
                Tinify::setKey(env('TINYPNG_API_KEY'));
                $source = Source::fromFile($originalPath);
                $source->toFile($originalPath);
            } catch (\Tinify\Exception $e) {
                return back()->with('error', 'Error compressing image: ' . $e->getMessage());
            }

            $data['image'] = $imageName;
        }

        Section::create($data);

        toast(__('dash.store-success'), 'success');
        return redirect()->route('section.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['section'] = Section::findOrFail($id);
        $data['pagename'] = __('dash.edit') . ' ' . __('dash.sections');
        $data['parents']   = Section::where('id', '!=', $data['section']->id)->get();
        return view('sections.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        $data = $request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'parent_id' => 'nullable|integer',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty($request->parent_id)) {
            $parentExists = Section::where('id', $request->parent_id)->exists();
            if (!$parentExists) {
                return back()->with('error', '❌ Error: The selected parent section does not exist.');
            }
        } else {
            $data['parent_id'] = null;
        }

        if ($request->hasFile('image')) {
            $oldImage = public_path("images/sctions/" . $section->image);

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $imageFile = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->extension();
            $destinationPath = public_path("images/sctions");

            $imageFile->move($destinationPath, $imageName);
            $originalPath = $destinationPath . DIRECTORY_SEPARATOR . $imageName;

            try {
                Tinify::setKey(env('TINYPNG_API_KEY'));
                $source = Source::fromFile($originalPath);
                $source->toFile($originalPath);
            } catch (\Tinify\Exception $e) {
                return back()->with('error', 'Error compressing image: ' . $e->getMessage());
            }

            $data['image'] = $imageName;
        }

        $section->update($data);

        toast(__('dash.edit-success'), 'success');
        return redirect()->route('section.index');
    }

    public function sectionSettings()
    {
        $data['sections_num'] = \DB::table('settings')->select('sections_num')->get();
        $data['sections'] = Section::select('id', 'image', 'ar_name', 'en_name', 'sort')->whereHas('children')->where('status', 'active')->get();
        return view('sections.settings', $data);
    }

    public function saveSectionSettings(Request $request)
    {
        $request->validate([
            'sort' => 'int|unique:sections,sort',
        ]);

        if ($request->has('sections_num')) {
            \DB::table('settings')->update([
                'sections_num' => $request->sections_num,
            ]);

            toast(__('dash.edit-success'), 'success');
            return redirect()->route('section.setting');
        }

        if ($request->has('sort')) {
            $section  = Section::findOrFail($request->section_id);
            $section->sort = $request->sort;
            $section->save();

            toast(__('dash.edit-success'), 'success');
            return redirect()->route('section.setting');
        }
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $image = public_path("images/sctions/" . $section->image);

        if (File::exists($image)) {
            File::delete($image);
        }

        $section->delete();

        toast(__('dash.delete-success'), 'success');
        return redirect()->route('section.index');
    }
}
