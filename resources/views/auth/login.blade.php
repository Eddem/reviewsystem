@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
        <div class="col-md-8 offset-4">
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- New login -->

                    <div class="wrapper">
                        <form class="form-horizontal" action="{{ route('login') }}" method="post" name="Login_Form" class="form-signin">
                            {{ csrf_field() }}

                            <h2 class="display-4">Log In</h2>

                            <div class="form-group
                            {{$errors->first('email')}}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" required="" autofocus="" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : 'Verkeerd wachtwoord' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthouden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="Submit" class="btn btn-lg btn-primary btn-block" name="Submit" value="Login">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Ik ben mijn wachtwoord vergeten.
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
