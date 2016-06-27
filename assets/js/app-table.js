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
					$('#area').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					console.log(data);
					$('#area').html(data);
				},
				error: function(data){
				}
			});
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