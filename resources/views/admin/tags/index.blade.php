@extends('admin.master')

@section('title', 'Tags')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="card-title-bloc">
                <h2 class="title-block text-center">
                    All Tags
                </h2>
            </div>
        </div>
        <div class="card-body">
            @if ($tags->count()>0)
                @php($i=1)
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Tag Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td style="white-space: nowrap;">
                                <a class="btn btn-success btn-pill-left"
                                   href="{{ route('tags.edit', ['id' => $tag->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>


                                <form class="d-inline-block" action="{{ route('tags.delete', ['id' => $tag->id]) }}"
                                      method="get">
                                    @csrf
                                    <button class="btn btn-danger btn-pill-right" type="submit">
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
                    No Tag Found!
                </strong>

            @endif
        </div>
    </div>
@endsection