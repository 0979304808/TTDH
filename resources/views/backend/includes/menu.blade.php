<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    @role('administrator|manager|editor')
    <div class="menu_section">
        <h3>Quản lý</h3>
        <ul class="nav side-menu">
            <li class="{{ Request::is('post') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="{{ Request::is('post') ? 'active' : '' }}">
                        <a href="{{ route('backend.posts')  }}">Tất cả bài viết</a>
                    </li>
                    <li class="{{ Request::is('post/create') ? 'active' : '' }}">
                        <a href="{{ route('backend.posts.create') }}">Bài viết mới</a>
                    </li>
                    <li class="{{ Request::is('post/detail') ? 'active' : '' }}">
                        <a href="{{ route('backend.posts.detail') }}">Chi tiết bài viết {{ request('post') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    @endrole

    <div class="menu_section">
        <h3>Tài khoản</h3>
        <ul class="nav side-menu">
            @role('administrator')
            <li class="{{ Request::is('auth') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Tài khoản <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="{{ Request::is('account') ? 'active' : '' }}">
                        <a href="{{ route('backend.account') }}">Danh sách</a>
                    </li>
                    <li class="{{ Request::is('role') ? 'active' : '' }}">
                        <a href="{{ route('backend.role') }}">Phân quyền - vai trò</a>
                    </li>
                </ul>
            </li>
            @endrole
            <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ route('backend.profile', ['admin' => Auth::id()]) }}"><i class="fa fa-user" aria-hidden="true"></i> Thông tin cá nhân</a></li>
        </ul>
    </div>

</div>
