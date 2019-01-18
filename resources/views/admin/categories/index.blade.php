@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Category List</b>
        </div>
        <div class="card-body">
            @if ($categories->count()>0)
            @php($i=1)
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Category Name</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            {{ $category->category }}
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', ['id' => $category->id]) }}">edit</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="get">
                                @csrf
                                <button  onclick="return confirm('Are you sure you want to delete this category.')" class="btn btn-danger btn-sm" type="submit">
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
                    No Category Found!
                </strong>

            @endif
        </div>
    </div>
@endsection
