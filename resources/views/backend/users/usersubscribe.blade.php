@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/users/usersubscribe.js') }}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <ul id="myTab" class="nav nav-tabs bar_tabs">
                <li  class="{{ Request::is('*code/transaction') ? 'active' : ""}}"><a href="{{route('backend.code.transaction')}}"
                        aria-expanded="false">Phiên giao dịch</a>
                </li>
                <li  class="{{ Request::is('*user/usersubscribe') ? 'active' : ""}}"><a href="{{route('backend.user.usersubscribe')}}"
                        aria-expanded="true">User đăng ký</a>
                </li>
            </ul>
            <div class="x_title">
                <h2 class="col-md-3 col-xs-3">Danh sách User đăng ký: </h2>
                <hr><br>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Lọc:</p>
                    <select name="start_time" class="form-control">
                        <option value="desc" {{($start_time == 'desc') ? 'selected' : ''}}>Mới nhất</option>
                        <option value="asc" {{($start_time == 'asc') ? 'selected' : ''}}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p>Từ khóa:</p>
                    <input type="text" class="form-control input-search"
                        placeholder="Nhập username, email, tên gói ..." value="{{ (!is_null($search)) ? $search : '' }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-xs-4">Tổng: {{ $list_usersubscribes->total() }}</div>
            <div class="x_content">
                <div class="table-responsive">
                   <div class="row text-center"> {!!  $list_usersubscribes->links() !!}</div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tên gói</th>
                            <th class="text-center">Start time</th>
                            <th class="text-center">Expiry time</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Oder ID</th>
                            <th class="text-center">Price amount</th>
                            <th class="text-center">Price currency</th>
                        </thead>
                        <tbody>
                            @foreach ($list_usersubscribes as $user)
                                <tr>
                                    <td>{{ $user->user->username }}</td>
                                    <td>{{ $user->user->email }}</td>
                                    <td>{{ $user->package_name }}</td>
                                    <td>{{ $user->start_time }}</td>
                                    <td>{{ $user->expiry_time }}</td>
                                    <td>{{ $user->country }}</td>
                                    <td>{{ $user->order_id }}</td>
                                    <td>{{ $user->price_amount }}</td>
                                    <td>{{ $user->price_currency }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row text-center"> {!!  $list_usersubscribes->links() !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
