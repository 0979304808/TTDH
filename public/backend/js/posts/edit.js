$(function(){
    CKEDITOR.replace('descHtml', {
        width: '100%',
        height: 500
    });

    $("#image").change(function(){
        readURL(this);
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#current_img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#current_img').attr('src', '');
        }
    }

    $("#frm_edit_jlpt").submit(function(e){
        e.preventDefault();

        //Cập nhật lại value của ckeditor.Thêm đoạn này tránh lỗi value của textarea ko đươc gửi đi với request
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();
        }

        var formData = new FormData($('#frm_edit_jlpt')[0]);
        $.ajax({
            url: url_update_jlpt,
            type: 'POST',
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,
            headers: {'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')},
            success: function(res){
                notify('Sửa thành công !', 'success');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            },
            error: function (res) {
                data = $.parseJSON(res.responseText)
                notify(data.message, 'warning');
            }
        });
    });



})