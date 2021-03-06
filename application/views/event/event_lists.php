<div class="row" id="event_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Event - Lists</h3>
            </div>
            <div class="panel-body">
                <div class="marginbottom15">
                    <form role="form" class="form-horizontal" id="event_lists">
                        <div class="form-body">
                            <div class="form-group marginbottom0">
                                <div class="col-sm-3 marginbottom15">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- All Status --</option>
                                        <?php
                                        foreach ($code_event_status as $key => $val)
                                        {
                                            if (isset($status) == TRUE)
                                            {
                                                if ($status == $key)
                                                {
                                                    echo '<option value="'.$key.'"'.set_select('status', $key, TRUE).'>'.$val.'</option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
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
                    <div class="fontred"><em>* Search for: title</em></div>
                </div>
                <div id="grid_event"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>