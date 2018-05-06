@extends('layout.default')
@section('title', 'Login')
@section('content')

<div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                @if (session('msg'))
                                    <script type="text/javascript">
                                        var title = "<?php echo session('title'); ?>";
                                        var msg = "<?php echo session('msg'); ?>";
                                    </script>
                                @endif

                                <form method="POST" action="{{ route('login.store') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                        
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                        <label>
        									<input type="checkbox" id="remember" checked="checked" name="remember"> Remember Me
        								</label>
                                        <label class="pull-right">
        									<a href="#">Forgotten Password?</a>
        								</label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

@endsection