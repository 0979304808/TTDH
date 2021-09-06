@extends('backend.layouts.master')
@section('after-script')
    {{ HTML::script('backend/js/jobs/index.js') }}
@endsection
@section('main')
    <div class="col-md-12 col-xs-12" style="position: -webkit-sticky; position: sticky; top: 0;">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="col-md-3 col-xs-3">Danh sách bài viết tuyển dụng: </h2>
                <hr>
                <br>
                <div class="btn-group col-xs-2">
                    <p>Hình thức làm việc:</p>
                    <select name="type" class="form-control type_select">
                        <option value="all" @if(request('type') === 'all') selected @endif >Tất cả</option>
                        <option value="1" @if(request('type') === '1') selected @endif>Online</option>
                        <option value="0" @if(request('type') === '0') selected @endif>Offline</option>
                    </select>
                </div>
                <div class="btn-group col-xs-2">
                    <p>Quốc gia:</p>
                    <select name="country" class="form-control country_select">
                        <option value="all">Tất cả</option>
                        @foreach ($list_country as $key => $value)
                            <option value="{{ $key }}"
                                    @if(request('country') === $key) selected @endif >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="btn-group col-xs-2">
                    <p>Tỉnh/Thành phố:</p>
                    <select name="province" class="form-control province_select">
                        <option value="all" @if(request('province') === 'all') selected @endif>Tất cả</option>
                        @if (request('country') !== 'all' && request('country') !== null)
                            @foreach ($list_province[request('country')] as $key => $value)
                                <option value="{{ $key }}"
                                        @if(request('province') === $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="btn-group col-xs-2">
                    <p>Trạng thái:</p>
                    <select name="active" class="form-control active_select">
                        <option value="all" @if(request('active') === 'all') selected @endif>Tất cả</option>
                        <option value="1" @if(request('active') === '1') selected @endif>Đã duyệt</option>
                        <option value="0" @if(request('active') === '0') selected @endif>Chưa duyệt</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <p>Tìm kiếm:</p>
                    <input type="text" class="form-control input-search" name="search"
                           placeholder="Nhập ID, tiêu đề bài viết ..." value="{{ request('search') }}">
                    <button class="btn btn-primary" id="btn-search-job">Tìm kiếm</button>
                </div>
                <div class="clearfix"></div>
                <button class="btn btn-sm btn-success btn_active_listjob">Duyệt</button>
            </div>
            <div class="col-md-2 col-xs-2">Tổng: {{ $jobs->total() }}</div>
            <div class="x_content">
                <div class="table-responsive">
                    <div class="text-center"></div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <td><br><input type="checkbox" class="check_all_job"></td>
                        <th class="text-center">ID</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Tiêu đề</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Khu vực</th>
                        <th class="text-center">Hình thức làm việc</th>
                        <th class="text-center">Created</th>
                        <th class="text-center">Trạng Thái</th>
                        <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                        @if (count($jobs->items()) > 0)
                            @foreach ($jobs as $key => $value)
                                <tr class="tr_{{ $value->id }} text-center">
                                    <td class="td_check_list_job">
                                        @if (!$value->active)
                                            <input type="checkbox" class="check_list_job check_hidden{{$value->id}}" data-id="{{$value->id}}">
                                        @endif
                                    </td>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->user->username }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td><a href="" class="detail_job" data-toggle="modal"
                                           data-target=".bs-create-project-modal-sm" data-id="{{ $value->id }}">Xem chi
                                            tiết</a></td>
                                    <td>
                                        <p>{{ $list_province[$value->country][$value->province] }}</p>
                                        <p>{{ $list_country[$value->country] }}</p>
                                    </td>
                                    <td>{{ $value->type ? 'Online' : 'Offline' }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td class="td_active{{ $value->id }}">
                                        @if ($value->active === 1)
                                            <p>Đã duyệt</p>
                                        @else
                                            <button class="btn btn-sm btn-success btn_active_job"
                                                    data-id="{{ $value->id }}">Duyệt
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger btn-block btb_del_job"
                                                data-id="{{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                            Xoá
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="text-center">{{ $jobs->appends(['type'=> request('type'),'active'=> request('active'),'country'=> request('country'),'province'=> request('province'),'search'=>request('search')])->links() }}</div>

                </div>
            </div>
        </div>
    </div>
    <div class="clear-fix"></div>

    {{-- Modal create project --}}
    <div class="modal fade bs-create-project-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="">Chi tiết bài viết</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <label>Tiêu đề:
                        </label>
                        <p id="title"></p>
                    </div>
                    <br>
                    <div>
                        <label>Hình thức làm việc:
                        </label> <span id="type"> </span><br>
                        <label>Ngành nghề:
                        </label> <span id="majors"> </span><br>
                        <label>Địa chỉ:
                        </label> <span id="address"> </span>
                    </div>
                    <br>
                    <div>
                        <label>Mức lương:
                        </label>
                        <p id="salary"></p>
                    </div>
                    <br>
                    <div>
                        <label>Yêu cầu:
                        </label>
                        <p id="require"></p>
                    </div>
                    <br>
                    <div>
                        <label>Quyền lợi:
                        </label>
                        <p id="benifit"></p>
                    </div>
                    <br>
                    <div>
                        <label>Nội dung chi tiết:
                        </label>
                        <p id="description"></p>
                    </div>
                    <br>
                    <div>
                        <label>Thông tin công ty/ nhà tuyển dụng:
                        </label><span id="company_info"> </span><br><br>
                        <label>Email:
                        </label> <span id="email"> </span>
                        <label>Số điện thoại:
                        </label> <span id="phone"> </span>
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                </div>

            </div>
        </div>
    </div>
@endsection
