$(function(){
    var accounts = data.data;

    $('.input-search').keypress(function(e){
        var keyword = $(this).val();
        if(e.keyCode == 13){
            window.location.href = link_accounts +'?search=' + keyword;
        }
    });
    $("#btn-search-user").click(function(){
        var keyword = $('.input-search').val();
        window.location.href = link_accounts +'?search=' + keyword;
    });

    $('.active').change(function(){
        var active = $(this).val();
        window.location.href = link_accounts + '?active=' + active;
    });
    // Role and Permission
    // Save change role for admin
    $('.btn-save-change-role-admin').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var roles = [];
        $('.roles').each(function(){
            if(this.checked){
                roles.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            url: link_update_admin_role,
            data: {
                id: id,
                roles: roles,
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

    $('.btn-save-change-permission').click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var permissions = [];
        $('.permissions').each(function(){
            if(this.checked){
                permissions.push($(this).val());
            }
        });
        $.ajax({
            type: 'POST',
            url: link_update_admin_permission,
            data: {
                id: id,
                permissions: permissions,
                _method: 'PUT'
            },
            success:function(res){
                $('.modal-permission-admin').modal('hide');
                notify('Thêm thành công', 'success');
                setTimeout(() => {
                    window.location.reload(1)
                }, 1000);
            },
            error: function(e){
                $('.modal-permission-admin').modal('hide');
                notify('Có lỗi xảy ra.','danger');
            }
        });
    })

    $('.btn-role-for-admin').click(function(e){
        var id = $(this).data('id');
        var key = $(this).data('key');
        var account = accounts[key];
        var roles = account.roles.map(function(item){
            return item.name;
        });

        $('.roles').each(function(){
            var role = $(this).attr('name');
            (roles.indexOf(role) > -1) ? this.checked = true : this.checked = false;
        })
        $('.btn-save-change-role-admin').data('id', id);
        $('.modal-role-admin').modal('toggle');
    })

    $('.btn-permission-for-admin').click(function(e){
        var id = $(this).data('id');
        var key = $(this).data('key');
        var account = accounts[key];
        var permissions = account.permissions.map(function(item){
            return item.name;
        });

        $('.permissions').each(function(){
            var permission = $(this).attr('name');
            (permissions.indexOf(permission) > -1) ? this.checked = true : this.checked = false;
        })
        $('.btn-save-change-permission').data('id', id);
        $('.modal-permission-admin').modal('toggle');
    })
    //======= end role permission =======
    // action active account
    $('.btn-active').click(function(){
        var id = $(this).data('id');
        var type = $(this).data('type');
        var active = $(this).data('active');
        if (type == 'admin'){
            if (active == 0){
                 active = 2
            }else
            if (active == 1){
                 active = 2
            }else
            if (active == 2 ){
                  active = 1
            }
        }
        $.ajax({
            type: 'POST',
            url: link_active,
            data: {
                id: id,
                active: active,
                _method: 'PUT'
            },
            success:function(res){
                notify('Thành công', 'success');
                setTimeout(() => {
                    window.location.reload(true);
                }, 1000);
            },
            error: function(e){
                notify('Có lỗi xảy ra', 'danger');
            }
        });
    })
})
