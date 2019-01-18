@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Update : {{ $user->name }}</h3>
        <a href="{{route('profiles')}}" class="btn btn-info" style="position: absolute;right: 20px;top:12px">back</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-9">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="avatar" class="col-md-3 col-form-label text-md-right">{{ __('Avatar') }}</label>

                <div class="col-md-9">
                    <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ $user->avatar }}">

                    @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="about" class="col-md-3 col-form-label text-md-right">{{ __('About You') }}</label>

                <div class="col-md-9">
                    <textarea rows="4" id="about" type="text" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about">{{ $user->profile->about }}</textarea>

                    @if ($errors->has('about'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('about') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="facebook" class="col-md-3 col-form-label text-md-right">{{ __('Facebook Link') }}</label>

                <div class="col-md-9">
                    <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ $user->profile->facebook }}">

                    @if ($errors->has('facebook'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="youtube" class="col-md-3 col-form-label text-md-right">{{ __('Youtube Link') }}</label>

                <div class="col-md-9">
                    <input id="youtube" type="text" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" name="youtube" value="{{ $user->profile->youtube }}">

                    @if ($errors->has('youtube'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('youtube') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


{{-- @section('styles')
    <link rel="stylesheet" href="{{ asset('dist/summernote-bs4.css')}}">
@endsection

@section('scripts')
    <script src="{{ asset('dist/summernote-bs4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#about').summernote({
                placeholder: 'Write something ...',
                tabsize: 2,
                height:100

            });
        });
    </script>
@endsection --}}

