<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Session;
use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Post::Where('user_id',Auth::id())->get());
        return view('admin.posts.index')
                   ->with('posts', Post::Where('user_id',Auth::id())->get())
                   ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        if($categories->count() == 0)
        {
            Session::flash('info', "If you want to create post first you have to create one category.");
            return redirect()->route('categories.create');
        }

        if($tags->count() == 0)
        {
            Session::flash('info', "If you want to create post first you have to create one Tag.");
            return redirect()->route('tags.create');
        }
        return view('admin.posts.create')
                   ->with('categories', $categories)
                   ->with('tags', $tags)
                   ->with('settings', Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|unique:posts|max:255',
            'content' => 'required|string',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $image = $request->featured;
        $new_featured = time() . '.' . $image->extension();

        $path = public_path('uploads/posts/'.$new_featured);
        Image::make($image)->resize(1200,800,function($constraint){
            $constraint->aspectRatio();
        })->save($path);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$new_featured,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success', 'Post Created !');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.posts.show')
                    ->with('post', Post::where('slug', $slug)->first())
                    ->with('settings', Setting::first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.posts.edit')
                ->with('post', Post::find($id))
                ->with('categories', Category::all())
                ->with('tags', Tag::all())
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
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $i = $post->featured;

            unlink($i);

            $image = $request->featured;

            $new_featured = time() . '.' . $image->extension();
            $path = public_path('uploads/posts/'.$new_featured);
            Image::make($image)->resize(1200,800,function($constraint){
                $constraint->aspectRatio();
            })->save($path);

            $post->featured = 'uploads/posts/' . $new_featured;
        }
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post Updated Successfully.');
        return redirect()->route('posts');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tresh($id)
    {
        $d = Post::find($id);

        $d->delete();

        Session::flash('success', 'Post trash successfully');

        return redirect()->back();

    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')
                   ->with('posts', $posts)
                   ->with('settings', Setting::first());
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $i = $post->featured;
        unlink($i);
        $post->forceDelete();

        Session::flash('success', 'Post Deleted Permanently');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post Restored Successfully.');

        return redirect()->back();
    }
}
