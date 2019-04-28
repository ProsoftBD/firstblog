@extends('admin.master')

@section('title', 'Create Tag')

@section('content')
<div class="card">
    <div class="card-block">
        <div class="card-title-block">
            <h2 class="title-block text-center">Create New Tag</h2>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            
            <div class="form-group row">
                <label for="tag" class="col-md-3 col-form-label text-md-right"> 
                    {{ __( 'Tag Name' ) }} 
                </label>
                
                <div class="col-md-7">
                    <input type="text" name="tag" id="tag" class="boxed form-control{{ $errors->has('tag') ? ' is-invalid' : ''}}" value="{{ old('tag') }}" placeholder="Tag name..." autofocus>
                    
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
                    <input type="submit" value="Submit" class="btn btn-info"> 
                </div>
            </div>
        </form>
    </div>
</div>



@endsection