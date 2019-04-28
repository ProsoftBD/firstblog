@extends('admin.master')

@section('title', 'Edit User')

@section('content')

<div class="card">
    <div class="card-block">
        <div class="card-title-block">
            <h3 class="title-block">Update : {{ $user->name }}</h3>
            <a href="{{route('users')}}" class="btn btn-info" style="position: absolute;float: right;right: 20px;top: 12px;">back</a>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('users.update', ['id'=>$user->id]) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-9">
                    <input id="name" type="text" class="boxed form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-9">
                    <input id="email" type="email" class="boxed form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="avatar" class="col-md-3 col-form-label text-md-right">{{ __('Avatar') }}</label>

                <div class="col-md-9">
                    <input id="avatar" type="file" class="boxed form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ $user->avatar }}">

                    @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="about" class="col-md-3 col-form-label text-md-right">{{ __('About Your Self') }}</label>

                <div class="col-md-9">
                    <textarea id="about" type="text" class="boxed form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about">{{ $user->profile->about }}</textarea>

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
                    <input id="facebook" type="text" class="boxed form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ $user->profile->facebook }}">

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
                    <input id="youtube" type="text" class="boxed form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" name="youtube" value="{{ $user->profile->youtube }}">

                    @if ($errors->has('youtube'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('youtube') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-9 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update User') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('style')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#about' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
