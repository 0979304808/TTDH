@extends('backend.auth.layout')
@section('after-script')
    {{ HTML::script('backend/js/auth/register.js') }}
@endsection
@section('main')
@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
    </div>
@endif

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<form action="{{ route('backend.register') }}" method="POST" name="register-admin">
    @csrf
    <h1>Create Account</h1>
    <div>
        <input type="text" name="name" class="form-control" placeholder="Name" required="" />
    </div>
    <div>
        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
    </div>
    <div>
        <input type="hidden" name="admin" class="form-control" value="1" />
    </div>
    <div>
        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
    </div>
    <div>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirm" required="" />
    </div>
    <div>
        <button type="submit" class="btn btn-default submit btn-register">Submit</button>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <p class="change_link">Already a member ?
            <a href="{{ route('backend.login') }}" class="to_register" style="color: blue"> Log in </a>
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