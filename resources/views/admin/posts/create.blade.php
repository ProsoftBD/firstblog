@extends('admin.master')

@section('title', 'Create New Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h2 class="title-block">Create New Post</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="control-label">
                                {{ __( 'Title' ) }}
                            </label>


                            <input type="text" name="title" id="title"
                                   class="boxed form-control{{ $errors->has('title') ? ' is-invalid' : ''}}"
                                   value="{{ old('title') }}" placeholder="Post title...">

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="featured" class="control-label">
                                {{ __('Featured') }}
                            </label>
                            <input type="file" name="featured" id="featured"
                                   class="boxed form-control{{ $errors->has('featured') ? ' is-invalid' : '' }}"
                                   value="{{ old('featured') }}">

                            @if ($errors->has('featured'))
                                <span class="invalid-feedback">
                                    <strong>
                                        {{ $errors->first('featured') }}
                                    </strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="content" class="control-label">
                                {{ __('Content ') }}
                            </label>
                            <textarea type="text" rows="5" name="content" id="content"
                                      class="boxed form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                      placeholder="Content write here...">{{ old('content') }}</textarea>

                            @if ($errors->has('content'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">

                            <label for="category_id" class="control-label">
                                {{ __('Category') }}
                            </label>


                            <select name="category_id" id="category_id"
                                    class="boxed form-control{{ $errors->has('category_id') ? ' is-invalid' : ''}}">
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

                        <div class="form-group">

                            <label class="control-label">
                                {{ __('Tags') }}
                            </label>

                            <div>
                                @foreach($tags as $tag)
                                    <div class="form-check d-inline-block form-group">
                                        <label class="form-check-label">
                                            <input name="tags[]" type="checkbox"
                                                   class="form-check-input{{ $errors->has('tag') ? ' is-invalid' : ''}}"
                                                   value="{{$tag->id}}">
                                            {{ $tag->tag }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            @if ($errors->has('tags'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Submit" class="btn btn-info">
                        </div>
                    </form>
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
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
