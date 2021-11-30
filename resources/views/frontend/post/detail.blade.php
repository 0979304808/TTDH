@extends('frontend.includes.master')
@section('script')
    {{ HTML::script('frontend/comment.js') }}
@endsection
@section('title')
    Chi tiết bài viết
@endsection
@section('content')
    <div class="post-detail container">

        <div class="row">
            <div class="box-left col-md-9">
                <div class="top">
                    <span class="category">
                        <a href="/danh-muc/{{ ($post->categories)[0]->slug }}">{{ ($post->categories)[0]->name }}</a>
                    </span>
                    <span class="date">{{ $post->created_at->format('H:s d-m-Y') }}</span>
                </div>
                <h2 class="title">{{ $post->title }}</h2>
                <div class="description">
                    {{ $post->description }}
                </div>
                <div class="image">
                    <img src="{{ $post->image }}">
                </div>
                <div class="content">
                    {!! $post->content !!}
                </div>
                <hr>
                <div class="comment">
                    <h3>Ý kiến (50)</h3>
                    <form class="form">
                        @csrf
                        <input type="hidden" id="post_id" value="{{ $post->id }}">
                        <textarea class="input-form form-control" id="content_comment" name="content" id="" cols="10" rows="3"  placeholder="Ý kiến của bạn"></textarea>
                        <button type="button" class="btn btn-primary btn-submit-comment">Bình luận</button>
                    </form>
{{--                    {{ dd($post->comments) }}--}}
                    @foreach($post->comments as $item)
                        <div class="parent media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object" src="{{ asset('images/img.jpg') }}" alt="...">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading">Media heading</h5>
                                <p>Bài viết này hay quá</p>
                                <span>
                                <a href="#">Trả lời</a>
                            </span>
                                <span>
                                <a href="#">2h trước</a>
                            </span>


                                <div class="child">

                                    <div class="parent media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="{{ asset('images/img.jpg') }}" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">Media heading</h5>
                                            <p>Bài viết này hay quá</p>
                                            <span>
                                            <a href="#">Trả lời</a>
                                        </span>
                                            <span>
                                             <a href="#">2h trước</a>
                                        </span>
                                        </div>
                                    </div>

                                    <div class="parent media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="{{ asset('images/img.jpg') }}" alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading">Media heading</h5>
                                            <p>Bài viết này hay quá</p>
                                            <span>
                                            <a href="#">Trả lời</a>
                                        </span>
                                            <span>
                                             <a href="#">2h trước</a>
                                        </span>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    @endforeach



                    <div class="shore-more text-center">
                        <a style="display: block" href="#">Xem thêm</a>
                    </div>

                </div>
            </div>
            <div class="box-right col-md-3">
                <h3 class="title">Cùng danh mục</h3>
                @foreach($listPost as $key => $value)
                    <a href="/bai-viet/{{ $value->slug }}">
                        <div class="thumbnail">
                            <img src="{{ $value->image }}" alt="...">
                            <div class="caption">
                                <h4>{{ $value->title }}</h4>
                                <p>{{ Str::words($value->description, 10, '...') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

    </div>

@endsection
