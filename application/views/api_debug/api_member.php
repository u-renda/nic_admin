<div class="row" id="api_member_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">API Member</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_api_member'); ?>" method="post">
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
                                <label>Q (search)</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="q" id="q" value="<?php echo set_value('q'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Limit</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="20" name="limit" id="limit" value="<?php echo set_value('limit'); ?>">
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
                                    <?php foreach ($code_api_member_order as $key => $val) { ?>
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
                                <label>ID Card Type</label>
                                <select class="form-control" name="idcard_type" id="idcard_type">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_id_card_type as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('idcard_type', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_gender as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('gender', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Marital Status</label>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_marital_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('marital_status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Religion</label>
                                <select class="form-control" name="religion" id="religion">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_religion as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('religion', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Shirt Size</label>
                                <select class="form-control" name="shirt_size" id="shirt_size">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_shirt_size as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('shirt_size', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_api_member">
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
				<?php print_r($query_result); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit_api_member').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>
