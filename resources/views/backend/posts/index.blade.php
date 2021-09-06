@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/posts/categoryAndtag.js') }}
    {{ HTML::script('backend/js/posts/updateAnddelete.js') }}
    {{ HTML::script('backend/js/posts/search.js') }}
@endsection
@section('main')
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="col-md-3 col-xs-3">Danh sách bài viết </h2>
                <hr><br>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Danh mục:</p>
                    <select name="category" class="form-control">
                            <option value="all" @if(request('category') == 'all' ) selected @endif >Tất cả</option>
                        @foreach($categories as $key=>$value)
                            <option value="{{ $value->id }}" @if(request('category') == $value->id ) selected @endif>{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Thẻ:</p>
                    <select name="tag" class="form-control">
                            <option value="all" @if(request('tag') == 'all' ) selected @endif >Tất cả</option>
                        @foreach($tags as $key=>$value)
                            <option value="{{ $value->id }}" @if(request('tag') == $value->id ) selected @endif>{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p>Từ khóa:</p>
                    <input type="text" class="form-control input-search"
                        placeholder="Nhập tiêu đề, mô tả ..." value="{{ request('search') }}">
                </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 col-xs-4">Tổng: {{ count($posts)}} </div>
        <div class="x_content">
            <div class="table-responsive">
                <table   class="table table-striped jambo_table table-bordered">
                    <thead>
                        <th class="text-center">STT</th>
                        <th class="text-center" >Tiêu đề</th>
                        <th class="text-center" >Mô tả</th>
                        <th class="text-center" >Ảnh Bìa</th>
                        <th class="text-center" >Tác giả</th>
                        <th class="text-center" >Danh mục</th>
                        <th class="text-center" >Thẻ</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td class="text-center"><img src="{{ $post->img ?? asset('images/default.png') }}" alt="" width="50" height="50"></td>
                            <td>{{ $post->author->username }}</td>
                            <td>
                                @foreach ($post->categories as $category)
                                    <span class="label label-primary">{{$category->title}}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="label label-primary">{{$tag->title}}</span>
                                @endforeach
                            </td>
                            <td class="text-right">
                                @if (!$post->hasRole('administrator'))
                                <button type="button" class="btn btn-sm btn-dark btn-role-for-admin" data-key="{{ $key }}" data-id="{{ $post->id }}"><i class="fa fa-delicious"></i> Danh mục</button>
                                <button type="button" class="btn btn-sm btn-info btn-permission-for-admin" data-key="{{ $key }}" data-id="{{ $post->id }}"><i class="fa fa-cog"></i> Thẻ</button>
                                <a type="button" class="btn btn-sm btn-primary" href="{{ route('backend.post.form',['id' => $post->id]) }}"><i class="fa fa-pencil"></i></a>
                                <button type="button" class="btn btn-sm btn-danger btn-delete-post"  data-key="{{ $key }}" data-id="{{ $post->id }}"><i class="fa fa-trash-o"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--Phân trang-->
                @include('backend.includes.pagination', ['data' => $posts])
            </div>
        </div>
    </div>
</div>

{{-- Modal list category --}}
<div class="modal fade modal-role-admin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="">Danh mục</h4>
        </div>
        <div class="modal-body">
            <ul class="to_do">
                @foreach ($categories as $category)
                  <li>
                    <p><input type="checkbox" class="roles" name="{{ $category->title }}" value="{{ $category->id }}"> {{ $category->title }} </p>
                  </li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-save-change-role-admin">Cập nhật</button>
        </div>

      </div>
    </div>
</div>

{{-- Modal list tag --}}
<div class="modal fade modal-permission-admin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="">Thẻ</h4>
        </div>
        <div class="modal-body">
            <ul class="to_do">
                @foreach ($tags as $tag)
                  <li>
                    <p><input type="checkbox" class="permissions" name="{{ $tag->title }}" value="{{ $tag->id }}"> {{ $tag->title }} </p>
                  </li>
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-save-change-permission">Cập nhật</button>
        </div>

      </div>
    </div>
</div>

@endsection