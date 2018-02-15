<div class="row" id="kota_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_kota_edit').'?id='.$id; ?>" method="post" id="the_form">
					<input type="hidden" name="id_provinsi" id="id_provinsi" value="<?php echo $kota->provinsi->id_provinsi; ?>">
					<input type="hidden" name="selfkota" id="selfkota" value="<?php echo $kota->kota; ?>">
					<div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Kota Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="kota" id="kota" value="<?php echo set_value('kota', $kota->kota); ?>">
                                    <div class="fontred" id="errorbox_kota"></div>
									<?php echo form_error('kota', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Price</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="price" id="price" value="<?php echo set_value('price', $kota->price); ?>">
                                    <div class="fontred" id="errorbox_price"></div>
									<?php echo form_error('price', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
						<div class="form-actions">
							<button type="submit" name="submit" value="Submit" class="btn blue" id="submit_kota_edit">
								<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
							</button>
							<a href="<?php echo $this->config->item('link_kota_lists').'?id='.$kota->provinsi->id_provinsi; ?>" type="button" class="btn btn-danger">Cancel</a>
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
        $('#submit_kota_edit').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>