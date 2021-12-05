@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/posts/index.js') }}
    <script>
        $("#selectAll").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

        });
        var yourArray = [];
        $('.review').change(function (){
            $("input:checkbox[name='review']:checked").each(function(){
                yourArray.push($(this).val());
                console.log(yourArray);
            });
        });


    </script>
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <div class="">
                <h2 class="col-md-3 col-xs-3">Tất cả bình luận</h2>
                <h2 class="col-md-12 col-xs-12 ">Bài viết : {{ $post->title }} </h2>
                <hr>
                <br><br>
                <div class="form-group col-xs-3">
                    <select class="form-control category" name="category">
                        <option value="all" @if(request('category') == 'all') selected @endif>Tất cả danh mục</option>
                    </select>
                </div>
                <div class="form-group col-xs-3">
                    <select class="form-control author" name="author">
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="text" class="form-control input-search" name="key"
                           placeholder="Nhập id, tên bài viết ..." value="{{ request('search') }}">
                </div>
                <button class="btn btn-primary" id="btn-search-user">Tìm kiếm</button>
                <a href="{{ route('backend.posts') }}">
                    <button class="btn btn-primary pull-right">Tất cả bài viết</button>
                </a>
                <hr>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped jambo_table">
                        <thead>
                        <th class="text-center">
                            <input type="checkbox" id="selectAll">
                            Check all</th>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tài khoản</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Nội dung cha</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Hành động</th>
                        </thead>
                        <tbody>
                        @foreach($comments as $key => $comment)
                            <tr>
                                <th class="text-center">
                                    @if($comment->status == 0 )
                                        <input type="checkbox" class="review" name="review[]" value="{{ $comment->id }}">
                                    @endif
                                </th>
                                <td>{{ $key + 1  }}</td>
                                <td class="text-center">{{ $comment->user->name  }}</td>
                                <td class="text-center">{{ $comment->content }}</td>
                                <td class="text-center">{{ $comment->parent ? $comment->parent->content : 'Chưa có'  }}</td>
                                <td class="text-center">
                                    @if($comment->status == 0 )
                                        <span class="badge badge-primary">Chưa duyệt</span>
                                    @else
                                        <span class="badge badge-info">Đã duyệt</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($comment->status == 0 )
                                        <a class="btn btn-info" href="{{ route('backend.comments.review', ['status' => 1, 'id' => $comment->id]) }}">Duyệt</a>
                                    @else
                                        <a class="btn btn-warning" href="{{ route('backend.comments.review', ['status' => 0, 'id' => $comment->id]) }}">Bỏ duyệt</a>
                                    @endif
                                    <a class="btn btn-success" href="#">Sửa</a>
                                    <a class="btn btn-danger" href="#">Xóa</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="text-center">
{{--                        {!! $posts->appends(['category' => request('category'),'author' => request('author'),'search'=>request('search')])->links() !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
