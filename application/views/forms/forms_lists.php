<div class="row" id="forms_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forms - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="forms_lists">
                        <div class="form-body">
                            <div class="form-group marginbottom0">
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- All Status --</option>
                                        <?php
                                        foreach ($code_forms_status as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if ($alert_type == 'success')
                {
                    echo '<div class="alert alert-success">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo '<strong>Well done!</strong> Success '.$alert_msg.' forms.</div>';
                }
                elseif ($alert_type == 'error')
                {
                    echo '<div class="alert alert-danger">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo '<strong>Oh snap!</strong> Failed '.$alert_msg.' forms.</div>';
                }
                ?>
                <div id="grid_forms"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>