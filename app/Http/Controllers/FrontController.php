<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Section;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function meals($section_id)
    {
        $sections = Section::where('parent_id',$section_id)->where('status','active')->get();
        if($sections->count() >0  ){
            return view('meal',compact('sections'));
         } else{
            return abort('404');
         }

    }

    public function getMeals(Request $request)
    {
        $section_id = $request->section_id;

        $meals = Meal::where('children_id',$section_id)->where('status','active')->get();

        $html = view('mealData',compact('meals'))->render();
        return response()->json($html);
    }
}
