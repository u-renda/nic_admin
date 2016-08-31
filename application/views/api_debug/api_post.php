<div class="row" id="api_post_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">API Post</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_api_post'); ?>" method="post">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Endpoint</label><span class="fontred"> *</span>
                                <select class="form-control" name="endpoint" id="endpoint">
                                    <?php
                                    foreach ($code_api_endpoint as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('endpoint', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('endpoint', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Media Type</label>
                                <select class="form-control" name="media_type" id="media_type">
									<option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_post_media_type as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('media_type', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Limit</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="20" name="limit" id="limit" value="<?php echo set_value('limit'); ?>">
                                    <?php echo form_error('limit', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Offset</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="0" name="offset" id="offset" value="<?php echo set_value('offset'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Order</label>
                                <select class="form-control" name="order" id="order">
                                    <?php foreach ($code_api_post_order as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($key == 'created_date') { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Sort</label>
                                <select class="form-control" name="sort" id="sort">
                                    <?php foreach ($code_api_sort as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($key == 'desc') { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_post_type as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('type', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_post_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Event</label>
                                <select class="form-control" name="is_event" id="is_event">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_yes_no as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('is_event', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_api_post">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Query
                            </button>
                        </div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Result</h3>
            </div>
            <div class="panel-body">
				<pre><?php print_r($query_result); ?></pre>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
