$(function(){
    console.log(url_delete_post);
    var data = posts.data;

    $('.input-search').keypress(function(e){
        var keyword = $(this).val();
        if(e.keyCode == 13){
            window.location.href = url_list_post +'?search=' + keyword;
        }
    });
    $("#btn-search-user").click(function(){
        var keyword = $('.input-search').val();
        window.location.href = url_list_post +'?search=' + keyword;
    });

    $('.category').change(function(){
        var author = $('.author').val();
        var category = $(this).val();
        window.location.href = url_list_post + '?category=' + category + '&author=' + author;
    });

    $('.author').change(function(){
        var category = $('.category').val();
        var author = $(this).val();
        window.location.href = url_list_post + '?category=' + category + '&author=' + author;
    });


    // Show Nội dung
    $('.detail-content').click(function(){
        var content = $(this).data('content');
        $('.title-news').html('Nội dung');
        $('.text-news').html(content);
        $('#modal-detail').modal('show');
    });

    $('.btn_del').click(function(){
        var id = $(this).data('id');
        if(confirm('Bạn có muốn xóa bài viết này không ?')){
            $.ajax({
                type: "POST",
                url: url_delete_post,
                data: {
                    _method : 'DELETE',
                    id: id,
                },
                headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
                success: function (response) {
                    console.log(response)
                    notify('Xoá thành công !', 'success');
                    $(".record_jlpt"+id).remove();
                },
                error: function (res) {
                    notify('Xóa thất bại', 'danger');
                }
            });
        }
    });

    $('.btn-category-for-post').click(function(e){
        $('.modal-category-admin').modal('toggle');
        var id = $(this).data('id');
        var key = $(this).data('key');
        var post = data[key];
        var categories = post.categories.map(function(item){
            return item.name;
        });
        $('.categories').each(function(){
            var category = $(this).attr('name');
            (categories.indexOf(category) > -1) ? this.checked = true : this.checked = false;
            // categories.indexOf(category) duyệt categories xem category cso trong mảng hay ko nếu có là 1 còn ko có là  -1
        });
        $('.btn-save-change-category-admin').data('id', id);
    });

    // Save change categories for post
    $('.btn-save-change-category-admin').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var categories = [];
        $('.categories').each(function(){
            if(this.checked){
                categories.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            url: link_update_categories_post,
            data: {
                id: id,
                categories: categories,
                _method: 'PUT'
            },
            success:function(res){
                $('.modal-role-admin').modal('hide');
                notify('Thêm thành công', 'success');
                setTimeout(() => {
                    window.location.reload(1)
                }, 1000);
            },
            error: function(e){
                $('.modal-role-admin').modal('hide');
                notify('Có lỗi xảy ra.','danger');
            }
        });
    })
});
