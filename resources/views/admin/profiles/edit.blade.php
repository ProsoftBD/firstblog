@extends('admin.master')

@section('title', 'Profile edit')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title-block">Update : {{ $user->name }}</h3>
                        <a href="{{route('profiles')}}" class="btn btn-info"
                           style="position: absolute;right: 20px;top:12px">back</a>
                    </div>
                    <div class="">
                        <form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" id="name" class="form-control boxed {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                       value="{{ $user->name }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="avatar">Avatar</label>
                                <input type="file" id="avatar" class="form-control boxed {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="about">About You</label>
                                <textarea name="about" rows="3" class="form-control boxed {{ $errors->has('about') ? ' is-invalid' : '' }}" id="about">{{ $user->profile->about }}</textarea>

                                @if ($errors->has('about'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="facebook">Facebook</label>
                                <input name="facebook" type="text" id="facebook" value="{{ $user->profile->youtube }}" class="form-control boxed {{ $errors->has('facebook') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('facebook'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="youtube">Youtube Link</label>
                                <input name="youtube" type="text" id="youtube" value="{{ $user->profile->youtube }}" class="form-control boxed {{ $errors->has('youtube') ? ' is-invalid' : '' }}" >

                                @if ($errors->has('youtube'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
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
            </div>
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

