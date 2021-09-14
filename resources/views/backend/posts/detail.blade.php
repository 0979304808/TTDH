@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/posts/detail.js') }}
    <style>
        p {
            text-align: center;
        }
        .box-child-comment {
            margin-bottom: 10px;
        }
        .btn-comment{
            border : none;
        }
        .editable {
            cursor: pointer;
            border : none ; 
        }
    </style>
@endsection
@section('before-script')
    {{ HTML::script('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}
    {{ HTML::script('vendors/jquery.hotkeys/jquery.hotkeys.js') }}
    {{ HTML::script('vendors/google-code-prettify/src/prettify.js') }}
@endsection
@section('main')
    @if(request('post'))
        <div class="content">
            <div class="col-xs-9">
                <div class="col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div>
                                <div class="col-xs-10">
                                    @foreach($post->categories as $key => $category)
                                        {{ $category->name }} -
                                    @endforeach
                                </div>
                                <div class="col-xs-2">Ngày đăng: {{ date('d/m/Y',strtotime($post->created_at)) }}</div>
                            </div>
                            <br>
                            <h3 class="title text-center"><strong>{!! $post->title !!}</strong></h3>
                            <br>
                            <div class="post-description" style="overflow-wrap: break-word;">
                                {!! $post->description !!}
                            </div>
                            <div class="clearfix"></div>
                            <div class="post-content" style="overflow-wrap: break-word;" >
                                {!! $post->content !!}
                            </div>
                        </div>
                        <button class="btn btn-default btn-comment" data-id="{{ $post->id }}"><i
                                class="fa fa-comments"></i> Comments <span>({{ count($post->comments) }})</span>
                        </button>
                        <div class="comments-{{$post->id}} hidden">
                            <hr>
                            <div class="x_content">
                                <div class="text-editor">
                                    <div class="col-xs-1 post-img">
                                        <img width="50px" height="50px" style="border-radius: 100px" src="{{ Auth::user()->image }}"
                                             alt="">
                                    </div>
                                    <div class="col-xs-11">
                                        @include('backend.includes.editor', ['id' => $post->id, 'type' => 'comment', 'height' => 60])
                                    </div>
                                </div>
                            </div>
                            @foreach ($post->comments as $index => $comment)
                                <div class="box-comment col-xs-12">
                                    <div class="post-head">
                                        <div class="col-xs-1 post-img">
                                            <img width="50px" height="50px" style="border-radius: 100px"
                                                src="{{ empty($comment->user->image) ? url('images/user.png') : $comment->user->image }}"
                                                alt="">
                                        </div>
                                        <div class="col-xs-11">
                                            <div class="parent col-xs-12">
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                           role="button" aria-expanded="false"><i
                                                                class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="javascript:void();"
                                                                   class="btn btn-edit-comment"
                                                                   data-id="{{ $comment->id }}" data-type="comment"
                                                                   data-toggle="modal"
                                                                   data-target=".bs-modal-edit-comment-{{$comment->id}}">Edit</a>
                                                            </li>
                                                            <li><a href="javascript:void();"
                                                                   class="btn btn-delete-comment"
                                                                   data-id="{{ $comment->id }}" data-type="comment">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <strong>{{ $comment->user->name }}</strong>
                                                <br>
                                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                                                <div class="post-content" style="overflow-wrap: break-word;" data-type="text">
                                                    <span class="editable" data-id="{{ $comment->id }}" data-type="textarea">{!! $comment->content !!}</span>
                                                </div>
                                                <button class="btn btn-default btn-comment btn-child pull-right"
                                                        data-id="{{$comment->id}}"><i class="fa fa-comment">
                                                        ({{ count($comment->childComments) }})</i></button>
                                            </div>
                                            <div class="box-child-comments-{{$comment->id}} hidden">
                                                <div class="childs col-xs-12">
                                                    @foreach ($comment->childComments as $child)
                                                        <div class="box-comment box-child-comment col-xs-12">
                                                            <div class="col-xs-1 post-img">
                                                                <img width="50px" height="50px" style="border-radius: 100px"
                                                                    src="{{ empty($child->user->image) ? url('images/user.png') : $child->user->image }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <strong>{{ $child->user->name }}</strong>
                                                                <br>
                                                                <span>{{ $child->created_at->diffForHumans() }}</span>
                                                                <div class="post-content"
                                                                     style="overflow-wrap: break-word;" >
                                                                    <span class="editable" data-id="{{ $child->id }}" data-type="textarea">{!! $child->content !!}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-1">
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li class="dropdown">
                                                                        <a href="#" class="dropdown-toggle"
                                                                           data-toggle="dropdown" role="button"
                                                                           aria-expanded="false"><i
                                                                                class="fa fa-wrench"></i></a>
                                                                        <ul class="dropdown-menu" role="menu">
                                                                            <li><a href="javascript:void();"
                                                                                   class="btn btn-edit-comment"
                                                                                   data-id="{{ $child->id }}"
                                                                                   data-type="child" data-toggle="modal"
                                                                                   data-target=".bs-modal-edit-child-{{$child->id}}">Edit</a>
                                                                            </li>
                                                                            <li><a href="javascript:void();"
                                                                                   class="btn btn-delete-comment"
                                                                                   data-id="{{ $child->id }}"
                                                                                   data-type="child">Delete</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- Modal edit comment-->
                                                        <div class="modal fade bs-modal-edit-child-{{$child->id}}"
                                                             tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"><span
                                                                                aria-hidden="true">×</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="">Sửa bài viết</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form name="form-create-account"
                                                                              enctype="multipart/form-data"
                                                                              class="form-horizontal form-label-left">
                                                                            <div class="form-group">
                                                                                <div class="col-xs-12">
                                                                                    <div class="btn-toolbar editor"
                                                                                         data-role="editor-toolbar-edit-child-{{$child->id}}"
                                                                                         data-target="#editor-edit-child{{$child->id}}">
                                                                                        <div class="btn-group">
                                                                                            <a class="btn"
                                                                                               data-edit="bold"
                                                                                               title="Bold (Ctrl/Cmd+B)"><i
                                                                                                    class="fa fa-bold"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="italic"
                                                                                               title="Italic (Ctrl/Cmd+I)"><i
                                                                                                    class="fa fa-italic"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="underline"
                                                                                               title="Underline (Ctrl/Cmd+U)"><i
                                                                                                    class="fa fa-underline"></i></a>
                                                                                        </div>
                                                                                        <div class="btn-group">
                                                                                            <a class="btn"
                                                                                               data-edit="insertunorderedlist"
                                                                                               title="Bullet list"><i
                                                                                                    class="fa fa-list-ul"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="insertorderedlist"
                                                                                               title="Number list"><i
                                                                                                    class="fa fa-list-ol"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="outdent"
                                                                                               title="Reduce indent (Shift+Tab)"><i
                                                                                                    class="fa fa-dedent"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="indent"
                                                                                               title="Indent (Tab)"><i
                                                                                                    class="fa fa-indent"></i></a>
                                                                                        </div>
                                                                                        <div class="btn-group">
                                                                                            <a class="btn"
                                                                                               data-edit="justifyleft"
                                                                                               title="Align Left (Ctrl/Cmd+L)"><i
                                                                                                    class="fa fa-align-left"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="justifycenter"
                                                                                               title="Center (Ctrl/Cmd+E)"><i
                                                                                                    class="fa fa-align-center"></i></a>
                                                                                            <a class="btn"
                                                                                               data-edit="justifyfull"
                                                                                               title="Justify (Ctrl/Cmd+J)"><i
                                                                                                    class="fa fa-align-justify"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div
                                                                                        id="editor-edit-child-{{$child->id}}"
                                                                                        data-id="{{ $child->id }}"
                                                                                        class="editor-wrapper"
                                                                                        style="min-height: 60px;">
                                                                                        {!! $child->content !!}
                                                                                    </div>

                                                                                    <div class="form-group pull-right"
                                                                                         style="margin-top: 8px;">
                                                                                        <button
                                                                                            class="btn btn-sm btn-primary btn-edit-submit-comment form-control"
                                                                                            data-type="child"
                                                                                            data-id="{{ $child->id }}">
                                                                                            Submit
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-xs-12 editor-child-{{$comment->id}}">
                                                    <div class="text-editor">
                                                        <div class="col-xs-1 post-img">
                                                            <img width="50px" height="50px" style="border-radius: 100px" src="{{ Auth::user()->image }}" alt="">
                                                        </div>
                                                        <div class="col-xs-11">
                                                            @include('backend.includes.editor', ['id' => "child-$comment->id", 'type' => 'child', 'height' => 60])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal edit comment-->
                                <div class="modal fade bs-modal-edit-comment-{{$comment->id}}" tabindex="-1"
                                     role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="">Sửa bài viết</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form name="form-create-account" enctype="multipart/form-data"
                                                      class="form-horizontal form-label-left">
                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <div class="btn-toolbar editor"
                                                                 data-role="editor-toolbar-edit-comment-{{$comment->id}}"
                                                                 data-target="#editor-edit-comment{{$comment->id}}">
                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="bold"
                                                                       title="Bold (Ctrl/Cmd+B)"><i
                                                                            class="fa fa-bold"></i></a>
                                                                    <a class="btn" data-edit="italic"
                                                                       title="Italic (Ctrl/Cmd+I)"><i
                                                                            class="fa fa-italic"></i></a>
                                                                    <a class="btn" data-edit="underline"
                                                                       title="Underline (Ctrl/Cmd+U)"><i
                                                                            class="fa fa-underline"></i></a>
                                                                </div>
                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="insertunorderedlist"
                                                                       title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                                                    <a class="btn" data-edit="insertorderedlist"
                                                                       title="Number list"><i class="fa fa-list-ol"></i></a>
                                                                    <a class="btn" data-edit="outdent"
                                                                       title="Reduce indent (Shift+Tab)"><i
                                                                            class="fa fa-dedent"></i></a>
                                                                    <a class="btn" data-edit="indent"
                                                                       title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                                                </div>
                                                                <div class="btn-group">
                                                                    <a class="btn" data-edit="justifyleft"
                                                                       title="Align Left (Ctrl/Cmd+L)"><i
                                                                            class="fa fa-align-left"></i></a>
                                                                    <a class="btn" data-edit="justifycenter"
                                                                       title="Center (Ctrl/Cmd+E)"><i
                                                                            class="fa fa-align-center"></i></a>
                                                                    <a class="btn" data-edit="justifyfull"
                                                                       title="Justify (Ctrl/Cmd+J)"><i
                                                                            class="fa fa-align-justify"></i></a>
                                                                </div>
                                                            </div>

                                                            <div id="editor-edit-comment-{{$comment->id}}"
                                                                 data-id="{{ $comment->id }}" class="editor-wrapper"
                                                                 style="min-height: 60px;">
                                                                {!! $comment->content !!}
                                                            </div>

                                                            <div class="form-group pull-right" style="margin-top: 8px;">
                                                                <button
                                                                    class="btn btn-sm btn-primary btn-edit-submit-comment form-control"
                                                                    data-type="comment" data-id="{{ $comment->id }}">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit post-->
            <div class="modal fade bs-modal-edit-post-{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="">Sửa bài viết</h4>
                        </div>
                        <div class="modal-body">
                            <form name="form-create-account" enctype="multipart/form-data"
                                  class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        {{--                                    <select name="category" id="category-edit-post-{{$post->id}}" class="form-control">--}}
                                        {{--                                        @foreach ($categories as $id => $category)--}}
                                        {{--                                            <option value="{{ $category->id }}" {{($post->category_id == $category->id) ? 'selected' : ''}}>{{ $category->name }}</option>--}}
                                        {{--                                        @endforeach--}}
                                        {{--                                    </select>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        {{--                                    <input type="text" name="title" required="required" id="title-edit-post-{{$post->id}}" value="{!!$post->title!!}" class="form-control col-xs-12">--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        {{--                                    <div class="btn-toolbar editor" data-role="editor-toolbar-edit-post-{{$post->id}}" data-target="#editor-edit-post{{$post->id}}">--}}
                                        {{--                                        <div class="btn-group">--}}
                                        {{--                                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="btn-group">--}}
                                        {{--                                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="btn-group">--}}
                                        {{--                                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>--}}
                                        {{--                                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}

                                        {{--                                    <div id="editor-edit-post-{{$post->id}}" data-id="{{ $post->id }}" class="editor-wrapper" style="min-height: 60px;">--}}
                                        {{--                                        {!! $post->content !!}--}}
                                        {{--                                    </div>--}}

                                        <div class="form-group pull-right" style="margin-top: 8px;">
                                            {{--                                        <button class="btn btn-sm btn-primary btn-edit-submit form-control" data-type="post" data-id="{{ $post->id }}">Submit</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- right tab --}}
            <div class="col-xs-3">
                <div class="x_panel">
                    @foreach ($listPost as $key => $value)
                        <div class="x_title">
                            <a href="{{ route('backend.posts.detail').'?post='.$value->id }}">{{ $value->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    @endif
@endsection
