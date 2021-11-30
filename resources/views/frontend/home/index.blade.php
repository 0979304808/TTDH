@extends('frontend.includes.master')
@section('title')
Trang chủ
@endsection
@section('content')
<div class="home container">
    <div id="carousel-banner" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($banner as $key => $value)
            <li data-target="#carousel-banner" data-slide-to="{{ $key }}" class="item-o {{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($banner as $key => $item)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <div class="box-banner-top row">
                    <div class="col-md-5 box-left">
                        <a href="/bai-viet/{{ $item->slug }}">
                            <img class="media-object" src="{{ $item->image }}" alt="...">
                        </a>
                    </div>
                    <div class="col-md-7 box-right">
                        <a href="/bai-viet/{{ $item->slug }}">
                            <h3>{{ $item->title }}</h3>
                            <span>{{ $item->description }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>




    <div class="box-content row">
        <div class="content-left col-md-4 row">

            <div class="box-item-category col-md-12">
                <div class="col-md-12">
                    <h3 class="title-category">Tin mới nhất</h3>
                </div>
                @foreach($posts_new as $key => $value)

                <div class="col-md-12">
                    <hr>
                </div>
                <a href="/bai-viet/{{ $value->slug }}">
                    <h3 class="col-md-12 title">{{ Str::words($value->title, 10,'...') }}</h3>
                    <div class="col-md-5 left">
                        <img class="media-object" src="{{ $value->image }}" alt="...">
                    </div>

                    <div class=" col-md-7 right">
                        <span>{{ Str::words($value->description, 20,'...') }}</span>
                    </div>
                </a>


                @endforeach


            </div>
            <div class="col-md-12 box-highlights">
                <h3 class="title-top">Nổi bật trong tuần</h3>
                <hr>
                <ul>
                    <h3 class="title-like">Ưa thích nhất</h3>
                    <li>
                        <a href="#">
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <hr>
                </ul>

                <ul>
                    <h3 class="title-comment">Quan tâm nhất</h3>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <li>
                        <a>
                            <h4>1. Các bài viết mới</h4>
                        </a>
                    </li>
                    <hr>
                </ul>
            </div>


        </div>
        <div class="content-right col-md-8">

            <div class="box-content">

                @foreach($post_category as $list_post)

                <div class="item">
                    <h4 class="title-category">{{ $list_post->name }}</h4>
                    <div class="view-all-post">
                        <a href="/danh-muc/{{ $list_post->slug }}">Xem tất cả</a>
                    </div>
                    @if(count($list_post->posts) > 0 )
                    @foreach($list_post->posts->take(3) as $post)
                    <div class="media box-item">

                        <div class="media-left">
                            <a href="/bai-viet/{{ $post->slug }}">
                                <img width="100%" class="media-object" src="{{ $post->image }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="/bai-viet/{{ $post->slug }}">
                                <h3 class="media-heading">
                                    {{ $post->title }}
                                </h3>
                                <span>
                                    {{ $post->description }}
                                </span>
                            </a>

                        </div>
                    </div>

                    @endforeach
                    @endif

                    <hr>
                </div>
                @endforeach

            </div>


        </div>
    </div>

    <div class="row box-relate-to">
        <div class="col-md-12 title-top">
            <h3>Các bài viết liên quan</h3>
        </div>
        @foreach($relate as $key => $value)

        <div class="col-md-3 ">
            <div class="box-item">
                <a href="/bai-viet/{{ $value->slug }}">
                    <div class="thumbnail">
                        <img src="{{ $value->image }}" alt="...">
                        <div class="caption">
                            <h3>{{ Str::words($value->title, 15,'...') }}</h3>
                            <p>{{ Str::words($value->description, 20, '...') }}</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>


        @endforeach



    </div>




    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="baoz123" id="baoz1234">
            <center>
                <div class="contain">
                    <svg onclick="hideFunction()" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    <div class="contain1">
                        <h1>Xin chào</h1>
                        <p>Đăng nhập để tiếp tục trải nhiệm trọn vẹn hơn nhé!</p>
                        <div class="asdfsw1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <input class="email-sig-in" type="email" placeholder="Email/Tên đăng nhập"><br>
                        </div>
                        <div class="asdfsw1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                            </svg><input class="pass-sig-in" id="myInput" type="password" placeholder="Mật khẩu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </div>
                        <ul class="remember-fogot">
                            <li><a class="text-12" href=""><input type="checkbox"> nhớ tôi</a></li>
                            <li><a class="text-123" href=""> Quên mật khẩu?</a></li>
                        </ul>
                        <button class="button login__submit">
                            <span class="button__text">Đăng Nhập</span>

                        </button>
                        <p style="text-align: center; margin: 10px;">hoặc đăng nhập bằng</p>
                        <ul class="remember-fogot1">
                            <li class="cach-nhau-ra1">
                                <button class="btn-login-with">
                                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg></a>
                                </button>
                            </li>
                            <li class="cach-nhau-ra">
                                <button class="btn-login-with">
                                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                        </svg></a>
                                </button>
                            </li>
                        </ul>
                        <p>bạn chưa có tài khoản?<a style="text-decoration: none; cursor: pointer;" onclick="nextFunction()"> Đăng kí ngay!</a> </p>
                    </div>
                </div>
            </center>
        </div>
        <div class="baoz1234" id="baoz123">

            <center>
                <div class="contain">
                    <svg onclick="hideFunction()" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                    <div class="contain1">
                        <h1>Xin chào</h1>
                        <p>Đăng nhập để tiếp tục trải nhiệm trọn vẹn hơn nhé!</p>
                        <div class="asdfsw1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <input class="email-sig-in" type="email" placeholder="Email/Tên đăng nhập"><br>
                        </div>
                        <div class="asdfsw1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                            </svg><input id="myInput" class="pass-sig-in" type="password" placeholder="Mật khẩu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </div>
                        <div class="asdfsw1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                            </svg><input id="myInput" class="pass-sig-in" type="password" placeholder="Nhập lại mật khẩu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick="MyFunction()" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </div>
                        <ul class="remember-fogot">
                            <li>
                                <p class="text-12" href=""><input type="checkbox"> Khi bấm tạo tài khoản bạn đã <a style="text-decoration: none; color: orangered;" href="">đồng ý</a> với <br>quy định của chúng tôi</p>
                            </li>

                        </ul>
                        <button class="button login__submit">
                            <span class="button__text">Tạo tài khoản</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </button>
                        <p style="text-align: center; margin-top: 15px;">hoặc đăng nhập bằng</p>
                        <ul class="remember-fogot1">
                            <li class="cach-nhau-ra1">
                                <button class="btn-login-with">
                                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg></a>
                                </button>
                            </li>
                            <li class="cach-nhau-ra">
                                <button class="btn-login-with">
                                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                        </svg></a>
                                </button>
                            </li>
                        </ul>
                        <p>bạn đã có tài khoản?<a style="text-decoration: none; cursor: pointer;" onclick="nextFunction1()"> Đăng nhập ngay!</a> </p>
                    </div>
                </div>
            </center>
        </div>
    </div>


</div>
</div>
<script>
    function hideFunction() {
        $('#myModal').modal('hide');
    }

    function nextFunction() {
        document.getElementById("baoz123").style.display = "block";

        document.getElementById("baoz1234").style.display = "none";
    }

    function nextFunction1() {

        document.getElementById("baoz123").style.display = "none";

        document.getElementById("baoz1234").style.display = "block";

    }

    function showFunction() {
        document.getElementById("baoz123").style.display = "none";
        document.getElementById("baoz1234").style.display = "block";
    }

    function MyFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
<style>
    .modal {
        z-index: 9999999;
    }

    .baoz123 {
        display: none;
    }

    .bi-caret-right-square {
        margin-left: 100px;
    }

    .remember-fogot1 {
        display: flex;
        margin-left: -5px;
        list-style: none;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px;
        border-radius: 26px;
        border: 1px solid #D4D3E8;
        text-transform: uppercase;
        font-weight: 400;
        display: flex;
        align-items: center;
        width: 100%;
        color: #4C489D;
        box-shadow: 0px 2px 2px #5C5696;
        cursor: pointer;
        transition: .2s;
    }

    .button__text {
        font-weight: 700;
        margin: 0 auto;
    }

    .email-sig-in {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 400;
        width: 89%;
        transition: .2s;
        font-size: 14px;

    }

    .btn-login-with {
        width: 120px;
        height: 30px;
        border-radius: 4px;
        text-decoration: none;
        align-items: center;
        background-color: #e0e0e0;
        border: none;
    }

    .asdfsw1 {
        position: relative;
        margin-top: 10px;
    }

    .email-sig-in:active,
    .email-sig-in:focus,
    .email-sig-in:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .pass-sig-in:active,
    .pass-sig-in:focus,
    .pass-sig-in:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .pass-sig-in {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 400;
        width: 89%;
        transition: .2s;
        font-size: 14px;
    }

    .bi-person-circle {
        position: absolute;
        top: 10px;
        color: #7875B5;
    }

    .remember-fogot {
        display: flex;
        list-style: none;
        margin-top: 10px;
    }

    .bi-shield-lock-fill {
        position: absolute;
        top: 10px;
        color: #7875B5;
    }

    .text-123 {
        text-decoration: none;
        text-align: end;
        margin-left: 10px;
    }

    .text-12 {
        text-decoration: none;
        margin-left: -25px;

    }

    .contain {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
        width: fit-content;
        height: auto;
        padding: 40px;
        margin-top: 120px;
        border-radius: 10px;
        animation: title-new ease-in 0.2s;
    }

    @keyframes title-new {
        from {
            opacity: 0;
            transform: scale(0);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .bi-facebook {
        color: blue;
    }


    .cach-nhau-ra {
        margin-left: 20px;
    }

    .bi-x-circle {
        position: absolute;
        right: 5;
        top: 5;
        cursor: pointer;

    }

    .bi-x-circle:hover {
        color: rgb(200, 230, 230);
    }

    .contain {
        position: relative;
    }

    .bi-eye {
        top: 15px;
        right: 20px;
        position: absolute;
        cursor: pointer;
    }

    .bi-eye:hover {
        background-color: #f5f5f5;
    }
</style>