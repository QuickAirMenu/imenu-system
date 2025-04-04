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
    $settings = $request->validate([
        'site_name'         => 'required',
        'logo'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'icon'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'preloading'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'phone'             => 'nullable|url',
        'facebook'          => 'nullable|url',
        'twitter'           => 'nullable|url',
        'instagram'         => 'nullable|url',
        'tiktok'            => 'nullable|url',
        'meta_tag'          => 'required',
        'meta_desc'         => 'required',
        'primary_color'     => 'required',
        'default_color'     => 'required',
        'social_status'     => 'required',
        'scndry_color'      => 'required',
    ]);

    if ($request->hasFile('logo')) {
        $logo_old = DB::table('settings')->select('logo')->get();
        $image_old = public_path('images' . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . $logo_old[0]->logo);

        if (File::exists($image_old)) {
            File::delete($image_old);
        }

        $imagePath = $request->file('logo');
        $imageName = time() . '-' . $request->user_name . '.' . $request->file("logo")->extension();

        if ($imagePath->move(public_path("images" . DIRECTORY_SEPARATOR . "settings"), $imageName)) {
            $settings['logo'] = $imageName;
        }
    }

    if ($request->hasFile('icon')) {
        $icon_old = DB::table('settings')->select('icon')->get();
        $image_old2 = public_path('images' . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . $icon_old[0]->icon);

        if (File::exists($image_old2)) {
            File::delete($image_old2);
        }

        $imagePath2 = $request->file('icon');
        $imageName2 = time() . '-' . $request->user_name . '.' . $request->file("icon")->extension();

        if ($imagePath2->move(public_path("images" . DIRECTORY_SEPARATOR . "settings"), $imageName2)) {
            $settings['icon'] = $imageName2;
        }
    }

    if ($request->hasFile('preloading')) {
        $preloading_old = DB::table('settings')->select('preloading')->get();
        $image_old3 = public_path('images' . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . $preloading_old[0]->preloading);

        if (File::exists($image_old3)) {
            File::delete($image_old3);
        }

        $imagePath3 = $request->file('preloading');
        $imageName3 = time() . '-' . $request->user_name . '.' . $request->file("preloading")->extension();

        if ($imagePath3->move(public_path("images" . DIRECTORY_SEPARATOR . "settings"), $imageName3)) {
            $settings['preloading'] = $imageName3;
        }
    }

    DB::table('settings')->update($settings);

    toast('تم حفظ الإعدادات', 'success');
    return redirect()->back();
}

}
