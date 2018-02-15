<div class="row" id="provinsi_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Provinsi - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_provinsi_edit').'?id='.$id; ?>" method="post">
                    <input type="hidden" name="selfprovinsi" id="selfprovinsi" value="<?php echo $provinsi->provinsi; ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Provinsi Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?php echo set_value('provinsi', ucwords($provinsi->provinsi)); ?>">
                                    <?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
						<div class="form-actions">
							<button type="submit" name="submit" value="Submit" class="btn blue" id="submit_provinsi_edit">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
							</button>
							<a href="<?php echo $this->config->item('link_provinsi_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
						</div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit_provinsi_edit').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>
