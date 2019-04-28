@extends('admin.master')

@section('title', 'Blog posts')

@section('content')
    <div class="card">
        <img src="{{ asset($post->featured) }}" alt="{{$post->title}}" class="card-img-top">
        <div class="card-body">
            <div class="card-title">
                <h2>
                    {!! $post->title !!}
                </h2>
                <blockquote class="blockquote">
                    <footer class="blockquote-footer">
                        {{ $post->created_at }}
                        written by <a href="#"> {!! $post->category->name !!} </a>
                    </footer>
                </blockquote>
            </div>
            <div class="card-text">
                <p>
                    {!! $post->content !!}
                </p>
            </div>
        </div>
    </div>
@endsection
