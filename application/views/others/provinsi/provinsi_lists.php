<div class="row" id="email_template_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Provinsi - Lists</h3>
            </div>
            <div class="panel-body">
				<div class="marginbottom15">
					<button type="button" class="btn btn-success" onclick="provinsi_create()" id="create_button"> Create New Provinsi </button>
					<!--<a href="<?php echo $this->config->item('link_provinsi_create'); ?>" type="button" class="btn btn-success">Create New Provinsi</a>-->
					<div class="fontred margintop10"><em>* Search for: provinsi name</em></div>
				</div>
                <div id="multipleSort"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
$(document).ready(function ()
{
	resubmit();

	$('body').delegate(".delete", "click", function() {
		var id = $(this).attr("id");
		var dataString = 'id='+ id +'&action=provinsi_delete';
		$.ajax(
			{
				type: "POST",
				url: '<?php echo $this->config->item('link_provinsi_delete'); ?>',
				data: dataString,
				cache: false,
				beforeSend: function()
				{
					$('.'+id+'-delete').html('<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>');
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
});

function resubmit() {
	$("#multipleSort").kendoGrid({
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

$('#email-template-lists').submit(function (){
	resubmit();
	$('#multipleSort').data('kendoGrid').refresh();
	return false;
});

function provinsi_create() {
	//$(this).magnificPopup({
	//	type: 'inline',
	//	preloader: false,
	//	focus: '#name',
	//	modal: true,
	//
	//	// When elemened is focused, some mobile browsers in some cases zoom in
	//	// It looks not nice, so we disable it:
	//	callbacks: {
	//		beforeOpen: function() {
	//			if($(window).width() < 700) {
	//				this.st.focus = false;
	//			} else {
	//				this.st.focus = '#name';
	//			}
	//		}
	//	}
	//});
	
	
	
	var id = $(this).attr("id");
	var title = $(this).attr("title");
	var dataString = 'id='+ id
	$.ajax(
	{
		type: "POST",
		url: 'provinsi_create',
		data: dataString,
		cache: false,
		success: function(data)
		{
			$('.modal-dialog').removeClass('modal-sm');
			$('.modal-dialog').addClass('modal-lg');
			$('.modal-title').text('Provinsi Create');
			$('.modal-body').html(data);
			$('#myModal').modal('show');
		}
	});
	return false;
}
</script>
