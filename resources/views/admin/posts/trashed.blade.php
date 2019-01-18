@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Trashed Posts</b>
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
                        <th colspan="2" class="text-center">Action</th>
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
                            <a class="btn btn-info btn-sm" href="{{ route('posts.restore', ['id' => $post->id]) }}">Restore</a>
                        </td>

                        <td class="text-center">
                            <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Delete Permanently
                                </button>
                            </form>
                        </td>  
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <strong class="alert alert-danger">
                    No Trashed Found!
                </strong>

            @endif
        </div>
    </div>
@endsection