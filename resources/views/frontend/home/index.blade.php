@extends('frontend.includes.master')
@section('content')
    <div class="home container">
        <div class="box-banner-top row">
            <div class="col-md-5 box-left">
                <a href="#">
                    <img class="media-object" src="{{ asset('images/banner1.jpg') }}" alt="...">
                </a>
            </div>
            <div class="col-md-7 box-right">
                <a href="#">
                    <h3>Media heading
                        Media heading
                        Media heading
                        Media heading
                        Media heading
                    </h3>
                    <span>>Media heading Media heading Media heading Media heading Media heading Media heading Media heading </span>
                </a>
            </div>
        </div>


        <div class="box-content row">
            <div class="content-left col-md-4 row">

                <div class="box-item-category col-md-12">

                    <h3 class="col-md-12 title">Baif viet moi nhat</h3>
                    <div class="col-md-5 left">
                        <a href="#">
                            <img class="media-object" src="{{ asset('images/banner1.jpg') }}" alt="...">
                        </a>
                    </div>
                    <div class=" col-md-7 right">
                        <span>Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay</span>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <h3 class="col-md-12 title">Baif viet moi nhat</h3>
                    <div class="col-md-5 left">
                        <a href="#">
                            <img class="media-object" src="{{ asset('images/banner1.jpg') }}" alt="...">
                        </a>
                    </div>
                    <div class=" col-md-7 right">
                        <span>Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay Bài viết mới nhất mới được cập nhật hôm nay</span>
                    </div>

                </div>




            </div>
            <div class="content-right col-md-8">


                <div class="media banner-top">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{ asset('images/banner1.jpg') }}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="#">
                            <h3 class="media-heading">Media heading
                                Media heading
                                Media heading
                                Media heading
                                Media heading
                            </h3>
                            <span>>Media heading Media heading Media heading Media heading Media heading Media heading Media heading </span>
                        </a>
                    </div>
                </div>



            </div>
        </div>


        <div class="box-relate-to row">
            <div class="col-md-12">
                <h3>Nổi bật trong tuần</h3>
            </div>
            <div class="col-md-3 ">
                <div class="box-item">a</div>
            </div>
            <div class="col-md-3 ">
                <div class="box-item">a</div>
            </div>
            <div class="col-md-3 ">
                <div class="box-item">a</div>
            </div>
            <div class="col-md-3 ">
                <div class="box-item">a</div>
            </div>

        </div>


    </div>





    {{--    <div class="home">--}}
    {{--        <header class="header-top">--}}
    {{--            <div class="title-img-logo">--}}
    {{--                <img class="img-logo" src="{{ asset('frontend/images/logo.png') }}" alt="">--}}
    {{--                <a href="" class="sologan">News 24h</a>--}}
    {{--                <div class="intro">--}}
    {{--                    <marquee><a class="text-intro"> News 24h đáp ứng tiêu chí: Nhanh - Chính Xác - Miễn phí - Cập nhật--}}
    {{--                            24/24</a></marquee>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <ul class="list-item item-log">--}}

    {{--                <li class="item text-item1">--}}
    {{--                    <form class="search-input">--}}
    {{--                        <input class="size-search" type="search" placeholder="tìm kiếm..." aria-label="Search">--}}
    {{--                        <button class="size-search1" type="submit">Search</button>--}}
    {{--                    </form>--}}
    {{--                </li>--}}
    {{--                <li class="item text-item1"><a href="#" id="quynh22" class="text-item ">--}}
    {{--                        <i class="bi bi-person-circle"></i>--}}
    {{--                        Đăng nhập</a></li>--}}
    {{--            </ul>--}}
    {{--        </header>--}}
    {{--        <header class="header-bot">--}}
    {{--            <ul class="list-item">--}}
    {{--                <li class="item"><a href="" class="text-item">--}}
    {{--                        <i class="bi bi-house-door"></i>--}}
    {{--                        Trang chủ--}}
    {{--                    </a>--}}
    {{--                </li>--}}

    {{--                <li class="item news-hover1"><a href="" class="text-item">Thời sự</a>--}}
    {{--                    <div class="news">--}}
    {{--                        <ul class="list-news">--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Chính trị--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Đại hội XIII--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                       Môi trường--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Quốc phòng--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--                <li class="item news-hover1">--}}
    {{--                    <a href="" class="text-item">Tin 24h</a>--}}
    {{--                    <div class="news">--}}
    {{--                        <ul class="list-news">--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            covid 19--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Xã hội--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Giải trí--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Thể thao--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Giáo dục--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            vấn đề hôm nay--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--                <li class="item news-hover1"><a href="" class="text-item">Giải trí</a>--}}
    {{--                    <div class="news">--}}
    {{--                        <ul class="list-news">--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Video--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Nhạc--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Game hot--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Thời trang--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Làm đẹp--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Sách--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        showbit việt--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--                <li class="item news-hover1"><a href="" class="text-item">Thể thao</a>--}}
    {{--                    <div class="news">--}}
    {{--                        <ul class="list-news">--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Video--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Bóng đá--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Lịch thi đấu--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            tenis--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            word cup 2022--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Hậu trường--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            tường thuật--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                        <span class="text-news1">--}}
    {{--                                            Cầu lông--}}
    {{--                                        </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--                <li class="item news-hover1"><a href="" class="text-item">Sức khỏe</a>--}}
    {{--                    <div class="news">--}}
    {{--                        <ul class="list-news">--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Tin tức--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                       Tư vấn--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}

    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Dinh dưỡng--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Đàn ông--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        vaccine--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Khỏe đẹp--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li class="item-news">--}}
    {{--                                <a href="" class="text-news">--}}
    {{--                                    <span class="text-news1">--}}
    {{--                                        Phụ nữ--}}
    {{--                                    </span>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        </header>--}}
    {{--        <div class="body-news">--}}
    {{--            <div class="test">--}}
    {{--                <div class="new-first">--}}

    {{--                    <div class="news-top">--}}
    {{--                        <a href="" class="img-first"><img class="img-news-first"--}}
    {{--                                                          src="{{ $banner->image }}"--}}
    {{--                                                          alt="can bo"></a>--}}
    {{--                        <div class="title-first">--}}
    {{--                            <p href="" class="title-new">{{ $banner->title }}</p>--}}
    {{--                            <a href="" class="text-news2">--}}
    {{--                                {{ $banner->description }}--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="news-bottom">--}}
    {{--                        <div class="news-left">--}}
    {{--                            <p href="" class="title-new1">'Bình Dương đã cơ bản kiểm soát được Covid-19'</p>--}}
    {{--                            <a href="" class="text-news2">Chủ tịch UBND Bình Dương Võ Văn Minh cho biết, tỉnh đã cơ bản--}}
    {{--                                kiểm--}}
    {{--                                soát được Covid-19, song việc mở cửa kinh tế - xã hội sẽ tiến hành từng bước, không nóng--}}
    {{--                                vội.....</a>--}}
    {{--                        </div>--}}
    {{--                        <div class="news-right">--}}
    {{--                            <p href="" class="title-new1">Kiểm toán 'phát hiện nhiều sai phạm nhưng chuyển điều tra--}}
    {{--                                ít'</p>--}}
    {{--                            <a href="" class="text-news2">91 báo cáo kiểm toán được phát hành tới hết tháng 8 nhưng chỉ--}}
    {{--                                có 1--}}
    {{--                                vụ việc vi phạm được chuyển sang cơ quan điều tra.....</a>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div class="news-left1">--}}
    {{--                    <h1>Nổi bật trong tuần</h1>--}}
    {{--                    <ul class="list-item-left">--}}
    {{--                        @foreach($highlights as $key => $value)--}}
    {{--                            <li class="news-item-left">{{ $key + 1 }}.--}}
    {{--                                <a href="" class="text-news-left">--}}
    {{--                                    {{ $value->title }}--}}
    {{--                                </a>--}}
    {{--                                <p>{{ $value->created_at->format('d-m-Y') }}</p>--}}
    {{--                            </li>--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--            <div class="grid_column ">--}}
    {{--                <ul class="list-info has-boder boder-vip">--}}
    {{--                    @foreach($posts as $key => $value)--}}
    {{--                        <li class="item-info">--}}
    {{--                            <h3 class="title1">{{ $value->title }}</h3>--}}
    {{--                            <div class="table1">--}}
    {{--                                <img src="{{ $value->image }}" alt="" class="img">--}}
    {{--                                <a href="b.html" class="text">--}}
    {{--                                    {{ $value->description }}--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </li>--}}
    {{--                    @endforeach--}}
    {{--                </ul>--}}

    {{--                <ul class="list-categorys">--}}
    {{--                    <div class="top-category">--}}
    {{--                        <a href="" class="title_category">Kinh doanh</a>--}}
    {{--                    </div>--}}
    {{--                    <li class="news_category">--}}
    {{--                        <div class="bao">--}}

    {{--                            <div class="body_category">--}}
    {{--                                <div class="img-category">--}}
    {{--                                    <img class="cascsa"--}}
    {{--                                         src="https://tintucdoisong.tk.com.vn/thumb_w/640/2021/03/31/5-hot-girl-goi-cam-thu-hut-su-chu-y-trong-thang-3-docx-1617123615773.jpeg"--}}
    {{--                                         alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="content_category">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="propose">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="bot_category">--}}
    {{--                            <ul class="list-propose">--}}
    {{--                                <li class="item-propose">giá vàngf ầdgs dg fgd fh jbk sdbf shghi</li>--}}
    {{--                                <li class="item-propose">giới trẻasf ha gfhasgd iagiu asuid ahsd</li>--}}
    {{--                                <li class="item-propose">cách tránh bỗng đứng nsdhuf hsdu ifg sdg</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <div class="top-category">--}}
    {{--                        <a href="" class="title_category">Kinh doanh</a>--}}
    {{--                    </div>--}}
    {{--                    <li class="news_category">--}}
    {{--                        <div class="bao">--}}

    {{--                            <div class="body_category">--}}
    {{--                                <div class="img-category">--}}
    {{--                                    <img class="cascsa"--}}
    {{--                                         src="https://icdn.dantri.com.vn/thumb_w/640/2021/03/31/5-hot-girl-goi-cam-thu-hut-su-chu-y-trong-thang-3-docx-1617123615773.jpeg"--}}
    {{--                                         alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="content_category">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="propose">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="bot_category">--}}
    {{--                            <ul class="list-propose">--}}
    {{--                                <li class="item-propose">giá vàngf ầdgs dg fgd fh jbk sdbf shghi</li>--}}
    {{--                                <li class="item-propose">giới trẻasf ha gfhasgd iagiu asuid ahsd</li>--}}
    {{--                                <li class="item-propose">cách tránh bỗng đứng nsdhuf hsdu ifg sdg</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="news_category">--}}
    {{--                        <div class="bao">--}}

    {{--                            <div class="body_category">--}}
    {{--                                <div class="img-category">--}}
    {{--                                    <img class="cascsa"--}}
    {{--                                         src="https://icdn.dantri.com.vn/thumb_w/640/2021/03/31/5-hot-girl-goi-cam-thu-hut-su-chu-y-trong-thang-3-docx-1617123615773.jpeg"--}}
    {{--                                         alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="content_category">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="propose">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="bot_category">--}}
    {{--                            <ul class="list-propose">--}}
    {{--                                <li class="item-propose">giá vàngf ầdgs dg fgd fh jbk sdbf shghi</li>--}}
    {{--                                <li class="item-propose">giới trẻasf ha gfhasgd iagiu asuid ahsd</li>--}}
    {{--                                <li class="item-propose">cách tránh bỗng đứng nsdhuf hsdu ifg sdg</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="news_category">--}}
    {{--                        <div class="bao">--}}

    {{--                            <div class="body_category">--}}
    {{--                                <div class="img-category">--}}
    {{--                                    <img class="cascsa"--}}
    {{--                                         src="https://icdn.dantri.com.vn/thumb_w/640/2021/03/31/5-hot-girl-goi-cam-thu-hut-su-chu-y-trong-thang-3-docx-1617123615773.jpeg"--}}
    {{--                                         alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="content_category">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="propose">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="bot_category">--}}
    {{--                            <ul class="list-propose">--}}
    {{--                                <li class="item-propose">giá vàngf ầdgs dg fgd fh jbk sdbf shghi</li>--}}
    {{--                                <li class="item-propose">giới trẻasf ha gfhasgd iagiu asuid ahsd</li>--}}
    {{--                                <li class="item-propose">cách tránh bỗng đứng nsdhuf hsdu ifg sdg</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                    <li class="news_category">--}}
    {{--                        <div class="bao">--}}

    {{--                            <div class="body_category">--}}
    {{--                                <div class="img-category">--}}
    {{--                                    <img class="cascsa"--}}
    {{--                                         src="https://icdn.dantri.com.vn/thumb_w/640/2021/03/31/5-hot-girl-goi-cam-thu-hut-su-chu-y-trong-thang-3-docx-1617123615773.jpeg"--}}
    {{--                                         alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="content_category">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                                <div class="propose">--}}
    {{--                                    <p class="title-category">con trai bầu hiển làm phó tổng giám đốc SHB</p>--}}
    {{--                                    <p class="contentz">Ông Đỗ Quang Vinh, phó giám đốc khối ngân hàng bán lẻ SHB, vừa--}}
    {{--                                        được--}}
    {{--                                        bổ nhiệm vào vị trí phó tổng giám đốc</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="bot_category">--}}
    {{--                            <ul class="list-propose">--}}
    {{--                                <li class="item-propose">giá vàngf ầdgs dg fgd fh jbk sdbf shghi</li>--}}
    {{--                                <li class="item-propose">giới trẻasf ha gfhasgd iagiu asuid ahsd</li>--}}
    {{--                                <li class="item-propose">cách tránh bỗng đứng nsdhuf hsdu ifg sdg</li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    <div id="quynh333" class="modal1">--}}
    {{--        <div id="logreg-forms">--}}
    {{--            <form class="form-signin">--}}
    {{--                <i id="quynh33" class="bi bi-x-circle "></i>--}}
    {{--                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>--}}
    {{--                <div class="social-login">--}}
    {{--                    <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span>--}}
    {{--                    </button>--}}
    {{--                    <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <p class="text-or" style="text-align:center"> OR </p>--}}
    {{--                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required=""--}}
    {{--                       autofocus="">--}}
    {{--                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">--}}

    {{--                <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in--}}
    {{--                </button>--}}
    {{--                <a href="#" id="forgot_pswd">Forgot password?</a>--}}
    {{--                <hr>--}}
    {{--                <!-- <p>Don't have an account!</p>  -->--}}
    {{--                <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i>--}}
    {{--                    Sign up New Account--}}
    {{--                </button>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
