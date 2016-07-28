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
            endDate: "-10y",
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
            endDate: "-10y",
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
            if ($(this).val() == 3 || $(this).val() == 4) {
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
    
    // Others - Email Template Lists
    if (document.getElementById('email_template_lists_page') != null) {
        $("#grid_email_template").kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "email_template_get",
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
                field: "value",
                title: "Email Template",
                filterable: false,
                sortable: false,
                width: 300
            },
            {
                field: "Description",
                filterable: false,
                sortable: false,
                width: 100
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
    
    // Others - Preferences Edit
    if (document.getElementById('preferences_edit_page') != null) {
        $('#submit_preferences_edit').click(function () {
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