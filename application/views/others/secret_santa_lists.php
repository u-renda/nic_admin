<div class="row" id="email_template_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Secret Santa - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <a href="<?php echo $this->config->item('link_secret_santa_create'); ?>" type="button" class="btn btn-success">Create New User</a>
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
            var dataString = 'id='+ id +'&action=secret_santa_delete';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('link_secret_santa_delete'); ?>',
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

        $('body').delegate(".random", "click", function() {
            var id = $(this).attr("id");
            var dataString = 'id='+ id +'&action=secret_santa_random';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('link_secret_santa_random'); ?>',
                    data: dataString,
                    cache: false,
                    beforeSend: function()
                    {
                        $('.'+id+'-random').html('<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>');
                    },
                    success: function(data)
                    {
                        $('.'+id+'-random').html('<span class="glyphicon glyphicon-random fontorange font16" aria-hidden="true"></span>');
                        $('.modal-dialog').removeClass('modal-lg');
                        $('.modal-dialog').addClass('modal-sm');
                        $('.modal-title').text('Confirm Random');
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
                        url: "secret_santa_get",
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
                field: "id_secret_santa",
                title: "ID",
                sortable: false,
                filterable: false,
                width: 200
            },
			{
				field: "name",
				title: "Name",
				width: 100
			},
			{
				field: "chosen_id",
				title: "Chosen ID",
				filterable: false,
				sortable: false,
				width: 200
			},
			{
				field: "status",
				title: "Status",
				filterable: false,
				sortable: false,
				width: 150
			},
			{
				field: "created_date",
				title: "Created Date",
				filterable: false,
				sortable: false,
				width: 200
			},
			{
				field: "action",
				title: "Action",
				sortable: false,
				filterable: false,
				width: 120,
				template: "#= data.action #"
			}]
        });
    }

    $('#email-template-lists').submit(function (){
        resubmit();
        $('#multipleSort').data('kendoGrid').refresh();
        return false;
    });
</script>
