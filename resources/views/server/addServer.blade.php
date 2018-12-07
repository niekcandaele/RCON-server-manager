@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add server') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('ServerController@store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ip" class="col-md-4 col-form-label text-md-right">{{ __('IP Adress or FQDN') }}</label>

                            <div class="col-md-6">
                                <input id="ip" type="text" class="form-control{{ $errors->has('ip') ? ' is-invalid' : '' }}" name="ip" value="{{ old('ip') }}" required autofocus>

                                @if ($errors->has('ip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="port" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>

                            <div class="col-md-6">
                                <input id="port" class="form-control{{ $errors->has('port') ? ' is-invalid' : '' }}" name="port" value="{{ old('port') }}" required>

                                @if ($errors->has('port'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('port') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rcon_password" class="col-md-4 col-form-label text-md-right">{{ __('RCON password') }}</label>

                            <div class="col-md-6">
                                <input id="rcon_password" type="rcon_password" class="form-control{{ $errors->has('rcon_password') ? ' is-invalid' : '' }}" name="rcon_password" required>

                                @if ($errors->has('rcon_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rcon_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
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
