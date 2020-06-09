<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
     }
     
public function store(Request $request){

    $request->validate([
        'title' => 'required|max:255',
    ]);

    $product = new Product();
    $product-> title = $request->title ;
    $product->save();

    return redirect()->back();
}

public function destory($id){
    $product = Product::find($id);
    $product->delete();
    return redirect()->back();
}

public function edit($id){
    $product = Product::findOrFail($id);
    $products = Product::orderBy('created_at')->get();
    return view('home',compact('product','products'));
}

public function update(Request $request,$id){


    $request->validate([
        'title' => 'required|max:255',
    ]);
    $affected = Product::find($id);
    $affected->title = $request->title;
    $affected->updated_at = now();
    $affected->save();

    return redirect('/');
}
}
