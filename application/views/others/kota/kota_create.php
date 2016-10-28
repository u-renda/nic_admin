<div class="row" id="kota_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_kota_create'); ?>" method="post" id="the_form">
                    <input type="hidden" name="id_provinsi" id="id_provinsi" value="<?php echo $id_provinsi; ?>">
					<div class="form-body">
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Kota Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="Cipete" name="kota" id="kota" value="<?php echo set_value('kota'); ?>">
                                    <div class="fontred" id="errorbox_kota"></div>
									<?php echo form_error('kota', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Price</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="10000" name="price" id="price" value="<?php echo set_value('price'); ?>">
                                    <div class="fontred" id="errorbox_price"></div>
									<?php echo form_error('price', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary" id="submit_kota_create">
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