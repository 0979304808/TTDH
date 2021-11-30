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
</head>
<div class="banner" id="top">
    <h2>Báo đời sống được cập nhật liên tục</h2>
    <img src="{{ asset('images/banner_2.png') }}">
    <a class="button-top">Top</a>
</div>
<nav class="navbar navbar-default header">
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
                    <li class="dropdown"><a href="#"> Thế Giới<span class="sr-only">(current)</span></a>
                        <ul class="list-news">
                            <li class="item-news"><a class="title-news" href="#">Tư Liệu</a></li>
                            <li class="item-news"> <a class="title-news" href="#">Phân tích</a></li>
                            <li class="item-news"><a class="title-news" href="#">Người Việt 5 châu</a></li>
                            <li class="item-news"><a class="title-news" href="#">Cuộc sống đó đây</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#">Đời sống</a>
                        <ul class="list-news">
                            <li class="item-news"><a class="title-news" href="#">Tư Liệu</a></li>
                            <li class="item-news"> <a class="title-news" href="#">Phân tích</a></li>
                            <li class="item-news"><a class="title-news" href="#">Người Việt 5 châu</a></li>
                            <li class="item-news"><a class="title-news" href="#">Cuộc sống đó đây</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin Tức </a>
                        <ul class="list-news">
                            <li class="item-news"><a class="title-news" href="#">Tư Liệu</a></li>
                            <li class="item-news"> <a class="title-news" href="#">Phân tích</a></li>
                            <li class="item-news"><a class="title-news" href="#">Người Việt 5 châu</a></li>
                            <li class="item-news"><a class="title-news" href="#">Cuộc sống đó đây</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </li>
                    <li class="dropdown"><a href="#" onclick="showFunction()" id="sig-in" data-toggle="modal" data-target="#myModal ">Đăng nhập</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>

<style>
    .list-news {
        position: absolute;
        list-style: none;
        display: none;
        background-color: #F7F7F7;
        width: 165px;
        padding: 6px 6px 10px 6px;
        border-top: solid 2px red;
        margin-left: 15px;
        z-index: 999;
        animation: title-new ease-in 0.2s;

    }
    .navbar-collapse{
        z-index: 88;
    }
    .dropdown:hover .list-news {
        display: block;
    }

    .item-news {
        display: block;
        margin: 15px 0px;

    }

    .title-news {
        display: block;
        text-align: start;
        font-size: 16px;
        font-weight: 350;
        
    }
    .title-news:hover{
        text-decoration: underline;
    }
    .dropdown {
        display: block;
        margin: 0 35px;
    }
    @keyframes title-new{
        from{
            opacity: 0;
            transform: scale(0);
        }
        to{
            opacity: 1;
            transform: scale(1);
        }
    }
    
</style>
{{--//test--}}
