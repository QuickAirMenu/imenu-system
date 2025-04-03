<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data['pagename'] =  __('dash.sections');
        $data['sections']  = Section::whereHas('children')->withCount('children')->latest()->get();
        return view('sections.test',$data);
    }

    public function test()
    {
        $data['pagename'] =  __('dash.sections');
        $data['sections']  = Section::whereHas('children')->withCount('children')->latest()->get();
        return view('sections.test',$data);
    }

    public function test2($section_id)
    {
        $data['pagename'] =  __('dash.sections');
        $data['sections']  = Section::where('parent_id',$section_id)->latest()->get();
        return view('sections.test2',$data);
    }


    public function create()
    {
        $data['pagename'] =  __('dash.add').' '.__('dash.sections');
        $data['parents']   = Section::get();
        return view('sections.create',$data);
    }

    public function store(Request $request)
    {
        $data =$request->validate([
            'ar_name' => 'required',
            'en_name' => 'required',
            'parent_id' => 'int',
            'status' => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images" . DIRECTORY_SEPARATOR . "sctions"), $imageName);
            $request->image = $imageName;
        }

        $section = new Section();
        $section->ar_name = $request->ar_name;
        $section->en_name = $request->en_name;
        $section->image = $request->image;

        if($request->parent_id){
         $section->parent_id = $request->parent_id;
        }
        $section->status = $request->status;
        $section->save();
        toast(__('dash.store-success'),'success');
        return redirect()->route('section.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data['section'] = Section::findOrfail($id);
        $data['pagename'] = __('dash.edit').' '.__('dash.sections');
        $data['parents']   = Section::where('id','!=',$data['section']->id)->get();
        return view('sections.edit',$data);
    }


    public function update(Request $request,$id)
    {
        $section = Section::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sctions' . DIRECTORY_SEPARATOR . $section->image);

        if ($request->hasFile('image')) {

            if (File::exists($image)) {
                File::delete($image);
            }

            $imagePath = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $request->file("image")->extension();
            $path = $request->file('image')
                ->move(public_path("images/sctions"), $imageName);
            $request->image = $imageName;
            $section->image = $imageName;
        }

        if($request->parent_id){
         $section->parent_id = $request->parent_id;
        } else {
            $section->parent_id = null;
        }

        $section->ar_name = $request->ar_name;
        $section->en_name = $request->en_name;
       // $section->parent_id = $request->parent_id;
        $section->status = $request->status;

        $section->save();

        toast(__('dash.edit-success'),'success');;
        return redirect()->route('section.index');
    }

    public function sectionSettings()
    {
        $data['sections_num'] = \DB::table('settings')->select('sections_num')->get();

        $data['sections'] = Section::select('id','image','ar_name','en_name','sort')->whereHas('children')->where('status','active')->get();

        return view('sections.settings',$data);
    }

    public function saveSectionSettings(Request $request)
    {

        $request->validate([

            'sort' => 'int|unique:sections,sort',

            ]);


        if($request->has('sections_num')){

            \DB::table('settings')->update([

                'sections_num' => $request->sections_num,

            ]);

           toast(__('dash.edit-success'),'success');

           return redirect()->route('section.setting');
        }

       if($request->has('sort')){

           $section  = Section::findOrfail($request->section_id);

           $section->sort = $request->sort;

           $section->save();

           toast(__('dash.edit-success'),'success');

           return redirect()->route('section.setting');
       }
    }

    public function destroy($id)
    {
        $type = Section::findOrFail($id);
        $image = public_path('images' . DIRECTORY_SEPARATOR . 'sctions' . DIRECTORY_SEPARATOR . $type->image);

        if (File::exists($image)) {
            File::delete($image);
        }
        $type->delete();

        toast(__('dash.delete-success'),'success');
        return redirect()->route('section.index');
    }
}
