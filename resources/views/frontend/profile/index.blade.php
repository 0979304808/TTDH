@extends('frontend.includes.master')
@section('title')
    Thông tin cá nhân
@endsection
@section('content')
    <div class="profile container">
        <h2 class="mt-0">Tài khoản</h2>
        <hr>
        <div class="row">

            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-stacked col-md-3 " role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin tài khoản</a></li>
                <li role="presentation"><a href="#community" aria-controls="community" role="tab" data-toggle="tab">Cộng đồng</a></li>
                <li role="presentation"><a href="#like" aria-controls="like" role="tab" data-toggle="tab">Các bài viết đã thích</a></li>
                <li role="presentation"><a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Các bài viết đã bình luận</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content col-md-9 box-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <h2 class="title-content">Thông tin tài khoản</h2>

                    <div class="text-center">
                        <img class="avatar" src="{{ $user->image ? $user->image : asset('images/img.jpg') }}">
                        <h2 class="name">{{ $user->name }}</h2>

                    </div>

                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" value="{{ $user->name }}" placeholder="Nhập họ tên...">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Nhập mật khẩu...">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Nhập lại mật khẩu...">
                        </div>
                        <div class="text-center">
                            <button  class="btn btn-primary" type="submit">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="community">
                    <h2 class="title-content">Cộng đồng</h2>
                </div>
                <div role="tabpanel" class="tab-pane" id="like">
                    <h2 class="title-content">Các bài viết đã thích</h2>

                </div>
                <div role="tabpanel" class="tab-pane" id="comment">
                    <h2 class="title-content">Các bài viết đã bình luận</h2>

                </div>
            </div>

        </div>

    </div>

@endsection
