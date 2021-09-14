@extends('backend.layouts.master')

@section('title', 'Admin-News')
@section('after-css')
    <style>
        .box-body {
            padding: 10px;
        }

        img {
            border-radius: 10px;
        }
    </style>
@endsection
@section('after-script')
    <script src="{{ asset('backend/js/posts/create.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('descHtml', {
            width: '100%',
            height: 800,
            filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}",
            filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
            filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",
            filebrowserUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",
            filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
            filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
        });
    </script>@endsection
@section('main')
    <div class="row">
        @if(request('id'))
            <a href="{{ route('backend.posts.create') }}">
                <button class="btn btn-success pull-right">Thêm mới bài viết</button>
            </a>
        @endif
        <div class="page-title">
            <div class="title_left">
                <h3>{{ request('id') ? 'Cập nhật bài viết:' : 'Thêm bài viết mới:' }}</h3>
            </div>
        </div>
        <hr>

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

        <form action="{{ request('id') ? route('backend.posts.update') : route('backend.posts.store') }}" method="POST"
              enctype="multipart/form-data" id="frm_create_jlpt">
            <div class="box-body row">
                @csrf
                @if(request('id'))
                    @method('PUT')
                @else
                    @method('POST')
                @endif
                <input type="hidden" name="id" value="{{ request('id') }}">
                <div class="form-group col-xs-7">
                    <label>Ngày đăng:</label>
                    <div class="input-group date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="date" name="created_at" class="form-control" placeholder="Ngày đăng"
                               value="{{ isset($post) ? date('Y-m-d',strtotime($post->created_at)) : '' }}" required>
                    </div>
                </div>
                <div class="form-group col-xs-5">
                    <label>Tác giả:</label>
                    <input class="form-control" value="{{ isset($post->user->name) ? $post->user->name : Auth::user()->name  }}" readonly>
                </div>
                <div class="form-group col-xs-12">
                    <label>Chọn danh mục:</label>
                    <ul class="to_do">
                        @foreach ($categories as $category)
                            <li>
                                <p><input type="checkbox" class="categories" name="categories[]"
                                          value="{{ $category->id }}"
                                          @if(isset($categories_name)) @if(array_key_exists($category->name,$categories_name)) checked @endif @endif > {{ $category->name }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group col-md-12">
                    <label class="title">Tiêu đề:</label>
                    <input type="text" class="form-control auto-pinyin" name="title" placeholder="Tiêu đề..."
                           value="{{ isset($post->title) ? $post->title : '' }}" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Mô tả:</label>
                    <textarea class="form-control none-resize auto-pinyin" placeholder="Mô tả..." name="description"
                              rows="8" required>{{ isset($post->description) ? $post->description : '' }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>{{ request('id') ? 'Hình ảnh đang dùng:' : 'Hình ảnh:'}}</label><br>
                    <div class="col-xs-12 text-center" style="margin-bottom: 20px;">
                        <img src="{{ isset($post->image) ? $post->image : ''  }}" alt="" width="300px" id="current_img">
                    </div>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Hình ảnh"
                           @if(!request('id')) required @endif>
                </div>
                <div class="bg-news-content col-md-12">
                    <label>Nội dung:</label>
                    <textarea placeholder="Nội dung..." id="descHtml" class="form-control none-resize auto-pinyin"
                              name="content" rows="14"
                              required>{{ isset($post->content) ? $post->content : '' }}</textarea>
                </div>
            </div>
            <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-primary"
                        id="btn-send-news">{{ request('id') ? 'Cập nhật' : 'Thêm bài viết' }}
                    <i class="fa fa-arrow-circle-right"></i>
                </button>
            </div>
        </form>
    </div>

@endsection
