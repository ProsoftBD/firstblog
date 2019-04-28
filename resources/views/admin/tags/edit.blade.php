@extends('admin.master')

@section('title', 'Edit tag')

@section('content')
<div class="card">
    <div class="card-block">
        <div class="card-title-block text-center">
            <h2 class="title-block">Edit Tag : {{ $tag->tag }}</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.update', ['id'=>$tag->id]) }}" method="POST">
            @csrf
            
            <div class="form-group row">
                <label for="tag" class="col-md-3 col-form-label text-md-right"> 
                    {{ __( 'tag Name' ) }} 
                </label>
                
                <div class="col-md-7">
                    <input type="text" name="tag" id="tag" class="boxed form-control{{ $errors->has('tag') ? ' is-invalid' : ''}}" value="{{ $tag->tag }}" placeholder="tag name..." autofocus>
                    
                    @if ($errors->has('tag'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tag') }}</strong>
                    </span>
                    @endif
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <input type="submit" value="Update" class="btn btn-info"> 
                </div>
            </div>
        </form>
    </div>
</div>



@endsection