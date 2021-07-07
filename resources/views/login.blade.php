@extends('loginLayout')
@section('title','লগ ইন ')
@section('content')
<div class="login-box">
    <center>
        <div>
            <img src="{{url('public/asset/rab-logo.png')}}" width="120" height="120">
        </div>
    </center>
    <div class="login-logo">
        <b style="color: white;">Rab Forensic Lab</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Login Please </p>
        @if ($message = Session::get('errorMessage'))
            <center><p style="color: red">{{$message}} </p></center>
        @endif
        {{ Form::open(array('url' => 'verifyUser',  'method' => 'post')) }}
        {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name ="email" placeholder="E-mail" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control"  name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" value="login"  name="login" class="btn btn-primary btn-block btn-flat">Log in</button>
                </div>
                <!-- /.col -->
            </div>
        {{ Form::close() }}

    </div>
    <!-- /.login-box-body -->
</div>
@endsection

