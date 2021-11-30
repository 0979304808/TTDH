@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/categories/updateAnddelete.js') }}
@endsection
@section('main')
    <div class="col-xs-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>
    <div class="col-xs-4">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm danh mục mới</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('backend.category.create') }}" method="POST" data-parsley-validate
                      class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên danh mục<span class="required">*</span></label>
                        <input type="text" id="" name="name" required="required"
                               class="form-control col-md-7 col-xs-12" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-add-role pull-right">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xs-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bài viết
                    <small>Danh mục</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table table-bordered">
                        <thead>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="text-right">
                                    <a href="{{ route('backend.category') }}?id={{ $category->id }}" class="btn btn-sm btn-primary btn-add-per-to-role"><i class="fa fa-cog"></i> Sửa</a>
                                    <button class="btn btn-sm btn-danger btn-delete-category"
                                            data-id="{{ $category->id }}"><i
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

@endsection
