<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['sliders']      = Slider::get();
        $data['slidersCount'] = $data['sliders']->count();

        $data['meals']       = Meal::get();
        $data['mealsCount']  = $data['meals']->count();


        $data['sections']      = Section::get();
        $data['sectionsCount'] = $data['sections']->count();

        $data['users']       = User::get();
        $data['usersCount']  = $data['users']->count();


        return view('home',$data);
    }
}
