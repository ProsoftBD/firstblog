@extends('admin.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title-block text-center">Edit blog Settings</h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="control-label" for="site_name">Site Name</label>
                            <input name="site_name" type="text" id="site_name"
                                   class="form-control boxed {{ $errors->has('site_name') ? ' is-invalid' : '' }}"
                                   value="{{ $settings->site_name }}" autofocus>

                            @if ($errors->has('site_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('site_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="favicon">Favicon</label>
                            <input name="favicon" type="file" id="favicon"
                                   class="form-control boxed {{ $errors->has('favicon') ? ' is-invalid' : '' }}">

                            @if ($errors->has('favicon'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('favicon') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="site_about">About Site</label>
                            <textarea name="site_about" rows="3" id="site_about"
                                      class="form-control boxed {{ $errors->has('site_about') ? ' is-invalid' : '' }}">{{ $settings->site_about }}</textarea>

                            @if ($errors->has('site_about'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('site_about') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="street_address">Street Address</label>
                            <input name="street_address" type="text" id="street_address"
                                   class="form-control boxed {{ $errors->has('street_address') ? ' is-invalid' : '' }}"
                                   value="{{ $settings->street_address }}">

                            @if ($errors->has('street_address'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('street_address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Area</label>
                            <input name="address" type="text" id="address"
                                   class="form-control boxed {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   value="{{ $settings->address }}">

                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="contact_number" class="control-label">{{ __('Contact Number') }}</label>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+88</div>
                                </div>
                                <input id="contact_number" type="text"
                                       class="boxed form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}"
                                       name="contact_number" value="{{ $settings->contact_number }}"
                                       placeholder="01712121212">
                            </div>
                            @if ($errors->has('contact_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact_number') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="available_time" class="control-label">{{ __('Available Time') }}</label>

                            <input id="available_time" type="text"
                                   class="boxed form-control{{ $errors->has('available_time') ? ' is-invalid' : '' }}"
                                   name="available_time" value="{{ $settings->available_time }}"
                                   placeholder="Mon-Fri 9am-6pm">

                            @if ($errors->has('available_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('available_time') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="contact_email" class="control-label">{{ __('Contact Email') }}</label>

                                <input id="contact_email" type="email"
                                       class="boxed form-control{{ $errors->has('contact_email') ? ' is-invalid' : '' }}"
                                       name="contact_email" value="{{ $settings->contact_email }}">

                                @if ($errors->has('contact_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact_email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update settings') }}
                                </button>
                            </div>
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
            .create(document.querySelector('#site_about'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection