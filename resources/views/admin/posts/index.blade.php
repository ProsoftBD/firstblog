@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>All Posts</b>
        </div>
        <div class="card-body">
            @if ($posts->count()>0)
            @php($i=1)
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Featured</th>
                        <th>Title</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}" width="80">
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('posts.show', ['id' => $post->slug]) }}" class="btn btn-success btn-sm">
                                show
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('posts.edit', ['id' => $post->id]) }}">edit</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('posts.tresh', ['id' => $post->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Trush
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <strong class="alert alert-danger">
                    No Post Found!
                </strong>

            @endif
        </div>
    </div>
@endsection
