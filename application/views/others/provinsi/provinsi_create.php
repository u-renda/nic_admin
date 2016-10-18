<div class="row" id="provinsi_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_provinsi_create'); ?>" method="post" id="the-form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Provinsi Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="DKI Jakarta" name="provinsi" id="provinsi" value="<?php echo set_value('provinsi'); ?>">
                                    <div class="fontred" id="errorbox_provinsi"></div>
									<?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary" id="submit_provinsi_create">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                            </button>
							<button type="button" class="btn" data-dismiss="modal">Cancel</button>
                        </div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
