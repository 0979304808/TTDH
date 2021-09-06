@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/code/transaction.js') }}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <ul id="myTab" class="nav nav-tabs bar_tabs" >
                <li  class="{{ Request::is('*code/transaction') ? 'active' : ""}}"><a href="{{route('backend.code.transaction')}}" 
                        aria-expanded="true">Phiên giao dịch</a>
                </li>
                <li  class="{{ Request::is('*users/usersubscribe') ? 'active' : ""}}"><a href="{{route('backend.user.usersubscribe')}}" 
                        aria-expanded="false">User đăng ký</a>
                </li>
            </ul>
            <div class="x_title">
                <h2 class="col-md-3 col-xs-3">Danh sách phiên giao dịch: </h2>
                <hr><br>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Lọc:</p>
                    <select name="sort" class="form-control">
                        <option value="new" @if( request('sort') == 'new') selected @endif >Mới nhất</option>
                        <option value="old" @if( request('sort') == 'old') selected @endif>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Tìm kiếm:</p>
                    <select name="provider" class="form-control">
                        @foreach ($providers as $key => $value)
                            <option value="{{ $key }}" @if(request('filter') == $key) selected  @endif>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p>Từ khóa:</p>
                    <input type="text" class="form-control input-search"
                        placeholder="Nhập user id, email, transaction ..." value="{{ request('search') }}">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-xs-4">Tổng: {{ count($premiumMazii) }}</div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="text-center">User ID</th>
                            <th class="text-center">User name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Transaction</th>
                            <th class="text-center">Provider</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Expried</th>
                        </thead>
                        <tbody>
                            @foreach ($premiumMazii as $key => $value)
                                <tr>
                                    <td>{{ $value->userId }}</td>
                                    <td>{{ isset($value->user->username) ? $value->user->username : '' }}</td>
                                    <td>{{ isset($value->user->email) ? $value->user->email : '' }}</td>
                                    <td>{{ $value->transaction}}
                                    @if ($value->provider == 'card')
                                        <button data-toggle="modal" data-target=".modal_purchase" data-code="{{ $value->transaction }}" class="btn btn-xs btn-primary pull-right purchase_detail">Chi tiết đơn</button>
                                    @endif
                                    </td>
                                    <td>{{ $value->provider }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>{{ $value->expire_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $premiumMazii->appends(['filter' => request('filter'),'sort' => request('sort'),'search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Purchase --}}
    <div class="modal fade bs-create-project-modal-sm modal_purchase" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:500px;">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="">Thông tin Đơn hàng</h4>
                </div>
                <div class="modal-body">
                    <div >
                        <label >Họ tên: </label><span id="name_p" class="label_text"></span><br>
                        <label >Phương thức giao dịch: </label> Code <br>
                        <label >Mã: </label>  <span id="code_p" class="label_text"> </span>
                        <span class="pull-right"><label >Gói:</label> <span id="items_p" class="label_text"> </span></span><br>
                        <span class="pull-right"><label >Giá:</label> <span id="price_p" class="label_text"> </span></span><br>
                        <label >Thời gian mua:</label><span id="created_at_p" class="label_text"> </span><br>
                        <label >Email: </label> <span id="email_p" class="label_text"> </span><br>
                        <label >Địa chỉ: </label> <span id="address_p" class="label_text"> </span><br>
                        <label >Số điện thoại:</label><span id="phone_p" class="label_text"> </span><br>
                        <label >Thời gian hoàn thành:</label><span id="time_success_p" class="label_text"> </span><br>
                        <label >Nhân viên:</label><span id="salesman_p" class="label_text"> </span><br>
                        <label >Nhật ký:</label><span id="care_dairy_p" class="label_text"> </span><br>

                    </div><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                </div>

            </div>
        </div>
    </div>
@endsection
