<div class="row" id="paginate">
    <div class="col-sm-12">
        <div class="dataTables_info">
            Hiển thị <strong>{!! ($data->total() > $data->perPage()) ? $data->perPage() : $data->total()  !!}</strong>/<strong>{!! $data->total() !!}</strong> bản ghi
        </div>
    </div>
    <div class="col-sm-12">
        <div class="dataTables_paginate paging_simple_numbers">
            {!! $data->onEachSide(8)->appends(isset($appended) ? $appended : '')->render() !!}
        </div>
    </div>
</div>