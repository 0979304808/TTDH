<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap-3.3.7/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/master.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<div class="banner" id="top">
    <h2>Báo đời sống được cập nhật liên tục</h2>
    <img src="{{ asset('images/banner_2.png') }}">
    <a class="button-top">Top</a>
</div>
<nav class="navbar navbar-default header nav-top">
    <div class="container-body">
        <div class="container-fluid ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand header-logo" href="/">TinDoiSong.Tk</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li class="dropdown {{ Request::is('tin-tuc') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="item-news"><a class="title-news" href="/danh-muc/to-am">Tổ ấm</a></li>
                            <li class="item-news"> <a class="title-news" href="/danh-muc/bai-hoc-song">Bài học sống</a></li>
                            <li class="item-news"><a class="title-news" href="/danh-muc/nha">Nhà</a></li>
                            <li class="item-news"><a class="title-news" href="/danh-muc/tieu-dung">Tiêu dùng</a></li>
                        </ul>
                    </li>

                    <li class="dropdown {{ Request::is('cong-dong') ? 'active' : '' }}"><a href="/cong-dong"> Cộng đồng<span class="sr-only">(current)</span></a>
                        {{-- <ul class="list-news">--}}
                        {{-- <li class="item-news"><a class="title-news" href="#">Tư Liệu</a></li>--}}
                        {{-- <li class="item-news"> <a class="title-news" href="#">Phân tích</a></li>--}}
                        {{-- <li class="item-news"><a class="title-news" href="#">Người Việt 5 châu</a></li>--}}
                        {{-- <li class="item-news"><a class="title-news" href="#">Cuộc sống đó đây</a></li>--}}
                        {{-- </ul>--}}
                    </li>
                    <li class="dropdown {{ Request::is('ve-chung-toi') ? 'active' : '' }}"><a href="/ve-chung-toi"> Về chúng tôi</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="/tim-kiem" >
                            <img id="search-icon"  src="{{ asset('/images/search.png') }}">
                        </a>
                    @if(Auth::check())
                    <li class="dropdown">
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle admin-circle" style="margin: 5.5px -8px;" viewBox="0 0 16 16">--}}
{{--                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />--}}
{{--                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />--}}

{{--                        </svg>--}}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img style="width: 19px; border-radius: 20px; margin-right: 10px" src="{{ asset('/images/img.jpg') }}">
                        {{ Auth::user()->name }} 
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="item-news"><a class="title-news" href="{{ route('frontend.profile.index', Auth::id())  }}">Tài khoản</a></li>
                            <li class="item-news"> <a class="title-news" href="{{ route('frontend.logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>


                    @else
                    <li class="dropdown">
                        <a href="#"  id="sig-in" data-toggle="modal" data-target="#my-Modal">
                            Đăng nhập
                        </a>
                    </li>
                    @endif

                </ul>

            </div>
        </div>
    </div>
</nav>


<style>
        .nav-top ul li a:hover  {
            color: #9f224e !important;
        }
</style>