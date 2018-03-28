@extends('layouts.app')

{{-- name email password confirmpassword --}}

@section('content')
<div class="container">
    <div class="row">

        <div class="col l6 s12 offset-l3">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Register</span>
                        {{ csrf_field() }}
                        {{-- Name --}}
                        <div class="input-field">
                            <input name="name" id="name" type="text" class="validate {{ $errors->has('name') ? ' invalid' : '' }}" value="{{ old('name') }}" required autofocus>
                            <label for="name">Name</label>
                            @if ($errors->has('name'))
                                <blockquote class="text-lighten-4" style="margin-top: -1em">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </blockquote>
                            @endif
                        </div>
                        {{-- Email --}}
                        <div class="input-field">
                            <input name="email" id="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                            @if ($errors->has('email'))
                                <blockquote class="text-lighten-4" style="margin-top: -1em">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </blockquote>
                            @endif
                        </div>
                        {{-- Password --}}
                        <div class="input-field">
                            <input name="password" id="password" type="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" value="{{ old('password') }}" required>
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <blockquote class="text-lighten-4" style="margin-top: -1em">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </blockquote>
                            @endif
                        </div>
                        {{-- Confirm Password --}}
                        <div class="input-field">
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                            <label for="password-confirm">Confirm Password</label>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-large"><i class="material-icons left">create</i>Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
