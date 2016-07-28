<div class="row" id="member_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="member_lists">
                        <div class="form-body">
                            <div class="form-group marginbottom0">
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="id_card_type" id="id_card_type">
                                        <option value="">-- All ID Card Type --</option>
                                        <?php
                                        foreach ($code_member_idcard_type as $key => $val)
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
                                        foreach ($code_member_marital_status as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('marital_status', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="shirt_size" id="shirt_size">
                                        <option value="">-- All Shirt Size --</option>
                                        <?php
                                        foreach ($code_member_shirt_size as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('shirt_size', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="religion" id="religion">
                                        <option value="">-- All Religion --</option>
                                        <?php
                                        foreach ($code_member_religion as $key => $val)
                                        {
                                            echo '<option value="'.$key.'"'.set_select('religion', $key).'>'.$val.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 marginbottom15">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">-- All Gender --</option>
                                        <?php
                                        foreach ($code_member_gender as $key => $val)
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
                <?php
                if ($alert_type == 'success')
                {
                    echo '<div class="alert alert-success">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo '<strong>Well done!</strong> Success '.$alert_msg.' member.</div>';
                }
                elseif ($alert_type == 'error')
                {
                    echo '<div class="alert alert-danger">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                    echo '<strong>Oh snap!</strong> Failed '.$alert_msg.' member.</div>';
                }
                ?>
                <div id="grid_member"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>