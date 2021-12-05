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
                    <li data-target="#carousel-banner" data-slide-to="{{ $key }}"
                        class="item-o {{ $key == 0 ? 'active' : '' }}"></li>
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
                        </a>
                        <div class=" col-md-7 right">
                            <span>{{ Str::words($value->description, 20,'...') }}</span>
                        </div>


                    @endforeach


                </div>
                <div class="col-md-12 box-highlights">
                    <h3 class="title-top">Nổi bật trong tuần</h3>
                    <hr>
                    <ul>
                        <h3 class="title-like">Tin ưa thích nhất</h3>
                        @foreach($listPostLike as $key => $item)
                            <li>
                                <hr>
                                <a href="/bai-viet/{{ $item->slug }}">
                                    <h4><strong>{{ $key + 1 }}</strong> {{ $item->title }}</h4>
                                </a>

                            </li>
                        @endforeach
                        <hr>
                    </ul>

                    <ul>
                        <h3 class="title-comment">Tin quan tâm nhất</h3>
                        @foreach($listPostComment as $key => $item)
                            <li>
                                <hr>
                                <a href="/bai-viet/{{ $item->slug }}">
                                    <h4><strong>{{ $key + 1 }}</strong> {{ $item->title }}</h4>
                                </a>

                            </li>
                        @endforeach
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
                                @foreach($list_post->posts->take(4) as $post)

                                    <div class="media box-item">

                                        <div class="media-left">
                                            <a href="/bai-viet/{{ $post->slug }}">
                                                <img width="100%" class="media-object" src="{{ $post->image }}"
                                                     alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="/bai-viet/{{ $post->slug }}">

                                                <h3 class="media-heading">
                                                    {{ $post->title }}
                                                </h3>
                                            </a>

                                            <span>
                                                {{ $post->description }}
                                            </span>

                                        </div>
                                    </div>


                                @endforeach
                            @endif

                            <hr style="clear: both">
                        </div>
                    @endforeach

                </div>


            </div>
        </div>

        <div class="row box-relate-to">
            <div class="col-md-12 title-top">
                <h3 style="color: #9f224e">Các bài viết liên quan</h3>
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


    </div>

@endsection

