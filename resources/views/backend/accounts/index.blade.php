@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/auth/account.js') }}
@endsection
@section('main')
<div class="col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách tài khoản</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th class="text-center">Image</th>
                        <th>Quyền</th>
                        <th>Vai trò</th>
                        <th class="text-center">Kích hoạt</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $key => $account)
                        <tr>
                            <td>{{ $key + $accounts->firstItem() }}</td>
                            <td>{{ $account->username }}</td>
                            <td>{{ $account->email }}</td>
                            <td class="text-center"><img src="{{ $account->image ?? asset('images/default.png') }}" alt="" width="50" height="50"></td>
                            <td>
                                @foreach ($account->roles as $role)
                                    <span class="label label-primary">{{$role->display_name}}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($account->permissions as $permission)
                                    <span class="label label-info">{{$permission->display_name}}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if (!$account->hasRole('administrator'))
                                <button class="btn btn-sm {{ ($account->active) ? 'btn-success' : 'btn-default' }} btn-active" data-id="{{ $account->id }}" data-active="{{ !$account->active }}"><i class="fa fa-{{($account->active) ? 'check' : 'close'}}"></i></button>
                                @endif
                            </td>
                            <td class="text-right">
                                @if (!$account->hasRole('administrator'))
                                <button type="button" class="btn btn-sm btn-dark btn-role-for-admin" data-key="{{ $key }}" data-id="{{ $account->id }}"><i class="fa fa-delicious"></i> Role</button>
                                <button type="button" class="btn btn-sm btn-info btn-permission-for-admin" data-key="{{ $key }}" data-id="{{ $account->id }}"><i class="fa fa-cog"></i> Permission</button>
                                <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-delete-project-modal-sm"><i class="fa fa-trash-o"></i></button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--Phân trang-->
                @include('backend.includes.pagination', ['data' => $accounts])
            </div>
        </div>
    </div>
</div>

{{-- Modal list roles --}}
<div class="modal fade modal-role-admin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="">Danh sách quyền</h4>
        </div>
        <div class="modal-body">
            <ul class="to_do">
                @foreach ($roles as $role)
                  <li>
                    <p><input type="checkbox" class="roles" name="{{ $role->name }}" value="{{ $role->id }}"> {{ $role->display_name }} </p>
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

{{-- Modal list permissions --}}
<div class="modal fade modal-permission-admin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="">Danh sách vai trò</h4>
        </div>
        <div class="modal-body">
            <ul class="to_do">
                @foreach ($permissions as $permission)
                  <li>
                    <p><input type="checkbox" class="permissions" name="{{ $permission->name }}" value="{{ $permission->id }}"> {{ $permission->display_name }} </p>
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