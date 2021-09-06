$(function () {
    //load trang,nếu quốc gia == all,tự động xóa tỉnh/thành phố
    var country = $('.country_select').val();
    if (country == 'all') {
        $('.province_select').html('');
    }

    // change country
    $('body').on('change', '.country_select', function () {
        let country = $(this).val();
        let html_opt = '';
        if (country != 'all') {
            $.each(list_province[country], function (index, value) {
                html_opt += "<option ";
                html_opt += "value='";
                html_opt += index;
                html_opt += "'>";
                html_opt += value;
                html_opt += "</option>";
            })
            $('.province_select').html(html_opt);
        } else $('.province_select').html('');
    });

    $('.type_select').change(function () {
        var type = $('.type_select').val();
        var country = $('.country_select').val();
        var province = $('.province_select').val();
        var active = $('.active_select').val();
        url = url_list_jobs + '?type=' + type + '&active=' + active + '&country=' + country;
        if (province != null) {
            url = url + '&province=' + province;
        }
        window.location.href = url;
    });

    $('.country_select').change(function () {
        var type = $('.type_select').val();
        var country = $('.country_select').val();
        var province = $('.province_select').val();
        var active = $('.active_select').val();
        url = url_list_jobs + '?type=' + type + '&active=' + active + '&country=' + country;

        window.location.href = url;
    });

    $('.province_select').change(function () {
        var type = $('.type_select').val();
        var country = $('.country_select').val();
        var province = $('.province_select').val();
        var active = $('.active_select').val();
        url = url_list_jobs + '?type=' + type + '&active=' + active + '&country=' + country;
        if (province != null) {
            url = url + '&province=' + province;
        }

        window.location.href = url;
    });

    $('.active_select').change(function () {
        var type = $('.type_select').val();
        var country = $('.country_select').val();
        var province = $('.province_select').val();
        var active = $('.active_select').val();
        url = url_list_jobs + '?type=' + type + '&active=' + active + '&country=' + country;
        if (province != null) {
            url = url + '&province=' + province;
        }

        window.location.href = url;
    });

    //search
    $('#btn-search-job').click(function () {
        var key = $('input[name="search"]').val();
        // if (key == '' || key == null) {
        //     alert('Nhập từ khoá tìm kiếm.');
        //     return;
        // }
        window.location.href = url_list_jobs + "?search=" + key;
    })

    $('input[name="search"]').keypress(function (e) {
        if (e.which == 13) {
            $('#btn-search-job').click();
        }
    });

    //click xem chi tiết job
    $(".detail_job").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: url_job_detail + '/' + id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function (job) {
                job = job.data;
                $("#title").html(job.title);
                $("#majors").html(job.majors);
                $("#address").html(job.address + ' (' + list_province[job.country][job.province] + ', ' + list_country[job.country] + ' )');
                $("#type").html((job.type) ? 'Online' : 'Offline');
                $("#description").html(job.description);
                $("#require").html(job.require);
                $("#benifit").html(job.benifit);
                $("#salary").html(job.salary);
                $("#company_info").html('<br>' + job.company_info);
                $("#email").html(job.email);
                $("#phone").html(job.phone);
            }
        });
    })

    //active job
    $("body").on('click', '.btn_active_job', function () {
        if (confirm('Bạn có muốn duyệt bài tuyển dụng này không ?')) {
            var id = $(this).attr('data-id');
            var td_parent = $(this).parent();
            // var list_id = [];
            // list_id.push(id);
            $.ajax({
                type: "POST",
                url: url_active_job,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    _method : 'GET'
                },
                success: function (res) {
                    notify('Duyệt thành công', 'success');
                    td_parent.html('<p>Đã duyệt</p>');
                    $('.check_hidden'+id).remove();
                }
            });
        }
    })

    //click check all job
    $('body').on('click', '.check_all_job', function () {
        $(".check_list_job").prop('checked', this.checked);
    });

    // active list job
    $("body").on('click', '.btn_active_listjob', function () {
        var list_checkbox = $(".check_list_job:checked");
        var list_id = [];
        list_checkbox.each(function () {
            list_id.push($(this).attr('data-id'));
        });
        if (list_id.length <= 0) {
            alert("Chưa có bài viết nào được chọn");
        } else if (confirm("Bạn có muốn duyệt những bài viết đã chọn không ?")) {
            $.ajax({
                type: "POST",
                url: url_activeAll_job,
                data: {
                    list_id: list_id,
                    _method : 'POST'
                },
                success: function (res) {
                    notify('Duyệt thành công', 'success');
                    $.each(list_id,function(index,value){
                        $('.td_active' + value).html('<p>Đã duyệt</p>');
                        $('.check_hidden'+value).remove();
                    });
                }
            });
        }
    })

    //delete
    $("body").on('click', '.btb_del_job', function () {
        var reason = prompt('Nhập lý do xóa:');
        if(reason){
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: url_delete_job,
                data: {
                    id: id,
                    reason : reason,
                    _method : 'DELETE'
                },
                success: function (res) {
                    notify('Xoá thành công', 'success');
                    $(".tr_"+ id).remove();
                }
            });
        }else if(!reason && reason != null){
            alert('Bạn chưa nhập lý do xóa.');
        }
    })

})
