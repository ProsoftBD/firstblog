@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>
            Create New Post
        </strong>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">
                    {{ __( 'Title' ) }}
                </label>

                <div class="col-md-10">
                    <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}}" value="{{ old('title') }}" placeholder="Post title...">

                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <label for="featured" class="col-md-2 text-md-right col-form-label">
                    {{ __('Featured') }}
                </label>

                <div class="col-md-10">
                    <input type="file" name="featured" id="featured" class="form-control{{ $errors->has('featured') ? ' is-invalid' : '' }}" value="{{ old('featured') }}">

                    @if ($errors->has('featured'))
                    <span class="invalid-feedback">
                        <strong>
                            {{ $errors->first('featured') }}
                        </strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <label for="content" class="col-md-2 text-md-right col-form-label">
                    {{ __('Content ') }}
                </label>

                <div class="col-md-10">
                    <textarea type="text" rows="5" name="content" id="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="Content write here...">{{ old('content') }}</textarea>

                    @if ($errors->has('content'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <label for="category_id" class="col-md-2 col-form-label text-md-right">
                    {{ __('Category') }}
                </label>

                <div class="col-md-10">
                    <select name="category_id" id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : ''}}">
                        <option value="">Select one</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">

                <label class="col-md-2 col-form-label text-md-right">
                    {{ __('Tags') }}
                </label>

                <div class="col-md-10">
                    @foreach($tags as $tag)
                        <div class="form-check d-inline-block form-group">
                            <label class="form-check-label" >
                                <input name="tags[]" type="checkbox" class="form-check-input{{ $errors->has('tag') ? ' is-invalid' : ''}}" value="{{$tag->id}}">
                                {{ $tag->tag }}
                            </label>
                        </div>
                    @endforeach

                    @if ($errors->has('tags'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Submit" class="btn btn-info">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/summernote-bs4.css')}}">
@endsection

@section('scripts')
    <script src="{{ asset('dist/summernote-bs4.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#content').summernote({
                placeholder: 'Write something ...',
                tabsize: 2,
                height:100

            });
        });
    </script>
@endsection
