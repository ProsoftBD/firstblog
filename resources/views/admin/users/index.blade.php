@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Users</b>
        </div>
        <div class="card-body">
            @if ($users->count()>0)
            @php($i=1)
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Featured</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th colspan="3" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>
                            <img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="80" height="80" style="border-radius:50%">
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            @if ($user->admin)
                                <form action="{{ route('users.not.admin',['id'=> $user->id]) }}" method="get">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Remove Permissions</button>
                                </form>
                            @else
                                <form action="{{ route('users.admin',['id'=> $user->id]) }}" method="get">
                                    @csrf
                                    <button class="btn btn-info btn-sm" type="submit">Make Admin</button>
                                </form>
                            @endif

                        </td>
                        <td class="text-center">
                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-success btn-sm">
                                Detail
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('users.edit', ['id' => $user->id]) }}">edit</a>
                        </td>
                        <td class="text-center">
                            @if(Auth::id() !== $user->id)
                            <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">
                                    delete
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <strong class="alert alert-danger">
                    No User!
                </strong>

            @endif
        </div>
    </div>
@endsection
