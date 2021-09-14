$(function(){
    var data = roles.data;
    
    // Delete role
    $('.btn-delete-role').click(function(e){
        if(confirm('Bạn có chắc muốn xoá quyền này?')){
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: link_delete_role,
                data: {
                    id: id,
                    _method: 'DELETE'
                },
                success:function(res){
                    notify('Xoá thành công!', 'success');
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 1000);
                },
                error: function(e){
                    notify('Có lỗi xảy ra', 'danger');
                }
            });
        }
    })

    $('.btn-add-per-to-role').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var key = $(this).data('key');
        var role  = data[key];
        var permissionsInRole = role.permissions.map(function(item){
            return item.name;
        });
        
        $('input[type=checkbox]').each(function(){
            var per = $(this).attr('name');
            (permissionsInRole.indexOf(per) > -1) ? this.checked = true : this.checked = false;
        })
        $('.btn-save-change-permission').data('id', id);
        $('.bs-add-permission-role-modal-sm').modal('toggle');
    });

    // Save change permission
    $('.btn-save-change-permission').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var permissions = [];
        $('input[type=checkbox]').each(function(){
            if(this.checked){
                permissions.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            url: link_update_permission_role,
            data: {
                id: id,
                permissions: permissions,
                _method: 'PUT'
            },
            success:function(res){
                $('.bs-add-permission-role-modal-sm').modal('hide');
                notify('Thêm thành công', 'success');
                setTimeout(() => {
                    window.location.reload(1)
                }, 1000);
            },
            error: function(e){
                $('.bs-add-permission-role-modal-sm').modal('hide');
                notify('Có lỗi xảy ra.','danger');
            }
        });
    })
})