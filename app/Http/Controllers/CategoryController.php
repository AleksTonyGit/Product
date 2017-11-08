<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getForm()
    {
        return view('create');
    }


    public function postCreate(Request $request)
    {
        $rules = ['name' => 'required'];
        $input = ['name' => null];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        Category::create(['name' => $request->get('name')]);
        return back()->with('success', 'New Category added successfully.');
    }
}