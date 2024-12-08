$('.form-check-input').on('click', function() {

    const roleId = $(this).data('role');
    const menuId = $(this).data('menu');
    
    $.ajax({
        url: "http://localhost/login_example/super_admin/changeaccess",
        type: "post",
        data: {
            roleId: roleId,
            menuId: menuId
        },
        success: function() {
            document.location.href = `http://localhost/login_example/super_admin/roleaccess/${roleId}`;
        }
    });

});


$('.custom-file-input').on('change', function(){
    const fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

$(function() {
 
    
    $('.btn-submenu').on('click', function() {

        $('#submenuModal').html('Edit Submenu');

    });

    $('.btn-edit-menu').on('click', function() {
        
        const id = $(this).data('id');

        $('#modalLabel').html('Edit Menu');
        $('.btn-modal').html('Edit Menu');
        $('.modal-content form').attr('action', `http://localhost/login_example/admin/updatemenu/${id}`);

        $.ajax({
            url: "http://localhost/login_example/admin/getmenubyid",
            type: 'post',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                $('.modal-name').val(data.menu)
            }
        });

    });

});