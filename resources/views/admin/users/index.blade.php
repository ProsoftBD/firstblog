@extends('admin.master')

@section('title', 'Users')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="card-title-block">
                <h2 class="title-block">Users</h2>
            </div>
        </div>
        <div class="card-body">
            @if ($users->count()>0)
            @php($i=1)
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Featured</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->admin == 1)
                            @continue
                        @endif
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
                        <td style="white-space: nowrap;">
                            <a class="btn btn-success btn-pill-left" href="{{ route('users.edit', ['id' => $user->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>

                            @if(Auth::id() !== $user->id)
                            <form class="d-inline-block" action="{{ route('users.delete', ['id' => $user->id]) }}" method="get">
                                @csrf
                                <button class="btn btn-danger btn-pill-right" type="submit">
                                    <i class="fa fa-trash"></i>
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
