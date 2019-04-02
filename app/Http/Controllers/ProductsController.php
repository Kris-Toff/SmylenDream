<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Storage;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(20);

        return view('admin_dashboard/pages/products/post', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard/pages/products/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Products $product)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'short_description' => 'required|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'additional_information' => 'required'
        ]);
        
        $dimensions = $product->arrayToString($request);
       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $attributes['name'].'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        
        Products::create([
            'name' => request('name'),
            'price' => request('price'),
            'short_description' => request('short_description'),
            'image' => $name,
            'category' => request('category'),
            'additional_information' => request('additional_information'),
            'dimensions' => $dimensions
        ]);

        return redirect('/admin_dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;
        $products = Products::where('name', 'like', '%'.$search.'%')->paginate(20);
        
        return view('admin_dashboard/pages/products/search', compact(['products', 'search']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $dimensions = $product->stringToArray($product);
        
        return view('admin_dashboard/pages/products/view', compact(['product', 'dimensions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Products $product, Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'short_description' => 'required|max:191',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'category' => 'required',
            'additional_information' => 'required'
        ]);
        
        $dimensions = $product->arrayToString($request);
        
        $attributes['dimensions'] = $dimensions;
        
        if (request()->hasFile('image')) 
        { 
            //Delete Old Image
            $file_path = public_path().'/images/'.$product->image;
            if(file_exists($file_path))
            {
                unlink($file_path);
            }

            //Upload new image
            $image = request()->file('image');
            $name = $attributes['name'].'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $attributes['image'] = $name;

        }else{
            
            //Update image name
            $extension = $product->getExtension($product->image);
            $oldImage = public_path().'/images/'.$product->image;
            $newImage = public_path().'/images/'.$attributes['name'].'_'.time().'.'.$extension;

            $updatedName = rename($oldImage, $newImage);
            
            $attributes['image'] = $attributes['name'].'_'.time().'.'.$extension;
        }
        
        $product->update($attributes);

        return redirect('/admin_dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        
        //Delete image
        $file_path = public_path().'/images/'.$product->image;
        if(file_exists($file_path))
        {
            unlink($file_path);
        }

        return redirect('/admin_dashboard');
    }

    public function showCategory(Request $request)
    {

        $category = $request->category;
        $products = Products::where('category', $category)->orderBy('created_at', 'desc')->paginate(12);

        return view('admin_dashboard/pages/products/category', compact(['products', 'category']));
    }
}
