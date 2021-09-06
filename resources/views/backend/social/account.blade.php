@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/social/account.js') }}
@endsection
@section('main')
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <div class="form-group">
                <button class="btn btn-success" data-toggle="modal" data-target=".bs-modal-create-account">Tạo Tài Khoản</button>
            </div>
            <div class="note">Mật khẩu mặc định cho tài khoản: <strong>{{ config('access.password_default') }}</strong></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">ID</th>
                        <th class="column-title">Username</th>
                        <th class="column-title">Email</th>
                        <th class="column-title">Avatar</th>
                        <th class="column-title">Language</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($userMazii as $key => $value)
                            <tr class="account-{{ $value->userId }}">
                                <td>{{ $value->userId }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <img src="{{ isset($value->profile->image) ? $value->profile->image : url('images/default.png') }}" alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $value->language->name }}</td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger btn-delete-user"  data-key="{{ $key }}" data-id="{{ $value->userId }}"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--Phân trang-->
            {{-- @include('backend.includes.pagination', ['data' => $admins, 'appended' => ['search' => Request::get('search'), 'role' => $params['role']]]) --}}
        </div>
    </div>
</div>

{{-- modal create account --}}
<div class="modal fade bs-modal-create-account" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="">Tạo Tài Khoản Mới</h4>
            </div>
            <div class="modal-body">
                <form name="form-create-account" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="text" name="username" required="required" class="form-control col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="email" name="email" required="required" class="form-control col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image">Avatar &nbsp;
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <input type="file" name="image" class="form-control col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="language">Language <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <select name="language" class="form-control">
                                @foreach ($languages as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-save-account">Save Account</button>
            </div>
        </div>
    </div>
</div>
@endsection