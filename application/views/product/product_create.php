<div class="row" id="product_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_product_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Name</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="Notebook" name="name" id="name" value="<?php echo set_value('name'); ?>">
                                    <div class="fontred" id="errorbox_name"></div>
									<?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Price</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="100000" name="price" id="price" value="<?php echo set_value('price'); ?>">
                                    <div class="fontred" id="errorbox_price"></div>
									<?php echo form_error('price', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-sm-6 marginbottom15">
								<label>Type</label><span class="fontred"> *</span>
								<div class="input-group col-sm-12">
									<?php
									foreach ($code_product_type as $key => $val)
									{
										echo '<div class="radio-inline radio-custom">';
										echo '<input type="radio" name="type" id="type_'.$key.'" value="'.$key.'" '.set_radio('type', $key); if ($key == 0) { echo 'checked'; } echo '/>';
										echo '<label for="type_'.$key.'">'.$val.'</label></div>';
									}
									?>
								</div>
								<?php echo form_error('type', '<div class="fontred">', '</div>'); ?>
							</div>
							<div class="col-sm-6 marginbottom15">
								<label>Status</label><span class="fontred"> *</span>
								<select class="form-control" name="status" id="status">
									<option value="">-- Select One --</option>
									<?php
									foreach ($code_product_status as $key => $val)
									{
										echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
									}
									?>
								</select>
								<div class="fontred" id="errorbox_status"></div>
								<?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
							</div>
                        </div>
						<div class="row">
							<div class="col-sm-6 marginbottom15" id="div_photo">
								<label class="control-label">Main Photo <span class="required">*</span></label>
								<input name="image" id="photo" class="file" type="file">
							</div>
							<div class="col-sm-6 marginbottom15">
								<label>Description</label><span class="fontred"> *</span>
								<div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150 mceEditor" name="description" id="description"><?php echo set_value('description'); ?></textarea>
									<div class="fontred" id="errorbox_description"></div>
									<?php echo form_error('description', '<div class="fontred">', '</div>'); ?>
								</div>
							</div>
						</div>
						<div class="well well-sm dark mt-lg">Aditional Information</div>
						<div class="row">
							<div class="col-sm-6 marginbottom15">
								<label>Ada ukurannya?</label><span class="fontred"> *</span>
								<div class="input-group col-sm-12">
									<div class="radio-inline radio-custom">
										<input type="radio" name="sizable" class="sizable" id="yes" value="yes" <?php echo set_radio('sizable', 'yes'); ?>>
										<label for="yes">Yes</label>
									</div>
									<div class="radio-inline radio-custom">
										<input type="radio" name="sizable" class="sizable" id="no" value="no" checked <?php echo set_radio('sizable', 'no'); ?>>
										<label for="no">No</label>
									</div>
								</div>
								<?php echo form_error('sizable', '<div class="fontred">', '</div>'); ?>
								
                                <div class="sizable_option margintop10">
									<div class="col-sm-12 paddinglr0 form-inline">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm mr-md">
											<input type="checkbox" name="size_s" id="size_s">
											<label for="size_s">S</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="quantity" name="quantity_s">
										</div>
									</div>
									<div class="col-sm-12 paddinglr0 form-inline">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm mr-md">
											<input type="checkbox" name="size_m" id="size_m">
											<label for="size_m">M</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="quantity" name="quantity_m">
										</div>
									</div>
									<div class="col-sm-12 paddinglr0 form-inline">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm mr-md">
											<input type="checkbox" name="size_l" id="size_l">
											<label for="size_l">L</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="quantity" name="quantity_l">
										</div>
									</div>
									<div class="col-sm-12 paddinglr0 form-inline">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm mr-md">
											<input type="checkbox" name="size_xl" id="size_xl">
											<label for="size_xl">XL</label>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" placeholder="quantity" name="quantity_xl">
										</div>
									</div>
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 marginbottom15">
                                <label>Add another photo</label>
                                <div class="input-group col-sm-12">
									<div class="radio-inline radio-custom">
										<input type="radio" name="media" class="media" id="yes" value="yes" <?php echo set_radio('other_photo', 'yes'); ?>>
										<label for="yes">Yes</label>
									</div>
									<div class="radio-inline radio-custom">
										<input type="radio" name="media" class="media" id="no" value="no" checked <?php echo set_radio('other_photo', 'no'); ?>>
										<label for="no">No</label>
									</div>
                                </div>
                                <div class="image_option margintop10">
									<div class="col-sm-12 paddinglr0" id="div_other_photo">
										<input name="image" multiple id="other_photo" class="file" type="file">
									</div>
                                </div>
							</div>
						</div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_event_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
