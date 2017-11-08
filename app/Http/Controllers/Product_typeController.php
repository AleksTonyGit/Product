<?php

namespace App\Http\Controllers;

use App\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Product_typeController extends Controller
{
    public function getForm()
    {
        return view('create');
    }


    public function postCreate(Request $request)
    {
        $rules = ['name' => 'required'];
        $input = ['name' => null];
        $validator1 = Validator::make($request->all(), $rules);
        if($validator1->fails())
        {
            return back()->withErrors($validator1)->withInput();
        }
        Product_type::create(['name' => $request->get('name')]);
        return back()->with('success1', 'New Product type added successfully.');
    }
}