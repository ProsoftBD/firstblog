@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Edit blog Settings</h3>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="site_name" class="col-md-3 col-form-label text-md-right">{{ __('Site Name') }}</label>

                <div class="col-md-9">
                    <input id="site_name" type="text" class="form-control{{ $errors->has('site_name') ? ' is-invalid' : '' }}" name="site_name" value="{{ $settings->site_name }}" autofocus>

                    @if ($errors->has('site_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="favicon" class="col-md-3 col-form-label text-md-right">{{ __('Favicon') }}</label>

                <div class="col-md-9">
                    <input id="favicon" type="file" class="form-control{{ $errors->has('favicon') ? ' is-invalid' : '' }}" name="favicon" value="{{ $settings->favicon }}">

                    @if ($errors->has('favicon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('favicon') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="site_about" class="col-md-3 col-form-label text-md-right">{{ __('About Site') }}</label>

                <div class="col-md-9">
                    <textarea rows="4" id="site_about" type="text" class="form-control{{ $errors->has('site_about') ? ' is-invalid' : '' }}" name="site_about">{{ $settings->site_about }}</textarea>

                    @if ($errors->has('site_about'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('site_about') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="street_address" class="col-md-3 col-form-label text-md-right">{{ __('Street Address') }}</label>

                <div class="col-md-9">
                    <input id="street_address" type="text" class="form-control{{ $errors->has('street_address') ? ' is-invalid' : '' }}" name="street_address" value="{{ $settings->street_address }}" placeholder="Dattapara, Khagan...">

                    @if ($errors->has('street_address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('street_address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Area') }}</label>

                <div class="col-md-9">
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $settings->address }}" placeholder="Ashulia, Dhaka">

                    @if ($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="contact_number" class="col-md-3 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                <div class="col-md-9">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+88</div>
                        </div>
                        <input id="contact_number" type="text" class="form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" name="contact_number" value="{{ $settings->contact_number }}" placeholder="01712121212">
                    </div>
                    @if ($errors->has('contact_number'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="available_time" class="col-md-3 col-form-label text-md-right">{{ __('Available Time') }}</label>

                <div class="col-md-9">
                    <input id="available_time" type="text" class="form-control{{ $errors->has('available_time') ? ' is-invalid' : '' }}" name="available_time" value="{{ $settings->available_time }}"
                    placeholder="Mon-Fri 9am-6pm">

                    @if ($errors->has('available_time'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('available_time') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="contact_email" class="col-md-3 col-form-label text-md-right">{{ __('Contact Email') }}</label>

                <div class="col-md-9">
                    <input id="contact_email" type="email" class="form-control{{ $errors->has('contact_email') ? ' is-invalid' : '' }}" name="contact_email" value="{{ $settings->contact_email }}">

                    @if ($errors->has('contact_email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('contact_email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update settings') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
