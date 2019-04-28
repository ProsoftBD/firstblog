<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.index')
                ->with('title', Setting::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('firstPost', Post::orderBy('created_at', 'desc')->first())
                ->with('secondPost', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->first())
                ->with('thirdPost', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->first())
                ->with('catA', Category::orderBy('created_at', 'asc')->first())
                ->with('catB', Category::orderBy('created_at', 'asc')->skip(1)->take(1)->first())
                ->with('catC', Category::orderBy('created_at', 'asc')->skip(2)->take(1)->first())
                ->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $nextPost = Post::where('id', '>', $post->id)->min('id');
        $previousPost = Post::where('id', '<', $post->id)->max('id');

        return view('frontend.single')
                    ->with('post', $post)
                    ->with('title', $post->title)
                    ->with('categories', Category::take(5)->get())
                    ->with('settings', Setting::first())
                    ->with('next', Post::find($nextPost))
                    ->with('previous', Post::find($previousPost))
                    ->with('tags', Tag::all());
    }

    public function category($slug)
    {
        $category = Category::where('cat_slug', $slug)->first();

        return view('frontend.category')
                    ->with('category', $category)
                    ->with('title', $category->category)
                    ->with('settings', Setting::first())
                    ->with('categories', Category::take(5)->get());
    }

    public function tag($slug)
    {
        $tag = Tag::where('tag_slug', $slug)->first();

        return view('frontend.tag')
                    ->with('tag', $tag)
                    ->with('title', $tag->tag)
                    ->with('settings', Setting::first())
                    ->with('categories', Category::take(5)->get());
    }
}
