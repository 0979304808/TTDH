<div class="page-title">
    <div class="title_left">
        <h3>@yield('page_title')</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <form action="{{ $action }}" method="get">
                <div class="input-group">
                    <input type="text" id="input-search" name="search" class="form-control" value="{{ !empty(Request::get('search')) ? Request::get('search') : '' }}" placeholder="Search for...">
                    <span class="input-group-btn">
                    <button class="btn btn-default btn-search" type="submit">Go!</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>