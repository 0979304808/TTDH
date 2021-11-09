@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/posts/index.js') }}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <div class="">
                <h2 class="col-md-3 col-xs-3">Tất cả các bài viết: </h2>
                <hr>
                <br><br>
                <div class="form-group col-xs-3">
                    <select class="form-control category" name="category">
                        <option value="all" @if(request('category') == 'all') selected @endif>Tất cả danh mục</option>
                        @foreach ($categories as $key => $value)
                            <option value="{{$value->id}}"
                                    @if(request('category') == $value->id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-xs-3">
                    <select class="form-control author" name="author">
                        <option value="all" @if(request('author') == 'all') selected @endif>Tất cả tác giả</option>
                        @foreach ($author as $key => $value)
                            <option value="{{$value->id}}"
                                    @if(request('author') == $value->id) selected @endif>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="text" class="form-control input-search" name="key"
                           placeholder="Nhập id, tên bài viết ..." value="{{ request('search') }}">
                </div>
                <button class="btn btn-primary" id="btn-search-user">Tìm kiếm</button>
                <a href="{{ route('backend.posts.create') }}">
                    <button class="btn btn-primary pull-right">Thêm mới bài viết</button>
                </a>
                <hr>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped jambo_table">
                        <thead>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Người viết/Thời gian viết</th>
                        <th class="text-center">Danh mục</th>
                        <th class="text-center">Biên tập</th>
                        </thead>
                        <tbody>
                        @foreach ($posts as $key => $value)
                            <tr class="record_jlpt{{ $value->id }}">
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $value->title }}</td>
                                <td class="text-center"><img src="{{ $value->image ?? asset('images/default.png') }}"
                                                             alt=""
                                                             style="width: 116px;height: auto;border-radius: 10px;">
                                </td>
                                <td class="text-center"><a href="javascript:;" class="detail-content"
                                                           style="text-decoration:underline"
                                                           data-content="{{ $value->content }}">Xem chi tiết</a></td>
                                <td class="text-center">{{isset($value->user->name) ?  $value->user->name : '' }}
                                    <hr> {{ date('Y-m-d',strtotime($value->created_at)) }}</td>
                                <td class="text-center">
                                    @foreach($value->categories as $category)
                                        <span class="label label-primary">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary btn-category-for-post "
                                            data-key="{{ $key }}"
                                            data-id="{{ $value->id }}"><i class="fa fa-delicious"></i> Danh mục
                                    </button>
                                    <a href="{{ route('backend.posts.create').'?id='.$value->id }}">
                                        <button class="btn btn-sm btn-dark "><i class="fa fa-wrench"
                                                                                aria-hidden="true"></i> Sửa
                                        </button>
                                    </a>
                                    <button class="btn btn-sm btn-danger  btn_del" data-id="{{ $value->id }}">
                                        <i class="fa fa-trash"></i> Xóa
                                    </button>

                                    <a href="{{ route('backend.posts.detail').'?post='.$value->id }}">
                                        <button class="btn btn-sm btn-info "><i class="fa fa-wrench"
                                                                                aria-hidden="true"></i> Chi tiết bài
                                            viết
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $posts->appends(['category' => request('category'),'author' => request('author'),'search'=>request('search')])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal content --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-detail">
        <div class="modal-dialog custom-modal-detail-news modal-lg" style="width:1200px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title title-news"></h4>
                </div>
                <div class="modal-body text-news">
                </div>
            </div>
        </div>
    </div>

    {{-- Modal list category --}}
    <div class="modal fade modal-category-admin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="">Danh mục</h4>
                </div>
                <div class="modal-body">
                    <ul class="to_do">
                        @foreach ($categories as $category)
                            <li>
                                <p><input type="checkbox" class="categories" name="{{ $category->name }}"
                                          value="{{ $category->id }}"> {{ $category->name }} </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-save-change-category-admin">Cập nhật</button>
                </div>

            </div>
        </div>
    </div>
@endsection
