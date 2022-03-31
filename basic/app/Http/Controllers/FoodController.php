<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Auth;

class FoodController extends Controller
{
    public function foods()
    {
       $foods = food::latest()->paginate(2);
       return view('admin.food.food',compact('foods'));
    }
    public function addFoods(Request $request){
        
        $foods = new Food;
        $foods -> food_name = $request-> food_name;
        $foods -> user_id = Auth::user()->id;
        $foods ->save();
        return Redirect()->back()->with('success','New Item Inserted');
    }
}