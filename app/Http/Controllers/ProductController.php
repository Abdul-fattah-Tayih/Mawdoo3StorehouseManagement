<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // include related fields for each row using the methods defined in the model
        $products = Product::with(['categories','user'])->paginate(10);
        return view('products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        return view('products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name'          => 'required',
            'categories'    => 'required'
        ]);

        $product = Product::create([
            'name'           => $request->input('name'),
            'description'    => $request->input('description'),
            'quantity'       => ($request->input('quantity')===null)? 1 : $request->input('quantity'),
            'price'          => ($request->input('price')===null)? 1 : $request->input('price'),
            'image'          => $request->input('image'),
            'created_by'     => \Auth::user()->id
        ]);

        $product->user()->associate(\Auth::user()->id);
        $product->categories()->attach($request->input('categories'));
        $product->save();

        flash('inserted user successfully')->success();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function decrement($id)
    {
        $product = Product::findOrFail($id);

        if($product->quantity-1 < 0)
        {
            flash('Quantity cannot be negative')->warning();
        }
        else
        {
            $product->decrement('quantity', 1);
            flash('Decrease quantity successfully')->success();
        }

        return redirect('/products');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Category::all();
        return view('products.edit')->with(compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'categories'    => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name'           => $request->input('name'),
            'description'    => $request->input('description'),
            'quantity'       => ($request->input('quantity')===null)? 1 : $request->input('quantity'),
            'price'          => ($request->input('price')===null)? 1 : $request->input('price'),
            'image'          => $request->input('image')
        ]);

        $product->categories()->sync($request->input('categories'));

        flash('edits saved')->success();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        flash('deleted successfully')->success();
        return redirect('/products');
    }
}
