<div class="row" id="post_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="post_lists">
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
                <div id="grid_post"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
