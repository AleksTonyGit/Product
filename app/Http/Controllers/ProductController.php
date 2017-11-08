<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
    public function showProduct()
    {
        $pro=DB::table('products')
            ->join('product_types','products.product_type_id','=','product_types.id')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.id','product_types.name as type','categories.name as category','products.name','products.description','products.image')
            ->get();
        return view('index', compact('pro'));
    }

    public function create()
    {
        $product=new Product;
        $product_type_id=Product_type::pluck('name','id');
        $category_id=Category::pluck('name','id');
        return view('create',compact('product','product_type_id','category_id'));
    }


    public function store(Request $request)
    {
        $product=new Product;
        $fname=$request->file('image');

        if($fname != null)
        {
            $originalname=$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/images/',$originalname);
            $product->image='/images/'.$originalname;
        }
        else
        {
            $product->image='';
        }
        $product->name=$request->name;
        $product->product_type_id=$request->product_type_id;
        $product->category_id=$request->category_id;
        $product->description=$request->description;

        if(!$product->save())
        {
            $err1=$product->getErrors();
            return redirect()->action('ProductController@create')->with('errors1',$err1)->withInput();
        }

        return redirect()->action('ProductController@create')->with('message','New Product '.$product->name.' has been added!');
    }

    public function getDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('index');
    }

    public function search(Request $request)
    {
        $search=$request->searchform;
        $search='%'.$search.'%';
        $pro=DB::table('products')
            ->join('product_types','products.product_type_id','=','product_types.id')
            ->join('categories','products.category_id','=','categories.id')

            ->select('products.id','product_types.name as type','categories.name as category','products.name','products.description','products.image')
            ->where('products.name','like', $search)
            ->get();
        //$pro=Product::where('name','like', $search)->get();
        //dd($pro);
        return view('index',['pro'=>$pro,'id'=>0]);
    }

    public function edit($id)
    {
        $p = Product::find($id);
        $product=new Product;
        $product_type_id=Product_type::pluck('name','id');
        $category_id=Category::pluck('name','id');
        return view('edit', compact('p','product_type_id','product','category_id'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_type_id'=>'required',
            'category_id'    =>'required',
            'name'           =>'required',
            'description'    =>'required'
        ]);

        $p = Product::find($id);
        $pUpdate = $request->all();
        $p->update($pUpdate);
        return redirect('index');
    }



}