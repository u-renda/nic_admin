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
                            <div class="col-sm-6 marginbottom15">
                                <label>Price public</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="100000" name="price_public" id="price_public" value="<?php echo set_value('price_public'); ?>">
                                    <div class="fontred" id="errorbox_price_public"></div>
									<?php echo form_error('price_public', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Price member</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="100000" name="price_member" id="price_member" value="<?php echo set_value('price_member'); ?>">
                                    <div class="fontred" id="errorbox_price_member"></div>
									<?php echo form_error('price_member', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-sm-6 marginbottom15">
								<label>Description</label><span class="fontred"> *</span>
								<div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150" name="description" id="description"><?php echo set_value('description'); ?></textarea>
									<div class="fontred" id="errorbox_description"></div>
									<?php echo form_error('description', '<div class="fontred">', '</div>'); ?>
								</div>
							</div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Quantity</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="10" name="quantity" id="quantity" value="<?php echo set_value('quantity'); ?>">
                                    <div class="fontred" id="errorbox_quantity"></div>
									<?php echo form_error('quantity', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
						</div>
						<div class="row">
							<div class="col-sm-6 marginbottom15" id="div_photo">
								<label class="control-label">Main Photo <span class="required">*</span></label>
								<input name="image" id="photo" class="file" type="file">
							</div>
						</div>
						<div class="well well-sm dark mt-lg">Aditional Information</div>
						<div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Size</label>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="XL, M, 25x12 cm" name="size" id="size" value="<?php echo set_value('size'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Colors</label>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="hitam, merah" name="colors" id="colors" value="<?php echo set_value('colors'); ?>">
                                </div>
                            </div>
						</div>
						<div class="row">
                            <div class="col-sm-6 marginbottom15">
								<label>Material</label>
								<div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150" name="material" id="material"><?php echo set_value('material'); ?></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 marginbottom15">
                                <label>Add other photo</label>
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
										<input name="image[]" multiple id="other_photo" class="file" type="file">
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
