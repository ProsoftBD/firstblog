@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Tag List</b>
        </div>
        <div class="card-body">
            @if ($tags->count()>0)
            @php($i=1)
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Tag Name</th>
                        <th colspan="2" class="text-center">Action</th>
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
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('tags.edit', ['id' => $tag->id]) }}">edit</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('tags.delete', ['id' => $tag->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">
                                    Delete
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