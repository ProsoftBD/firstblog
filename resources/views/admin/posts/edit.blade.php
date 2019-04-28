@extends('admin.master')

@section('title', 'Edit post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h2 class="title-block">Edit Post : {{ $post->title }}</h2>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.update', ['id'=>$post->id]) }}" method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="title" class="control-label">
                                {{ __( 'Title' ) }}
                            </label>


                            <input type="text" name="title" id="title"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}}"
                                   value="{{ $post->title }}" placeholder="Post title...">

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
                                   class="form-control{{ $errors->has('featured') ? ' is-invalid' : '' }}"
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
                                      class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                      placeholder="Content write here...">{{ $post->content }}</textarea>

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
                                    class="form-control {{ $errors->has('category_id') ? 'is-invalid' : ''}}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if ($category->id == $post->category->id)
                                            selected
                                            @endif
                                    >{{ $category->category }}</option>
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
                                                   value="{{$tag->id}}"
                                                   @foreach ($post->tags as $t)
                                                   @if ($t->id == $tag->id)
                                                   checked
                                                    @endif
                                                    @endforeach
                                            >
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

                            <input type="submit" value="Update Post" class="btn btn-info">
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
            .create(document.querySelector('#content'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection