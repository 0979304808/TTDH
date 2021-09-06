@extends('backend.layouts.master')
@section('main')
@include('backend.includes.previous', ['back_link' => URL::previous()])
<div class="row">
  <div class="col-xs-12">
    <div class="col-xs-4">
      <div class="x_panel">
        <div class="x_content">
          <div class="col-xs-12 profile_left">
            <div class="profile_img">
                <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="{{ (!is_null($user->image)) ? $user->image : url('images/default.png') }}" alt="Avatar" title="Change the avatar">
                </div>
            </div>
            <h3>{{ $user->username }}</h3>
			<form action="{{ route('backend.profile.image', ['admin' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="{{ $user->id }}">
                </div>
                <button type="submit" class="btn btn-success btn-user-update-image">Update Image</button>
            </form>
            <ul class="list-unstyled user_data">
                <li><i class="fa fa-envelope-o"></i> {{ $user->email }}
                </li>
                <li><i class="fa fa-calendar"></i> {{ $user->created_at->format("d-m-Y") . " ( " . $user->created_at->diffForHumans() ." )" }}
                </li>
            </ul>
            @if ($user->id !== Auth::id())
                <a class="btn btn-danger btn-user-block" data-id="{{ $user->id }}"><i class="fa fa-lock"></i> Block</a>
            @endif
            <br />

          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-8">
      <div class="x_panel">
        <div class="x_title">
          <h2>Account</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if(session('errors'))
                <div class="alert alert-danger">
                    <span>{{ session('errors') }}</span>
                </div>
            @endif

            @if(session('success'))
                    <div class="alert alert-success">
                        <span>{{ session('success') }}</span>
                    </div>
            @endif

          <!-- start form for validation -->
          <form data-parsley-validate action="{{ route('backend.profile.update', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <label for="fullname">Name * :</label>
            <input type="text" id="username" class="form-control" name="username" value="{{ $user->name }}" required />

            <label for="email">Email * :</label>
            <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}" disabled />
            
            <label for="email">Password :</label>
            <input type="password" id="password" class="form-control" name="password" required />

            <br/>
            <button type="submit" class="btn btn-success btn-user-update">Update</button>
        </form>
        <!-- end form for validations -->

        </div>
      </div>
    </div>
  </div>
</div>
@endsection