<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Posts;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Products $products)
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(8);

        return view('/pages/index', compact('products'));
    }

    public function search(Request $request)
    {

        $search = $request->search;

        $products = Products::where('name', 'like', '%'.$search.'%')
                            ->orWhere('short_description', 'like', '%'.$search.'%')
                            ->paginate(21);

        $posts = Posts::where('title', 'like', '%'.$search.'%')
                        ->orWhere('short_description', 'like', '%'.$search.'%')
                        ->orWhere('content', 'like', '%'.$search.'%')
                        ->paginate(21);

        return view('/pages/search', compact(['products','search','posts']));

    }

    public function show($id)
    {
        $product = Products::findOrFail($id);

        $dimensions = $product->stringToArray($product);

        $relatedItems = Products::where('category', $product->category)->where('id', '!=', $id)->paginate(4);

        $product['price'] = number_format($product->price, 2, '.', ' ');

       return view('pages/view', compact(['product', 'relatedItems', 'dimensions']));
    }

    public function showAll(Products $products)
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(12);

        return view('pages/products', compact('products'));
    }

    public function showCategory(Request $request)
    {
        $category = $request->category;
        $products = Products::where('category', $category)->orderBy('created_at', 'desc')->paginate(12);

        return view('pages/category', compact(['products', 'category']));
    }
}
