@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col l6 m12 offset-l3">
                <form class="" role="form" method="POST" action="{{ route('password.request') }}">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                @if (session('status'))
                                    <i class="material-icons right">done_all</i>{{ session('status') }}
                                @else
                                    Reset Wachtwoord
                                @endif
                            </div>
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
                            {{-- Email --}}
                            <div class="input-field">
                                <input name="email" id="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email Adress</label>
                                @if ($errors->has('email'))
                                    <blockquote class="text-lighten-4" style="margin-top: -1em">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </blockquote>
                                @endif
                            </div>
                            {{-- Password reset --}}
                            <div class="input-field">
                                <input name="password" id="password" type="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" value="{{ old('password') }}" required autofocus>
                                <label for="password">New Password</label>
                                @if ($errors->has('password'))
                                    <blockquote class="text-lighten-4" style="margin-top: -1em">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </blockquote>
                                @endif
                            </div>
                            {{-- Password reset confirmation --}}
                            <div class="input-field">
                                <input name="password_confirmation" id="password_confirmation" type="password" class="validate {{ $errors->has('password_confirmation') ? ' invalid' : '' }}" value="{{ old('password_confirmation') }}" required autofocus>
                                <label for="password_confirmation">New Password Confirmation</label>
                                @if ($errors->has('password_confirmation'))
                                    <blockquote class="text-lighten-4" style="margin-top: -1em">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </blockquote>
                                @endif
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-large"><i class="material-icons left">create</i>Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
