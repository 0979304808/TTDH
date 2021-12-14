@extends('frontend.includes.master')
@section('title')
    Danh mục | {{ $category->name }}
@endsection
@section('content')
    <div class="list-post-category container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="title-category">{{ $category->name }}</h2>
                <hr style="border-top: 1px solid #d0d0d0">
            </div>
            <div class="col-md-9 box-left">


                <div class="banner-category">

                    <div class="media">
                        <div class="box-baner col-md-7" >
                            <a href="/bai-viet/{{ $posts[0]->slug }}">
                                <img class="media-object" src="{{ $posts[0]->image }}" alt="...">
                            </a>
                        </div>
                        <div style="padding: 15px" class="box-baner col-md-5">
                            <a href="/bai-viet/{{ $posts[0]->slug }}">
                                <h4 class="media-heading">{{ $posts[0]->title }}</h4>
                            </a>
                            {{ $posts[0]->description }}
                        </div>

                    </div>

                </div>


                @foreach($posts as $key => $post)
                    @if($key != 0 )
                        <hr style="border-top: 1px solid #d0d0d0">
                        <div class="media">
                            <div class="media-left">
                                <a href="/bai-viet/{{ $post->slug }}">
                                    <h4 class="media-heading">{{ $post->title }}</h4>
                                </a>
                                {{ $post->description }}
                            </div>
                            <div class="media-body" style="width: 20%">
                                <a href="/bai-viet/{{ $post->slug }}">
                                    <img class="media-object" src="{{ $post->image }}" alt="...">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
            <div class="col-md-3">

                @foreach($categories as $category)
                    <h3 class="title-category-relate">{{ $category->name }}</h3>
                    @foreach($category->posts->take(3) as $key => $post)


                        <div style="clear: both">
                            <a href="/bai-viet/{{ $post->slug }}">
                                @if($key == 0 )
                                    <img src="{{ $post->image }}">
                                @endif
                                <h4>{{ $post->title }}</h4>
                            </a>

                        </div>
                        <hr style="border-top: 1px solid #d0d0d0">

                    @endforeach

                @endforeach
                <h4>Quảng cáo</h4>

            </div>
            <div class="col-md-12 text-center">
                <hr>
                {{ $posts->links() }}
            </div>
        </div>

    </div>

@endsection
