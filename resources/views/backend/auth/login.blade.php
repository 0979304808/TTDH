@extends('backend.auth.layout')
@section('main')
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
    </div>
@endif
<form action="{{route('backend.login')}}" method="POST">
    {{ csrf_field() }}
    <h1>Login Form</h1>
    <div>
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required="" />
    </div>
    <div>
        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
    </div>
    <div>
        <input type="hidden" class="form-control" name="active" value="1" />
    </div>
    <div>
        <button class="btn btn-default" type="submit">Log in</button>
        <a class="reset_pass" href="#">Lost your password?</a>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <p class="change_link">New to site?
        <a href="{{ route('backend.register') }}" class="to_register"  style="color: blue"> Create Account </a>
        </p>

        <div class="clearfix"></div>
        <br />

        <div>
        <h1><i class="fa fa-paw"></i> {{ config('app.team') }} Team!</h1>
        <p>©2019 All Rights Reserved.</p>
        </div>
    </div>
</form>
@endsection