<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MenyMaliController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("createUser", function(){
   
   App\Models\User::create([
       
       'name' => 'hus',
       'email' => 'hus@app.com',
       'password' => \Hash::make('password'),
       
       ]);
    
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

Route::get('/', function () {
    return view('welcome');
})->name('first-page');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/my-account', [App\Http\Controllers\AccountController::class, 'index'])->name('my-account');
Route::put('/home/my-account-update', [App\Http\Controllers\AccountController::class, 'update'])->name('update-my-account');
Route::get('/home/slider', [App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
Route::get('/home/slider/create', [App\Http\Controllers\SliderController::class, 'create'])->name('slider.create');
Route::post('/home/slider/store', [App\Http\Controllers\SliderController::class, 'store'])->name('slider.store');

Route::get('/home/menu-mails',[MenyMaliController::class,'index'])->name('menu-mail');
Route::post('/home/menu-mails',[MenyMaliController::class,'store'])->name('menu-mail-post');
Route::get('/home/menu-mails/show',[MenyMaliController::class,'show'])->name('sendMessage');
Route::post('/home/menu-mails/send',[MenyMaliController::class,'send'])->name('menuSendMessage');

Route::get('/home/slider/{id}/edit', [App\Http\Controllers\SliderController::class, 'edit'])->name('slider.edit');
Route::put('/home/slider/{id}/update', [App\Http\Controllers\SliderController::class, 'update'])->name('slider.update');
Route::delete('/home/slider/{id}', [App\Http\Controllers\SliderController::class, 'destroy'])->name('slider.destroy');

Route::resource('home/section',SectionController::class);
Route::resource('home/meal',MealController::class);
Route::resource('home/user',UserController::class);

Route::get('meal/{section_id}',[FrontController::class,'meals'])->name('front.meal');

Route::get('test/index',[SectionController::class,'test'])->name('s.test');
Route::get('associated-sections/{section_id}/index',[SectionController::class,'test2'])->name('realted.sec');

Route::get('home/setting',[SettingController::class,'index'])->name('system.setting');
Route::put('home/setting/update',[SettingController::class,'update'])->name('system.setting.update');

Route::get('home/sections/settings',[SectionController::class,'sectionSettings'])->name('section.setting');

Route::post('save/sections/settings',[SectionController::class,'saveSectionSettings'])->name('save.section.setting');


Route::get('/get-sub-category',function (){
    $parent_id = \Illuminate\Support\Facades\Request::get('section_id');
    $category = \App\Models\Section::where('parent_id','=',$parent_id)->get();
    return response()->json($category);
})->name('get-sub-category');

Route::get('get/meal/',[FrontController::class,'getMeals'])->name('getMeals');

});
