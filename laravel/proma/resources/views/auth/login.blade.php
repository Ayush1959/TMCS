@extends('layouts.app')

@section('content')

<body class="login-body">
    <div class="login">
        <h1>PROMA</h1>
        <div class="col-md-12">
            <div class="col-md-12">
                </br>
            </div>


            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                    <div>
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"
                            required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                    <div class="">
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                            required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block btn-large">
                            Login
                        </button>
                    </div>
                </div>
            </form>
            <div class="powered_log"> Crafted with passion by <a href="http://trinitymascot.com/" target="_blank"> TMCS
                </a> </div>
        </div>
    </div>
</body>

<!-- <body class="login-body">
    <div class="login">
        <h1>PROMA</h1>
        <div class="col-md-12">
            <div class="col-md-12">
                </br>
            </div>
        </div>
    </div>
</body> -->
<!-- <div class="row">
    <h1>PROMA</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> --}}

                    <div>
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"
                            required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{-- <label for="password" class="col-md-4 control-label">Password</label> --}}

                    <div class="">
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                            required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block btn-large">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
@endsection