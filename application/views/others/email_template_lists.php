<div class="row" id="email_template_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Email Template - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <a href="<?php echo $this->config->item('link_preferences_create'); ?>" type="button" class="btn btn-success">Create New</a>
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
            var dataString = 'id='+ id +'&action=preferences_delete';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('preferences_delete'); ?>',
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
                field: "no",
                title: "No",
                sortable: false,
                filterable: false,
                width: 50
            },
                {
                    field: "key",
                    title: "Key",
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
                    field: "description",
                    title: "Description",
                    filterable: false,
                    sortable: false,
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
</script>