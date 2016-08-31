$(function () {
    // Admin
    if (document.getElementById('admin_create_page') != null) {
        $('#submit_admin_create').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Dashboard
    if (document.getElementById('page_dashboard') != null) {
        $(this).delegate(".btn_dashboard", "click", function() {
            var id = $('#id_project_group').val();
            var action = "dashboard";
            var dataString = 'id_project_group='+ id;
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                success: function(data)
                {
                    resubmit_dashboard();
                }
            });
            return false;
        });
    }
    
    // Member
    if (document.getElementById('member_lists_page') != null) {
        $('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "member_delete";
            var grid = "grid_member";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
                {
                    type: "POST",
                    url: newPathname + action,
                    data: dataString,
                    cache: false,
                    beforeSend: function()
                    {
                        $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function(data)
                    {
                        $('.'+id+'-delete').html('<span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span>');
                        $('.modal-dialog').removeClass('modal-lg');
                        $('.modal-dialog').addClass('modal-sm');
                        $('.modal-title').text('Confirm Delete');
                        $('.modal-body').html(data);
                        $('#myModal').modal('show');
                    }
                });
            return false;
        });

        $('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "member_view";
            var dataString = 'id='+ id
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span>');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-title').text('Member View');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
        
        $('body').delegate(".edit", "click", function() {
            var id = $(this).attr("id");
            $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
        });
    }
    
    // Post
    if (document.getElementById('post_lists_page') != null) {
        $('body').delegate(".delete", "click", function() {
            var id = $(this).attr("id");
            var action = "post_delete";
            var grid = "grid_post";
            var dataString = 'id='+ id +'&action='+ action +'&grid='+ grid;
            $.ajax(
                {
                    type: "POST",
                    url: newPathname + action,
                    data: dataString,
                    cache: false,
                    beforeSend: function()
                    {
                        $('.'+id+'-delete').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function(data)
                    {
                        $('.'+id+'-delete').html('<span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span>');
                        $('.modal-dialog').removeClass('modal-lg');
                        $('.modal-dialog').addClass('modal-sm');
                        $('.modal-title').text('Confirm Delete');
                        $('.modal-body').html(data);
                        $('#myModal').modal('show');
                    }
                });
            return false;
        });

        $('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var action = "post_view";
            var dataString = 'id='+ id
            $.ajax(
            {
                type: "POST",
                url: newPathname + action,
                data: dataString,
                cache: false,
                beforeSend: function()
                {
                    $('.'+id+'-view').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data)
                {
                    $('.'+id+'-view').html('<span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span>');
                    $('.modal-dialog').removeClass('modal-sm');
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-title').text('Post View');
                    $('.modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
            return false;
        });
        
        //$('body').delegate(".edit", "click", function() {
        //    var id = $(this).attr("id");
        //    $('.'+id+'-edit').html('<i class="fa fa-spinner fa-spin"></i>');
        //});
    }
});