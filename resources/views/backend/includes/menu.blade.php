<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    @role('administrator|manager|editor')
    <div class="menu_section">
        <h3>Cộng đồng</h3>
        <ul class="nav side-menu">
            <li class="{{ Request::is('social') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Cộng đồng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li class="{{ Request::is('social/accounts') ? 'active' : '' }}">
                        <a href="{{ route('backend.social.account') }}">Tài khoản</a>
                    </li>
                    <li class="{{ Request::is('social/jlpt') ? 'active' : '' }}">
                        <a href="{{ route('backend.social.jlpt.index') }}">Thông tin về JLPT</a>
                    </li>
                    {{--<li class="{{ Request::is('posts') ? 'active' : '' }}">--}}
                        {{--<a href="{{ route('backend.post.form') }}">Bài viết mới</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
        </ul>
    </div>
    @endrole

    @role('administrator|manager|editor')
        <div class="menu_section">
            <h3>Bài viết</h3>
            <ul class="nav side-menu">
                <li class="{{ Request::is('auth') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Bài viết <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('posts') ? 'active' : '' }}">
                            <a href="{{ route('backend.post') }}">Danh sách</a>
                        </li>
                        <li class="{{ Request::is('posts') ? 'active' : '' }}">
                            <a href="{{ route('backend.post.form') }}">Bài viết mới</a>
                        </li>
                        <li class="{{ Request::is('categories') ? 'active' : '' }}">
                            <a href="{{ route('backend.category') }}">Danh mục</a>
                        </li>
                        <li class="{{ Request::is('tags') ? 'active' : '' }}">
                            <a href="{{ route('backend.tag') }}">Thẻ</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    @endrole


    @role('administrator')
        <div class="menu_section">
            <h3>Quản lý </h3>
            <ul class="nav side-menu">
                <li class="{{ Request::is('code') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Quản lý mã bản quyền <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('code') ? 'active' : '' }}">
                            <a href="{{ route('backend.code.transaction') }}">Phiên giao dịch</a>
                        </li>
                        <li class="{{ Request::is('code') ? 'active' : '' }}">
                            <a href="{{ route('backend.code.codesended')}}">Mã đã gửi</a>
                        </li>
                        <li class="{{ Request::is('code') ? 'active' : '' }}">
                            <a href="{{ route('backend.user.usersubscribe') }}">User Subscribes</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('job') ? 'active' : '' }}"><a><i class="fa fa-folder-open-o" aria-hidden="true"></i> Quản lý Jobbs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="{{ Request::is('job') ? 'active' : '' }}">
                            <a href="{{ route('backend.job.index') }}">Danh sách công việc</a>
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