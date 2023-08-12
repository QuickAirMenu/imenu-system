<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index',['setting' => DB::table('settings')->select('*')->get(), 'pagename'=>__('dash.general-settings')]);
    }

    public function update(Request $request)
    {
        $settings =  $request->validate([

            'site_name'             =>'required',
            'logo'                  =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone'                 =>'required',
            'facebook'              =>'required',
            'twitter'               =>'required',
            'instagram'             =>'required',
            'tiktok'                =>'required',
            

            'meta_tag'              =>'required',
            'meta_desc'             =>'required',
            'social_status'         =>'required',
        ]);

        if ($request->hasFile('logo')) {
            $logo_old = DB::table('settings')->select('logo')->get();

            $image_old = public_path('images'.DIRECTORY_SEPARATOR.'settings'.DIRECTORY_SEPARATOR.$logo_old[0]->logo);

            //delete Old Image Form disk //1668330097-.jpg

            if(File::exists($image_old)) {
                File::delete($image_old);

            }

            $imagePath = $request->file('logo');
            $imageName = time() . '-' . $request->user_name . '.' . $request->file("logo")->extension();
            $path = $request->file('logo')
                ->move(public_path("images".DIRECTORY_SEPARATOR."settings"), $imageName);
            $request->logo_iamge = $imageName;


            $settings['logo']  = $imageName;

        }

        DB::table('settings')->update($settings);
        toast('تم حفظ الاعدادت','success');
        return redirect()->back();
    }
}
