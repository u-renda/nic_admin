<div class="row" id="api_admin_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">API Admin</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_api_admin'); ?>" method="post">
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
                            <div class="col-sm-6 marginbottom15 admin_lists">
                                <label>Admin Role</label>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="1" name="admin_role" id="admin_role" value="<?php echo set_value('admin_role'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row admin_lists">
                            <div class="col-sm-6 marginbottom15">
                                <label>Limit</label>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="20" name="limit" id="limit" value="<?php echo set_value('limit'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Offset</label>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="0" name="offset" id="offset" value="<?php echo set_value('offset'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row admin_lists">
                            <div class="col-sm-6 marginbottom15">
                                <label>Order</label>
                                <select class="form-control" name="order" id="order">
                                    <?php foreach ($code_api_admin_order as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($key == 'name') { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Sort</label>
                                <select class="form-control" name="sort" id="sort">
                                    <?php foreach ($code_api_sort as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($key == 'asc') { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
						<div class="row admin_info">
							<div class="col-sm-6 marginbottom15">
                                <label>Choose Find By</label><span class="fontred"> *</span>
                                <select class="form-control" name="find_by" id="find_by">
                                    <?php
                                    foreach ($code_api_admin_find_by as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('find_by', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('find_by', '<div class="fontred">', '</div>'); ?>
                            </div>
							<div class="col-sm-6 marginbottom15">
                                <label>ID Admin / Username / Email / Name / Twitter</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" name="id_admin" id="id_admin" value="<?php echo set_value('id_admin'); ?>">
                                <?php echo form_error('id_admin', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
						</div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_api_admin">
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