<div class="row" id="admin_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin - Lists</h3>
            </div>
            <div class="panel-body">
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
            var dataString = 'id='+ id +'&action=admin_delete';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('link_admin_delete'); ?>',
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

    $('#admin-lists').submit(function (){
        resubmit();
        $('#multipleSort').data('kendoGrid').refresh();
        return false;
    });
</script>
