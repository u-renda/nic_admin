<div class="row" id="image_album_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Image Album - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_image_album_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Album Name</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="TogetherNEZ 3.0" name="name" id="name" value="<?php echo set_value('name'); ?>">
                                    <div class="fontred" id="errorbox_name"></div>
									<?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
							<div class="col-sm-6 marginbottom15">
								<label>Date</label><span class="fontred"> *</span>
                                <div class="row">
                                    <div class="input-group col-sm-12 paddinglr15 date date-picker">
                                        <input type="text" class="form-control form-filter" id="date" name="date" value="<?php echo set_value('date'); ?>" />
										<span class="input-group-addon hand-pointer">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                </div>
								<div class="fontred" id="errorbox_date"></div>
								<?php echo form_error('date', '<div class="fontred">', '</div>'); ?>
							</div>
                        </div>
						<div class="row">
							<div class="col-sm-12 marginbottom15" id="div_photo">
								<label class="control-label">Photos <span class="required">*</span></label>
								<span id="helpBlock" class="help-block text-danger">(Bisa memilih banyak foto sekaligus)</span>
								<input name="image[]" multiple id="photo" class="file" type="file">
							</div>
						</div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
