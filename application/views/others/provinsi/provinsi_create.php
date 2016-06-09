<div id="admin_create_page" class="modal-block modal-block-primary mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Provinsi Create</h2>
		</header>
		<div class="panel-body">
			<form action="<?php echo $this->config->item('link_provinsi_create'); ?>" method="post">
				<?php if (isset($error)) {
					if (is_object($error)) {
						foreach ($error as $key => $val) {
							echo '<div class="fontred">'.$key.' = '.$val.'</div>';
						}
					} else {
						echo '<div class="fontred">'.$error.'</div>';
					}
				} ?>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Provinsi Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" placeholder="DKI Jakarta" name="provinsi" id="provinsi" value="<?php echo set_value('provinsi'); ?>">
                        <?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
					</div>
				</div>
			</form>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="submit" name="submit" value="Submit" class="btn blue modal-confirm" id="submit_provinsi_create">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
					</button>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	</section>
</div>

<div class="row" id="admin_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Provinsi - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_provinsi_create'); ?>" method="post">
                    <div class="form-body">
                        <?php if (isset($error)) {
							if (is_object($error)) {
								foreach ($error as $key => $val) {
									echo '<div class="fontred">'.$key.' = '.$val.'</div>';
								}
							} else {
								echo '<div class="fontred">'.$error.'</div>';
							}
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Provinsi Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="DKI Jakarta" name="provinsi" id="provinsi" value="<?php echo set_value('provinsi'); ?>">
                                    <?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_provinsi_create">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                            </button>
							<button type="button" class="btn bg-color-grey" onclick="goBack()"> Back </button>
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
	$('#submit_provinsi_create').click(function () {
		$(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
	});
	
	$('.modal-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		modal: true,

		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});
});

//function goBack() {
//    window.history.back()
//}
</script>
