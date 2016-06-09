<div class="row" id="post_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="post-lists">
                        <div class="form-body">
                            <div class="form-group marginbottom0">
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="type" id="type">
                                        <option value="">-- All Type --</option>
                                        <?php
                                        foreach ($code_post_type as $key => $val)
                                        {
                                            if ($type == $key)
                                            {
                                                echo '<option value="'.$key.'"'.set_select('type', $key, TRUE).'>'.$val.'</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="'.$key.'"'.set_select('type', $key).'>'.$val.'</option>';
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- All Status --</option>
                                        <?php
                                        foreach ($code_post_status as $key => $val)
                                        {
                                            if ($status == $key)
                                            {
                                                echo '<option value="'.$key.'"'.set_select('status', $key, TRUE).'>'.$val.'</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="is_event" id="is_event">
                                        <option value="">-- Event --</option>
                                        <?php
                                        foreach ($code_yes_no as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('is_event', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="fontred"><em>* Search for: title</em></div>
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
            var dataString = 'id='+ id +'&action=post_delete';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('link_post_delete'); ?>',
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
                field: "no",
                title: "No",
                sortable: false,
                filterable: false,
                width: 50
            },
			{
				field: "title",
				title: "Title",
				width: 150
			},
			{
				field: "content",
				title: "Content",
				filterable: false,
				sortable: false,
				width: 300
			},
			{
				field: "type",
				title: "Type",
				filterable: false,
				sortable: false,
				width: 50
			},
			{
				field: "is_event",
				title: "Event",
                sortable: false,
				filterable: false,
				width: 50
			},
			{
				field: "status",
				title: "Status",
				filterable: false,
				sortable: false,
				width: 70,
				template: "#= data.status #"
			},
			{
				field: "created_date",
				title: "Created Date",
				filterable: false,
				width: 90
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

    $('#post-lists').submit(function (){
        resubmit();
        $('#multipleSort').data('kendoGrid').refresh();
        return false;
    });
</script>
