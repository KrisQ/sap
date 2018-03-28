@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col l6 s12 offset-l3">
            <form role="form" method="POST" action="{{ route('login') }}">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Login</span>
                        {{ csrf_field() }}
                        {{-- Email --}}
                        <div class="input-field">
                            <input name="email" id="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}" autofocus>
                            <label for="email">E-Mail Adress</label>
                            @if ($errors->has('email'))
                                <blockquote class="text-lighten-4" style="margin-top: -1em" >
                                    <strong>{{ $errors->first('email') }}</strong>
                                </blockquote>
                            @endif
                        </div>
                        {{-- Password --}}
                        <div class="input-field">
                            <input name="password" id="password" type="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" value="{{ old('password') }}">
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <blockquote class="text-lighten-4" style="margin-top: -1em">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </blockquote>
                            @endif
                        </div>
                        {{-- Remember me --}}
                        <div class="" style="margin-bottom: 1em">
                            <input name="remember" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}  />
                            <label for="remember">Remember me</label>
                        </div>
                        {{-- Forgot Password --}}
                        <div>
                            <a class="waves-effect waves-light" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                    <div class="card-action">
                        {{-- Login --}}
                        <div class="">
                            <button class="waves-effect waves-light btn btn-large" type="submit"><i class="material-icons right">send</i>Log In</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
