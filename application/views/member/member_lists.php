<div class="row" id="member_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="member-lists">
                        <div class="form-body">
                            <div class="form-group marginbottom0">
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="id_card_type" id="id_card_type">
                                        <option value="">-- All ID Card Type --</option>
                                        <?php
                                        foreach ($code_id_card_type as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('id_card_type', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- All Status --</option>
                                        <?php
                                        foreach ($code_member_status as $key => $val)
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
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="marital_status" id="marital_status">
                                        <option value="">-- All Marital Status --</option>
                                        <?php
                                        foreach ($code_marital_status as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('marital_status', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="shirt_size" id="shirt_size">
                                        <option value="">-- All Shirt Size --</option>
                                        <?php
                                        foreach ($code_shirt_size as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('shirt_size', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="religion" id="religion">
                                        <option value="">-- All Religion --</option>
                                        <?php
                                        foreach ($code_religion as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('religion', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">-- All Gender --</option>
                                        <?php
                                        foreach ($code_gender as $key => $val)
                                        {
                                            if (isset($gender) == TRUE)
                                            {
                                                if ($gender == $key)
                                                {
                                                    echo '<option value="'.$key.'"'.set_select('gender', $key, TRUE).'>'.$val.'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$key.'"'.set_select('gender', $key).'>'.$val.'</option>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<option value="'.$key.'"'.set_select('gender', $key).'>'.$val.'</option>';
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="fontred"><em>* Search for: name, email, member_card</em></div>
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
            var dataString = 'id='+ id +'&action=member_delete';
            $.ajax(
                {
                    type: "POST",
                    url: '<?php echo $this->config->item('link_member_delete'); ?>',
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

        $('body').delegate(".view", "click", function() {
            var id = $(this).attr("id");
            var title = $(this).attr("title");
            var dataString = 'id='+ id
            $.ajax(
            {
                type: "POST",
                url: '<?php echo $this->config->item('link_member_view'); ?>',
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
    });

    function resubmit() {
        $("#multipleSort").kendoGrid({
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
                field: "no",
                title: "No",
                sortable: false,
                filterable: false,
                width: 50
            },
            {
                field: "name",
                title: "Name",
                width: 200
            },
            {
                field: "member_card",
                title: "Member Card",
                filterable: false,
                sortable: false,
                width: 110
            },
            {
                field: "shirt_size",
                title: "Shirt Size",
                filterable: false,
                sortable: false,
                width: 60
            },
            {
                field: "member_number",
                title: "Member Number",
                filterable: false,
                width: 100
            },
            {
                field: "status",
                title: "Status",
                filterable: false,
                sortable: false,
                width: 100,
                template: "#= data.status #"
            },
            {
                field: "created_date",
                title: "Created Date",
                filterable: false,
                width: 80
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

    $('#member-lists').submit(function (){
        resubmit();
        $('#multipleSort').data('kendoGrid').refresh();
        return false;
    });
</script>
