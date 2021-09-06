$(function(){
    $('.input-search').keypress(function(e){
        var keyword = $(this).val();
        if(e.keyCode == 13){
            window.location.href = url_list_jlpt +'?search=' + keyword;
        }
    });
    $("#btn-search-user").click(function(){
        var keyword = $('.input-search').val();3
        window.location.href = url_list_jlpt +'?search=' + keyword;
    });

    $('.detail-content').click(function(){
        var content = $(this).data('content');
        $('.modal-title').html('Nội dung');
        $('.modal-body').html(content);
        $('#modal-detail').modal('show');
    });

    $('.btn_del').click(function(){
        var id = $(this).data('id');
        if(confirm('Bạn có muốn xóa bài viết này không ?')){
            $.ajax({
                type: "POST",
                url: url_delete_jlpt,
                data: {
                    id: id,
                    _method : 'DELETE'
                },
                headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
                success: function (response) {
                    notify('Xoá thành công !', 'success');
                    $(".record_jlpt"+id).remove();
                },
                error: function (res) {
                    notify('Xóa thất bại', 'danger');
                }
            });
        }
    })

})