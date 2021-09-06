@extends('backend.layouts.master')
@section('after-script')
    {{--{{ HTML::script('backend/js/code/codesended.js') }}--}}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="col-md-3 col-xs-3">Danh sách mã đã gửi: </h2>
                <hr><br>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Lọc:</p>
                    <select name="sort" class="form-control">
                        <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="old" {{ request('sort') == 'old' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <p>Tìm kiếm:</p>
                    <select name="state" class="form-control">
                        {{--@foreach ($state as $k => $v)--}}
                            {{--<option value="{{ $k }}" {{ $status == $k ? 'selected' : '' }}>{{ $v }}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <p>Nhập mã code:</p>
                    <input type="text" class="form-control input-search" placeholder="Nhập mã code..."
                        value="">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <th class="text-center">STT</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">NV gửi mã</th>
                            <th class="text-center">Thời hạn</th>
                            <th class="text-center">Lý do</th>
                            <th class="text-center">User kích hoạt</th>
                            <th class="text-center">User đặt mua</th>
                            <th class="text-center">Biên tập</th>
                        </thead>
                        <tbody>
                            @foreach ($codes as $key => $code)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <span>{{ $code->code }}</span>
                                        {{--<span--}}


                                            {{--class="pull-right label label- {{ $code->state == 0 ? 'default' : ($code->state == 1 ? 'warning' : 'success') }}">{{ $state[$code->state] }}--}}
                                        {{--</span>--}}
                                    </td>
                                    <td>
                                        {{--@if (isset($code->purchase->admin->username))--}}
                                            {{--{{ $code->purchase->admin->username }}--}}
                                        {{--@endif--}}
                                    </td>
                                    <td>
                                        {{--{{ $code->day_active != 10 ? $expired[$code->day_active] : '' }}--}}
                                    </td>
                                    <td> </td>
                                    <td>
                                        {{--@if (isset($code->active) && !empty($code->active))--}}
                                            {{--<p>{{ 'id: ' . $code->active->userId }}</p>--}}
                                            {{--<p>{{ 'email: ' . $code->active->user->email }}</p>--}}
                                            {{--<p>{{ 'username: ' . $code->active->user->username }}</p>--}}
                                        {{--@endif--}}
                                    </td>
                                    <td>
                                        @if (isset($code->order))
                                            <p>{{ 'email:' . $code->order->email }}</p>
                                            <p>{{ 'phone:' . $code->order->phone }}</p>
                                            <p>{{ 'name:' . $code->order->name }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" style="float: right">
                                            <button type="button"
                                                class="btn btn-sm btn-recalled {{ in_array($state, [0, 2]) ? 'disabled' : 'btn-primary' }}"
                                                data-key="{{ $code->serialkey }}">
                                                Thu hồi
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
