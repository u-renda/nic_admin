$(function () {
    // Member Lists
    if (document.getElementById('member_lists_page') != null) {
        grid = '#grid_member';
        resubmit_member(grid);
        
        $('#member_lists').submit(function (){
            resubmit_member(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Member - Request Transfer
    if (document.getElementById('member_request_transfer_page') != null) {
        $('#submit_member_request_transfer').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    }
    
    // Preferences Lists
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
    
    // Post Lists
    if (document.getElementById('post_lists_page') != null) {
        grid = '#grid_post';
        resubmit_post(grid);
        
        $('#post_lists').submit(function (){
            resubmit_post(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Admin Lists
    if (document.getElementById('admin_lists_page') != null) {
        grid = '#grid_admin';
        
        $(grid).kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "admin_get",
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
                serverFiltering: false,
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
                field: "no",
                title: "No",
                sortable: false,
				filterable: false,
                width: 50
            },
			{
				field: "name",
				title: "Name",
				filterable: false,
				width: 200
			},
			{
				field: "email",
				title: "Email",
				filterable: false,
				sortable: false,
				width: 200
			},
			{
				field: "username",
				title: "Username",
				filterable: false,
				sortable: false,
				width: 100
			},
			{
				field: "initial",
				title: "Initial",
                sortable: false,
				filterable: false,
				width: 50
			},
			{
				field: "action",
				title: "Action",
				sortable: false,
				filterable: false,
				width: 70,
				template: "#= data.action #"
			}]
        });
    }
    
    // FAQ - Lists
    if (document.getElementById('faq_lists_page') != null) {
        grid = '#grid_faq';
        
        $(grid).kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "faq_get",
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
                width: 30
            },
			{
				field: "Question",
                sortable: false,
				width: 100
			},
			{
				field: "Answer",
				filterable: false,
				sortable: false,
				width: 300
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
    
    // Provinsi - Lists
    if (document.getElementById('provinsi_lists_page') != null) {
        grid = '#grid_provinsi';
        
        $(grid).kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "provinsi_get",
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
                serverFiltering: false,
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
			field: "no",
			title: "No",
			sortable: false,
			filterable: false,
			width: 50
		},
		{
			field: "provinsi",
			title: "Provinsi",
			width: 200
		},
		{
			field: "action",
			title: "Action",
			sortable: false,
			filterable: false,
			width: 70,
			template: "#= data.action #"
		}]
        });
    }
    
    // Kota - Lists
    if (document.getElementById('kota_lists_page') != null) {
        grid = '#grid_kota';
        id_provinsi = $(grid).data("provinsi");
        
        $(grid).kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "kota_get?id=" + id_provinsi,
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
                serverFiltering: false,
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
				field: "Kota",
				width: 200
			},
			{
				field: "Price",
				filterable: false,
				width: 200
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
    
    // Image Album - Lists
    if (document.getElementById('image_album_lists_page') != null) {
        grid = '#grid_image_album';
        
        $(grid).kendoGrid({
            dataSource: {
                transport: {
                    read: {
                        url: "image_album_get",
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
                serverFiltering: false,
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
                width: 200,
                template: "#= data.Name #"
            },
            {
                field: "Date",
                filterable: false,
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
    
    // Image Album - Create
    if (document.getElementById('image_album_create_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            autoclose: true,
            todayHighlight: true
        });
    }
    
    // Product - Lists
    if (document.getElementById('product_lists_page') != null) {
        grid = '#grid_product';
        resubmit_product(grid);
        
        $('#product_lists').submit(function (){
            resubmit_product(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Product - Create
    if (document.getElementById('product_create_page') != null) {
        $(".image_option").hide();
        $('.media').change(function() {
            if (this.value == 'yes') {
                $(".image_option").show();
            }
			else {
				$(".image_option").hide();
			}
        });
	}
    
    // Event - Lists
    if (document.getElementById('event_lists_page') != null) {
        grid = '#grid_event';
        resubmit_event(grid);
        
        $('#event_lists').submit(function (){
            resubmit_event(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
    
    // Event - Create
    if (document.getElementById('event_create_page') != null) {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            setDate: new Date(),
            autoclose: true,
            todayHighlight: true
        });
	}
    
    // Order - Lists
    if (document.getElementById('order_lists_page') != null) {
        grid = '#grid_order';
        resubmit_order(grid);
        
        $('#order_lists').submit(function (){
            resubmit_order(grid);
            $(grid).data('kendoGrid').refresh();
            return false;
        });
    }
});

function resubmit_event(grid) {
    $(grid).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "event_get",
                    dataType: "json",
                    type: "POST",
                    data: {
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
            serverFiltering: false,
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
            field: "Title",
            width: 200
        },
        {
            field: "Date",
            filterable: false,
            width: 50
        },
        {
            field: "Status",
            filterable: false,
            width: 50,
            template: "#= data.Status #"
        },
        {
            field: "Action",
            sortable: false,
            filterable: false,
            width: 50,
            template: "#= data.Action #"
        }]
    });
}

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

function resubmit_order(grid) {
    $(grid).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "order_get",
                    dataType: "json",
                    type: "POST",
                    data: {
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
            serverFiltering: false,
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
            field: "Email",
            filterable: false,
            width: 100
        },
        {
            field: "Phone",
            filterable: false,
            width: 70
        },
        {
            field: "Status",
            filterable: false,
            width: 50,
            template: "#= data.Status #"
        },
        {
            field: "Action",
            sortable: false,
            filterable: false,
            width: 50,
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

function resubmit_product(grid) {
    $(grid).kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "product_get",
                    dataType: "json",
                    type: "POST",
                    data: {
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
            serverFiltering: false,
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
            field: "PricePublic",
            title: "Public (Rp)",
            filterable: false,
            width: 100
        },
        {
            field: "PriceMember",
            title: "Member (Rp)",
            filterable: false,
            width: 100
        },
        {
            field: "Quantity",
            filterable: false,
            width: 100
        },
        {
            field: "Status",
            sortable: false,
            filterable: false,
            width: 70,
            template: "#= data.Status #"
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

/*
 * Upload image
 */
(function($) {
    // Product - Create
	if (document.getElementById('product_create_page') != null) {
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'true',
				type: 'product'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
        
		$("#other_photo").fileinput({
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'uploadExtraData': {
				watermark: 'true',
				type: 'product'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 4,
            'showCaption': false,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_other_photo');
			div.append('<input type="hidden" name="other_photo[]" class="input_other_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$(".input_other_photo").remove();
		});
	}
    
    // Image - Create
	if (document.getElementById('image_album_create_page') != null) {
        $("#photo").fileinput({
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'uploadExtraData': {
				watermark: 'true',
				type: 'gallery'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
            'showCaption': false,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo[]" class="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$(".input_photo").remove();
		});
    }
    
}).apply(this, [jQuery]);