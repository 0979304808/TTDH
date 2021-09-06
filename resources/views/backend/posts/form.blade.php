@extends('backend.layouts.master')
{{--  @section('after-script')

@endsection  --}}
@section('main')
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bài Viết<small>Bài viết mới</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <br />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form action="{{ route('backend.post.create') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiêu đề <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="title" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Tiêu đề ..." value="{{ isset($post->title) ? $post->title : '' }}">
                            </div>
                        </div>
                        @if(isset($post))

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ảnh bìa đang sử dụng <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="hidden" name="id" value="{{ isset($post->id) ? $post->id : '' }}">
                                    <img width="50px" height="50px" src="{{ $post->img ? $post->img : asset('images/default.png') }}">
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ảnh bìa mới <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="img" type="file" id="last-name"  required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="description" class="form-control col-md-7 col-xs-12" placeholder="Mô tả ..." >{{ isset($post->description) ? $post->description : '' }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>

                    <!--Phân trang-->
                    {{--@include('backend.includes.pagination', ['data' => $posts])--}}
                </div>
            </div>
        </div>
    </div>

@endsection