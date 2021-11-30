$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//login
$('body').on('click','.btn-login',function (){
    var name = $('#name').val();
    var password = $('#password').val();
    var remember = $('#remember:checked').val();

    $.ajax({
        type: 'POST',
        url: '/login',
        data: {
            email : name,
            password : password,
            remember : remember,
            _method: 'POST'
        },
        success:function(res){
            $('.modal-role-admin').modal('hide');
            $.notify('Đăng nhập thành công', 'success');
            setTimeout(() => {
                window.location.reload(1)
            }, 2000);
        },
        error: function(e){
            $.notify('Đăng nhập thất bại, vui lòng thử lại!', 'error');
        }
    });
})

//register
$('body').on('click','.btn-register',function (){
    var username = $('#username').val();
    var email = $('#email').val();
    var password = $('#password_register').val();
    var password_re = $('#password_register_re').val();
    var checkbox = $('#checkbox_re:checked').val();

    if (!checkbox){
        alert('Vui lòng đồng ý với điều khoản!');
        return false;
    }

    if (password !== password_re){
        alert('Nhập lại mật khẩu không khớp!');
        return false;
    }

    $.ajax({
        type: 'POST',
        url: '/register',
        data: {
            email : email,
            name : username,
            password : password,
            _method: 'POST'
        },
        success:function(res){
            console.log(res);
            $.notify('Đăng ký tài khoản thành công', 'success');
            // $('.modal-role-admin').modal('hide');
            // notify('Thêm thành công', 'success');
            // setTimeout(() => {
            //     window.location.reload(1)
            // }, 1000);
        },
        error: function(e){
            $.notify('Đăng ký tài khoản thất bại!', 'error');
            // $('.modal-role-admin').modal('hide');
            // notify('Có lỗi xảy ra.','danger');
        }
    });
})

$('body').on('click', '.btn-submit-comment', function (){

    var content = $('#content_comment').val();
    var post_id = $('#post_id').val();
    if (content.length === 0 ){
        alert('Bạn chưa nhập bình luận!');
        return false;
    }

    $.ajax({
        type: 'POST',
        url: link_create_comment,
        data: {
            post_id: post_id,
            content: content,
            _method: 'POST'
        },
        success:function(res){
            console.log(res);
            // $('.modal-role-admin').modal('hide');
            // notify('Thêm thành công', 'success');
            // setTimeout(() => {
            //     window.location.reload(1)
            // }, 1000);
        },
        error: function(e){
            // $('.modal-role-admin').modal('hide');
            // notify('Có lỗi xảy ra.','danger');
        }
    });


});
