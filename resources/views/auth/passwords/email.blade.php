@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col l6 m12 offset-l3">
                <form class="" role="form" method="POST" action="{{ route('password.email') }}">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-title">
                                Reset Password
                            </div>
                            {{ csrf_field() }}
                            {{-- Email --}}
                            <div class="input-field">
                                <input name="email" id="email" type="email" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email Adres</label>
                                @if ($errors->has('email'))
                                    <blockquote class="text-lighten-4" style="margin-top: -1em">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </blockquote>
                                @endif
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-large"><i class="material-icons left">mail_outline</i>Send password reset link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
