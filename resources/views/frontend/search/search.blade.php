@extends('frontend.includes.master')
@section('title')
    Tìm kiếm
@endsection
@section('content')
    <div class="container search">
        <h1 class="text-center title-search">Tìm kiếm</h1>
        <div class="row">
            <div class="col-lg-12">
                <form method="GET">
                    <div class="input-group">
                        <input name="q" type="text" class="form-control" placeholder="Nhập nội dung cần tìm..." value="{{ request('q') }}">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">Tìm kiếm</button>
                      </span>
                    </div>
                </form>

                <div class="quick-search">
                    <h4 class="text-uppercase">Tìm nhanh</h4>
                    <ul>
                        @foreach($tags as $value)
                            <li>
                                <a href="/tim-kiem?q={{ $value }}">{{ $value }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="content">
                    @if(request('q'))
                        <h2>Kết quả ({{ $posts->total() }})</h2>
                        @foreach($posts as $post)
                            <div class="media">
                                <div class="media-left" style="width: 30%">
                                    <a href="/bai-viet/{{ $post->slug }}">
                                        <img class="media-object" src="{{ $post->image }}" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="/bai-viet/{{ $post->slug }}">
                                        <h3 class="media-heading">{{ $post->title }}</h3>
                                    </a>
                                    {{ $post->description }}
                                </div>
                            </div>
                            <hr style="border-top: 1px solid #d0d0d0">
                        @endforeach
                        <div class="text-center">
                            {{ $posts->appends(['q'=>request('q')])->links() }}
                        </div>
                    @endif
                </div>
{{--                <div class="content">--}}
{{--                    @if(request('q'))--}}
{{--                        <h2>Kết quả ({{ count($data) }})</h2>--}}
{{--                        @foreach($data as $dt)--}}
{{--                            <div class="media">--}}
{{--                                <div class="media-left" style="width: 30%">--}}
{{--                                    <a href="{{ isset($dt['slug']) ? '/bai-viet/'.$dt['slug'] : $dt['link']  }}">--}}
{{--                                        <img class="media-object" src="{{ $dt['image'] ?? '' }}" alt="...">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="{{ isset($dt['slug']) ? '/bai-viet/'.$dt['slug'] : $dt['link']  }}">--}}
{{--                                        <h3 class="media-heading">{{ $dt['title'] ?? '' }}</h3>--}}
{{--                                    </a>--}}
{{--                                    {{ $dt['description'] ?? '' }}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr style="border-top: 1px solid #d0d0d0">--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

