$(function(){

    $("img").parent().addClass('image');
    //======== edit comment =========
    // $('.btn-edit-submit-comment').click(function(e){
    //     e.preventDefault();
    //     var id = $(this).data('id');
    //     var type = $(this).data('type');
    //     var content = $('#editor-edit-'+type+'-'+id).html();
    //     if(content == ''){
    //         alert('Nhập dữ liệu!');
    //         return;
    //     }
    //     $.ajax({
    //         type: 'POST',
    //         url: link_comment_update,
    //         data: {
    //             _method: 'PUT',
    //             id: id,
    //             type: type,
    //             content: content.trim(),
    //         },
    //         success:function(res){
    //             window.location.reload(true)
    //         },
    //         error: function(e){
    //             console.log(e);
    //         }
    //     });
    // })
    //======== edit post =========
    $('.btn-edit-submit').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var content = $('#editor-edit-post-'+id).html();
        var title = $('#title-edit-post-'+id).val();
        var category = $('#category-edit-post-'+id).val();
        if(title == '' || content == ''){
            alert('Nhập dữ liệu!');
            return;
        }
        $.ajax({
            type: 'POST',
            url: link_post_update,
            data: {
                _method: 'PUT',
                id: id,
                category_id: category,
                content: content.trim(),
                title: title.trim()
            },
            success:function(res){

            },
            error: function(e){
                console.log(e);
            }
        });
    })

    //======== delete comment =========
    $('.btn-delete-comment').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var type = $(this).data('type');
        if(confirm('Bạn có chắc muốn xoá bài viết?')){
            $.ajax({
                type: 'POST',
                url: link_comment_delete,
                data: {
                    id: id,
                    type: type,
                    _method: 'DELETE'
                },
                success:function(res){
                    window.location.reload(true);
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
        return;
    })
    //======== delete post =========
    $('.btn-delete-post').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        if(confirm('Bạn có chắc muốn xoá bài viết?')){
            $.ajax({
                type: 'POST',
                url: link_post_delete,
                data: {
                    id: id,
                    _method: 'DELETE'
                },
                success:function(res){
                    window.location.reload(true);
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
        return;
    })
    //======== submit editor =========
    $('.btn-submit').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var type = $(this).data('type');
        var content = $('#editor-'+id).html();


        if(content == ''){
            notify('Nhập nội dung!', 'danger');
            $('#editor-'+id).focus();
            return;
        }

        $.ajax({
            type: 'POST',
            url:  link_comment_create,
            data: {
                id : id,
                type : type,
                content : content ,
                _method : 'POST'
            },
            success:function(res){
                window.location.reload(true);
            },
            error: function(e){
                console.log(e);
            }
        });
    })

    //========= end =========
    // show or hide box comment
    $('.btn-comment').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $('.comments-'+id).toggle(10, function(){
            $(this).removeClass('hidden');
        });
    })

    // show or hide child comment
    $('.btn-child').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $('.box-child-comments-'+id).toggle(10, function(){
            $(this).removeClass('hidden');
        })
    })



    $('.editable').editable({
        validate: function(value){
            if(!value) return "Không để rỗng!";
        },
        success: function(res, value){
            var id = $(this).data('id');
            var value = value.trim();
            $.ajax({
                type: 'POST',
                url: link_update_package,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id: id,
                    value: value,
                    _method: 'PUT'
                },
                success:function(res){
                    console.log(res);
                    notify('Cập nhật thành công', 'success');
                },
                error: function(e){
                    notify('Có lỗi', 'danger');
                }
            });
        }
    })

    // comments
    var id = $('.btn-comment').data('id');
    $('.comments-'+id+'.box-comment').before(" <h2>Appended text</h2>.")
    Pusher.logToConsole = true;
    var pusher = new Pusher('2614334692536e458015', {
    cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('comment-submit', function(data) {
        var data = JSON.stringify(data.data);
        console.log(data);
        $('.content-'+data.id + '.box-comment').append('dsadasd');
    });
})
