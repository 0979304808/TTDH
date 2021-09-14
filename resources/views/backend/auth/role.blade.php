@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/auth/roleAndPermission.js') }}
@endsection
@section('main')
    <div class="col-xs-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table table-bordered">
                        <thead>
                        <th>STT</th>
                        <th>Role</th>
                        <th>Description</th>
                        <th>Permission</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $key + $roles->firstItem() }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="label label-info">{{ $permission->display_name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    @if ($role->name != 'administrator')
                                        <button class="btn btn-sm btn-primary btn-add-per-to-role"
                                                data-id="{{$role->id}}" data-key="{{$key}}"><i class="fa fa-cog"></i>
                                            Gắn vai trò
                                        </button>
                                        <button class="btn btn-sm btn-danger btn-delete-role" data-id="{{ $role->id }}">
                                            <i class="fa fa-trash-o"></i> Xoá
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--Phân trang-->
                    @include('backend.includes.pagination', ['data' => $roles])
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm quyền mới</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('backend.role.create') }}" method="POST" data-parsley-validate
                          class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên <span class="required">*</span></label>
                            <input type="text" id="" name="name" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Tên quyền">
                        </div>
                        <div class="form-group">
                            <label for="display_name">Tên hiện thị <span class="required">*</span></label>
                            <input type="text" id="" name="display_name" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Tên hiển thị">
                        </div>
                        <div class="form-group">
                            <label for="description">Chú thích <span class="required">*</span></label>
                            <input type="text" id="" name="description" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Chức năng">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-role pull-right">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thêm vai trò mới</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('backend.permission.create') }}" method="POST" data-parsley-validate
                          class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên <span class="required">*</span></label>
                            <input type="text" id="" name="name" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Tên vai trò">
                        </div>
                        <div class="form-group">
                            <label for="display_name">Tên hiện thị <span class="required">*</span></label>
                            <input type="text" id="" name="display_name" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Tên hiển thị">
                        </div>
                        <div class="form-group">
                            <label for="description">Chú thích <span class="required">*</span></label>
                            <input type="text" id="" name="description" required="required"
                                   class="form-control col-md-7 col-xs-12" placeholder="Chức năng">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-add-permission pull-right">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal list permissions --}}
    <div class="modal fade bs-add-permission-role-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="">Danh sách vai trò</h4>
                </div>
                <div class="modal-body">
                    <ul class="to_do">
                        @foreach ($permissions as $permission)
                            <li>
                                <p><input type="checkbox" name="{{ $permission->name }}"
                                          value="{{ $permission->id }}"> {{ $permission->display_name }} </p>
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
