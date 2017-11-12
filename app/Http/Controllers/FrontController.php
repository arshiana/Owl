<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
class FrontController extends Controller
{
    public function index()
    {
        $books=Product::all();
        $categories=Category::all();
        return view('front.home',compact('books','categories'));
    }
    public function books()
    {

        $books=Product::all();
        $categories=Category::all();
        return view('front.books',compact('books','categories'));

    }
    public function book($id)
    {
        $books=Product::where('id',$id)->get();
        $categories=Category::all();
        return view('front.book',compact('books','categories'));
    }
   
   