@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/social/jlpt/index.js') }}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <div class="">
                <h2 class="col-md-3 col-xs-3">Thông tin về kỳ thi JLPT: </h2>
                <hr>
                <br><br>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <input type="text" class="form-control input-search" name="key" placeholder="Nhập id, tên bài viết ..." value="{{ request('search') }}">
                </div>
                <button class="btn btn-primary" id="btn-search-user">Tìm kiếm</button>
                <a href="{{ route('backend.social.jlpt.create') }}"><button class="btn btn-primary pull-right" >Thêm mới bài viết</button></a>
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
                            <th class="text-center">Mô tả</th>
                            <th class="text-center">Nội dung</th>
                            <th class="text-center">Người viết/Thời gian viết</th>
                            <th class="text-center">Biên tập</th>
                        </thead>
                        <tbody>
                            @foreach ($jlpts as $key => $value)
                                <tr class="record_jlpt{{ $value->id }}">
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td><img src="{{ $value->image }}" alt="" style="width: 116px;height: auto;border-radius: 10px;"></td>
                                    <td>{{ $value->shortDes }}</td>
                                    <td class="text-center"><a class="detail-content" style="text-decoration:underline" href="javascript:void(0)" data-content="{{ $value->descHtml }}">Xem chi tiết</a></td>
                                    <td class="text-center">{{isset($value->admin->username) ?  $value->admin->username : '' }} <hr> {{ date('Y-m-d',strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('backend.social.jlpt.create') }}?id={{ $value->id }}"><button class="btn btn-sm btn-primary btn-block"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa</button></a>
                                        <button class="btn btn-sm btn-danger btn-block btn_del" data-id="{{ $value->id }}"><i class="fa fa-trash"></i> Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $jlpts->appends(['search'=>request('search')])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- modal --}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal-detail">
    <div class="modal-dialog custom-modal-detail-news modal-lg" style="width:1200px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body text-news"></div>
        </div>
    </div>
</div>
@endsection
