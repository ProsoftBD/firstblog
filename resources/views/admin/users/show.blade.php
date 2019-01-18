@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Profile</h3>
            <a href="{{route('users')}}" class="btn btn-info" style="position: absolute;float: right;right: 20px;top: 12px;">back</a>
        </div>

        <div class="card-body">
            <div class="row mb-5">
                <div class="col-md-4">
                    <img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" class="card-img-top">
                </div>
                <div class="col-md-8 float-right">
                    <h3>Personal Info</h3>
                    <table class="table">
                        <tr>
                            <td>
                                {{ __('Name')}}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ __('Email')}}
                            </td>
                            <td>
                                {{ $user->email  }}
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <h3>
                        About
                    </h3>
                    <p>
                        {!! $user->profile->about !!}
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-8">
                    <h3>Other Info</h3>
                    <div class="row">
                        <div class="col-4">
                            {{ __('Facebook :')}}
                        </div>
                        <div class="col-8">
                            {{ $user->profile->facebook }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            {{ __('Youtube :')}}
                        </div>
                        <div class="col-8">
                            {{ $user->profile->youtube }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
