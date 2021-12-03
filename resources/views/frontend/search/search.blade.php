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
                        <h2>Kết quả ({{ count($posts) }})</h2>
                        @foreach($posts as $post)
                            {{ $post->title }}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

