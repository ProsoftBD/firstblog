@extends('admin.master')

@section('title', 'Blog posts')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="card-title">
                <h2 class="title-block">All Posts</h2>
            </div>
        </div>
        <div class="card-body">
            @if ($posts->count()>0)
                @php($i=1)
                <table class="table table-striped">
                    <thead class="text-center">
                    <tr>
                        <th>SL No</th>
                        <th>Featured</th>
                        <th>Title</th>
                        <th>Action</th>
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
                            <td class="text-center" style="white-space: nowrap;">

                                <a class="btn btn-success btn-pill-left"
                                   href="{{ route('posts.edit', ['id' => $post->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="{{ route('posts.show', ['id' => $post->slug]) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <form class="d-inline-block" action="{{ route('posts.tresh', ['id' => $post->id]) }}"
                                      method="get">
                                    @csrf
                                    <button class="btn btn-pill-right btn-danger" type="submit">
                                        <i class="fa fa-trash"></i>
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
