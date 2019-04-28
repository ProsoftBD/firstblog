@extends('admin.master')

@section('title', 'Trashed Posts')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="card-title">
                <h2 class="title-block text-center">Trashed Posts</h2>
            </div>

        </div>
        <div class="card-body">
            @if ($posts->count()>0)
                @php($i=1)
                <table class="table table-striped text-center">
                    <thead>
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

                            <td style="white-space: nowrap;">
                                <a class="btn btn-success btn-pill-left" href="{{ route('posts.restore', ['id' => $post->id]) }}">
                                    <i class="fa fa-cloud-upload"></i>
                                </a>

                                <form class="d-inline-block" action="{{ route('posts.delete', ['id' => $post->id]) }}" method="get">
                                    @csrf
                                    <button class="btn btn-danger btn-pill-right" type="submit" title="Delete Permanently">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-dark text-center">
                    No Trashed Found!
                </div>

            @endif
        </div>
    </div>
@endsection