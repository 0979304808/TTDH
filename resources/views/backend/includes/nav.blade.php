<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('backend.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{ config('app.name') }} Team!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <a href="">
                <div class="profile_pic">
                    <img src="{{ (!empty(Auth::user()->image)) ? Auth::user()->image : url('images/img.jpg') }}" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </a>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
    @include('backend.includes.menu')
    <!-- /sidebar menu -->

    </div>
</div>