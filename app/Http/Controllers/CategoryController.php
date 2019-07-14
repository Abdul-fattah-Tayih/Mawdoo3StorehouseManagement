<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index')->with(compact('categories'));
    }

    // show creation form
    public function create()
    {
        return view('categories.create');
    }

    // Submit creation form
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'name'          => 'required'
        ]);

        // if validation passes, insert product into db
        Category::create([
            'name' => $request->input('name')
        ]);

        flash('Created category '.$request->input('name'))->success();
        return redirect('/categories');
    }

    //load edit form for category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit')->with(['category' => $category]);
    }

    // submit edit form
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
           'name'   =>   $request->input('name')
        ]);

        flash('edits saved')->success();
        return redirect('/categories');
    }


    // delete category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if($category->products->count()==0)
        {
            $category->delete();
            flash('delete successful')->success();
        }
        else
        {
            flash('Can\'t delete '.$category->name.' because it has associated products')->warning();
        }

        return redirect('/categories');
    }
}
