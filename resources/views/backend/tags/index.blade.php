@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/tags/updateAnddelete.js') }}
@endsection
@section('main')
    <div class="col-xs-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bài viết
                    <small>Thẻ</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table table-bordered">
                        <thead>
                        <th>STT</th>
                        <th>Tên thẻ</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($tags as $key => $tag)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tag->title }}</td>
                                <td class="text-right">
                                    {{--<button class="btn btn-sm btn-primary btn-add-per-to-role" data-id="{{$category->id}}"--}}
                                    {{--data-key="{{$key}}"><i class="fa fa-cog"></i> Sửa--}}
                                    {{--</button>--}}
                                    <button class="btn btn-sm btn-danger btn-delete-category" data-id="{{ $tag->id }}"><i
                                                class="fa fa-trash-o"></i> Xoá
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--Phân trang-->
                    {{--@include('backend.includes.pagination', ['data' => $categories])--}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm thẻ mới</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('backend.tag.create') }}" method="POST" data-parsley-validate
                          class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên thẻ<span class="required">*</span></label>
                            <input type="text" id="" name="title" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Tên thẻ">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-role pull-right">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection