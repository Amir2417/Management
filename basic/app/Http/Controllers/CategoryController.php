<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat(){
        $catagories = Category::latest()->paginate(3);
        return view("admin.category.category",compact('catagories'));
    }


    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
        [
            'category_name.required' => 'Please Input Category Name'
        ]
    );

    // Category::insert([
    //     'category_name' => $request -> category_name,
    //     'user_id' => Auth::user()->id,
    //     'created_at' => Carbon::now()
    // ]);

    $category = new Category;
    $category -> category_name = $request-> category_name;
    $category -> user_id = Auth::user()->id;
    $category -> save();

    return Redirect()->back()->with('success','Category Inserted');

    


    }
    public function EditCat($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));

    }
    public function Update(Request $request,$id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('allCategory')->with('success','Category Updated');
    }

   
   
}
