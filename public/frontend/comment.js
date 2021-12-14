// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

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
            $('#content_comment').val('');
            $('#modalComment').modal('show');
            // $('.modal-role-admin').modal('hide');

        },
        error: function(e){
            // $('.modal-role-admin').modal('hide');
            // notify('Có lỗi xảy ra.','danger');
        }
    });


});
