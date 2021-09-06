$(function(){

    // Autofill email
    $('input[name="username"]').on('change', function(e){
        $('input[name="email"]').val($(this).val() + '@gmail.com');
    })

    // Save account
    $('.btn-save-account').click(function(e){
        e.preventDefault();
        var username = $('input[name="username"]').val();
        var email = $('input[name="email"]').val();
        var image = $('input[name="image"]')[0].files;
        var language = $('select[name="language"]').val();

        if(username == '' || email == ''){
            alert('Các trường không được để trống!');
            return;
        }
        var formData = new FormData();
        formData.append('username', username);
        formData.append('email', email);
        formData.append('image', (typeof image[0] == 'undefined') ? '' : image[0]);
        formData.append('language', language);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: link_create_account,
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            success:function(res){
                console.log(res);
                $.notify({
                    message: 'Tạo tài khoản thành công!',

                }, {
                    type: 'success'
                },
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 1000))
            },
            error: function(e){
                $.notify({
                    message: 'Tạo Tài Khoản Thất Bại.'
                }, {
                    type: 'danger'
                })
            }
        });
        
    })

    // Delete
    var data = user.data;
    // Delete post
    $('.btn-delete-user').click(function(e){
        if(confirm('Bạn có chắc muốn xoá user này?')){
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                type: 'POST',
                url: link_delete_account,
                data: {
                    id: id,
                    _method: 'DELETE'
                },
                success:function(res){
                    console.log(res);
                    notify('Xoá thành công!', 'success');
                    $(".account-"+id).remove();
                },
                error: function(e){
                    notify('Có lỗi xảy ra', 'danger');
                }
            });
        }
    });

});