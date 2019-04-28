@extends('admin.master')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="card-title-block">
                <h2 class="title-block">Category List</h2>
            </div>
        </div>
        <div class="card-body">
            @if ($categories->count()>0)
            @php($i=1)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Category Name</th>
                        <th class="text-center">Action</th>
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
                        <td class="text-center" style="white-space: nowrap;">
                            <a class="btn btn-pill-left btn-success" href="{{ route('categories.edit', ['id' => $category->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form class="d-inline-block" action="{{ route('categories.delete', ['id' => $category->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-pill-right btn-danger"  onclick="return confirm('Are you sure you want to delete this category.')"  type="submit">
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
                    No Category Found!
                </strong>

            @endif
        </div>
    </div>
@endsection
