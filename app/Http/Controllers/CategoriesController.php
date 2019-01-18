<?php

namespace App\Http\Controllers;

use Session;
// use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')
                   ->with('categories', Category::all())
                   ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create')->with('settings', Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required|string|unique:categories|max:255'
        ]);

        $category = new Category;
        $category->category = $request->category;
        $category->cat_slug = str_slug($request->category);
        $category->save();

        Session::flash('success', 'Category Created.');

        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')
                   ->with('category', $category)
                   ->with('settings', Setting::first());
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
        $this->validate($request,[
            'category' => 'required|string|max:255'
        ]);

        $c = Category::find($id);
        $c->category = $request->category;
        $c->cat_slug = str_slug($request->category);
        $c->save();

        Session::flash('success', 'Category Update!');

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        foreach($category->posts as $post)
        {
            unlink($post->featured);
            $post->forceDelete();
        }
        $category->delete();
        Session::flash('success', 'Category Deleted!');

        return redirect()->back();
    }
}
