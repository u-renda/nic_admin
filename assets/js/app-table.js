$(function () {
    // Member - Lists
    if (document.getElementById('member_lists_page') != null) {
        grid = '#grid_member';
        resubmit_member(grid);
        
        $('#member_lists').submit(function (){
            resubmit_member(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Member - Create
    if (document.getElementById('member_create_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy"
        });
        
		$("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'extra/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_kota').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_kota').html(data);
				},
				error: function(data){
				}
			});
		});
        
        $('#submit_member_create').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
	}
    
    // Member - Edit
    if (document.getElementById('member_edit_page') != null) {
        $("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'extra/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_kota').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_kota').html(data);
				},
				error: function(data){
				}
			});
		});

        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy"
        });
        
        $('#change_photo').hide();
        $('#change_idcard_photo').hide();
        $('#change_password').hide();
        $('#change_transfer_photo').hide();
        $('#change_status').hide();
        $('#checkboxPhoto').click(function(){
            if($(this).is(":checked")){
                $('#change_photo').show();
            } else {
                $('#change_photo').hide();
            }
        });
        $('#checkboxIDcard').click(function(){
            if($(this).is(":checked")) {
                $('#change_idcard_photo').show();
            } else {
                $('#change_idcard_photo').hide();
            }
        });
        $('#checkboxPassword').click(function(){
            if($(this).is(":checked")) {
                $('#change_password').show();
            } else {
                $('#change_password').hide();
            }
        });
        $('#checkboxPhotoTransfer').click(function(){
            if($(this).is(":checked")) {
                $('#change_transfer_photo').show();
            } else {
                $('#change_transfer_photo').hide();
            }
        });
        
        $("#status").change(function() {
            if ($(this).val() == 3) {
                $('#change_status').show();
            }
            else
            {
                $('#change_status').hide();
            }
        });

        $('#submit_member_edit').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Member - Request Transfer
    if (document.getElementById('member_request_transfer_page') != null) {
        $('#submit_member_request_transfer').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Others - Preferences Lists
    if (document.getElementById('preferences_lists_page') != null) {
        $("#grid_preferences").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "preferences_get",
                        dataType: "json",
                        type: "POST",
                        data: {}
                    }
                },
                schema: {
                    data: "results",
                    total: "total"
                },
                pageSize: 20,
                serverPaging: true,
                serverSorting: true,
                serverFiltering: true,
                cache: false
            },
            sortable: {
                mode: "single",
                allowUnsort: true
            },
            pageable: {
                buttonCount: 5,
                input: true,
                pageSizes: true,
                refresh: true
            },
            filterable: {
                extra: false,
                operators: {
                    string: {
                        contains: "Mengandung kata"
                    }
                }
            },
            selectable: "row",
            resizable: true,
            columns: [{
                field: "No",
                sortable: false,
                filterable: false,
                width: 50
            },
            {
                field: "Key",
                width: 150
            },
            {
                field: "Value",
                filterable: false,
                sortable: false,
                width: 300
            },
            {
                field: "Description",
                filterable: false,
                sortable: false,
                width: 100,
                template: "#= data.Description #"
            },
            {
                field: "Action",
                sortable: false,
                filterable: false,
                width: 70,
                template: "#= data.Action #"
            }]
        });
    }
    
    // Others - Preferences Create
    if (document.getElementById('preferences_create_page') != null) {
        $('#submit_preferences_create').click(function () {
            tinyMCE.triggerSave();
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Others - Preferences Edit
    if (document.getElementById('preferences_edit_page') != null) {
        $('#submit_preferences_edit').click(function () {
            tinyMCE.triggerSave();
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // API Debug - API Admin
    if (document.getElementById('api_admin_page') != null) {
        $('#submit_api_admin').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
        
        var endpoint = $(this).find("option:selected").attr("value");
        $(".admin_info").hide();
        
        if (endpoint == 'info') {
            $(".admin_lists").hide();
            $(".admin_info").show();
        }
            
        $("#endpoint").change(function() {
			var endpoint = $(this).find("option:selected").attr("value");
            
            if (endpoint == 'info') {
                $(".admin_lists").hide();
                $(".admin_info").show();
            } else if (endpoint == 'lists') {
                $(".admin_lists").show();
                $(".admin_info").hide();
            }
		});
    }
    
    // API Debug - API Member
    if (document.getElementById('api_member_page') != null) {
        $('#submit_api_member').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // API Debug - API Post
    if (document.getElementById('api_post_page') != null) {
        $('#submit_api_post').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Post - Lists
    if (document.getElementById('post_lists_page') != null) {
        grid = '#grid_post';
        resubmit_post(grid);
        
        $('#post_lists').submit(function (){
            resubmit_post(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Post - Edit
    if (document.getElementById('post_edit_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy"
        });
        
        $('#change_media').hide();
        $('#change_image').hide();
        $('#change_video').hide();
        $('#checkboxMedia').click(function(){
            if($(this).is(":checked")) {
                $('#change_media').show();
                $('input[type="radio"]').click(function(){
                    if($(this).attr("value")=="image"){
                        $('#change_image').show();
                        $('#change_video').hide();
                    } else if($(this).attr("value")=="video"){
                        $('#change_image').hide();
                        $('#change_video').show();
                    } else {
                        $('#change_image').hide();
                        $('#change_video').hide();
                    }
                });
            } else {
                $('#change_media').hide();
            }
        });
        
        $('#submit_post_edit').click(function () {
            tinyMCE.triggerSave();
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
});

function resubmit_member(grid) {
    $(grid).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "member_get",
                    dataType: "json",
                    type: "POST",
                    data: {
                        id_card_type : $('#id_card_type').val(),
                        religion : $('#religion').val(),
                        status : $('#status').val(),
                        marital_status : $('#marital_status').val(),
                        shirt_size : $('#shirt_size').val(),
                        gender : $('#gender').val()
                    }
                }
            },
            schema: {
                data: "results",
                total: "total"
            },
            pageSize: 20,
            serverPaging: true,
            serverSorting: true,
            serverFiltering: true,
            cache: false
        },
        sortable: {
            mode: "single",
            allowUnsort: true
        },
        pageable: {
            buttonCount: 5,
            input: true,
            pageSizes: true,
            refresh: true
        },
        filterable: {
            extra: false,
            operators: {
                string: {
                    contains: "Mengandung kata"
                }
            }
        },
        selectable: "row",
        resizable: true,
        columns: [{
            field: "No",
            sortable: false,
            filterable: false,
            width: 50
        },
        {
            field: "Name",
            width: 200
        },
        {
            field: "MemberCard",
            title: "Member Card",
            filterable: false,
            sortable: false,
            width: 110
        },
        {
            field: "ShirtSize",
            title: "Shirt Size",
            filterable: false,
            sortable: false,
            width: 60
        },
        {
            field: "MemberNumber",
            title: "Member Number",
            filterable: false,
            width: 100
        },
        {
            field: "Status",
            filterable: false,
            sortable: false,
            width: 100,
            template: "#= data.Status #"
        },
        {
            field: "ApprovedDate",
            title: "Approved Date",
            filterable: false,
            width: 90
        },
        {
            field: "Action",
            sortable: false,
            filterable: false,
            width: 70,
            template: "#= data.Action #"
        }]
    });
}

function resubmit_post(grid) {
    $(grid).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "post_get",
                    dataType: "json",
                    type: "POST",
                    data: {
                        type : $('#type').val(),
                        is_event : $('#is_event').val(),
                        status : $('#status').val()
                    }
                }
            },
            schema: {
                data: "results",
                total: "total"
            },
            pageSize: 20,
            serverPaging: true,
            serverSorting: true,
            serverFiltering: true,
            cache: false
        },
        sortable: {
            mode: "single",
            allowUnsort: true
        },
        pageable: {
            buttonCount: 5,
            input: true,
            pageSizes: true,
            refresh: true
        },
        filterable: {
            extra: false,
            operators: {
                string: {
                    contains: "Mengandung kata"
                }
            }
        },
        selectable: "row",
        resizable: true,
        columns: [{
            field: "No",
            sortable: false,
            filterable: false,
            width: 30
        },
        {
            field: "Title",
            width: 150
        },
        {
            field: "Content",
            filterable: false,
            sortable: false,
            width: 300
        },
        {
            field: "Type",
            filterable: false,
            sortable: false,
            width: 80
        },
        //{
        //    field: "Event",
        //    filterable: false,
        //    sortable: false,
        //    width: 50
        //},
        {
            field: "Status",
            filterable: false,
            sortable: false,
            width: 60,
            template: "#= data.Status #"
        },
        {
            field: "CreatedDate",
            title: "Created Date",
            filterable: false,
            width: 80
        },
        {
            field: "Action",
            sortable: false,
            filterable: false,
            width: 70,
            template: "#= data.Action #"
        }]
    });
}