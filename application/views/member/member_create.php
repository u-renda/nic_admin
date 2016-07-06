<div class="row" id="member_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_member_create'); ?>" method="post" enctype="multipart/form-data">
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
                                <label>Name</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="Agnez Mo" name="name" id="name" value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Email</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="admin@nezindaclub.com" name="email" id="email" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>ID Card Type</label><span class="fontred"> *</span>
                                <select class="form-control" name="idcard_type" id="idcard_type">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_idcard_type as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('idcard_type', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('idcard_type', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>ID Card Number</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="1234567890" name="idcard_number" id="idcard_number" value="<?php echo set_value('idcard_number'); ?>">
                                    <?php echo form_error('idcard_number', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>ID Card Address</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <textarea class="form-control height150" name="idcard_address" id="idcard_address"><?php echo set_value('idcard_address'); ?></textarea>
                                    <?php echo form_error('idcard_address', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Shipment Address</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <textarea class="form-control height150" name="shipment_address" id="shipment_address"><?php echo set_value('shipment_address'); ?></textarea>
                                    <?php echo form_error('shipment_address', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Gender</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php
                                    foreach ($code_member_gender as $key => $val)
                                    {
                                        echo '<div class="radio-inline radio-custom"><input type="radio" name="gender" id="gender_'.$key.'" value="'.$key.'" '.set_radio('gender', $key).'/><label for="gender_'.$key.'">'.$val.'</label></div>';
                                    }
                                    ?>
                                </div>
                                <?php echo form_error('gender', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Shipment Postal Code</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="15413" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code'); ?>">
                                    <?php echo form_error('postal_code', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Phone Number</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="08121234567890" name="phone_number" id="phone_number" value="<?php echo set_value('phone_number'); ?>">
                                    <?php echo form_error('phone_number', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Provinsi & Kota</label><span class="fontred"> *</span>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="id_provinsi" id="id_provinsi">
                                            <option value="">-- Select Provinsi --</option>
                                            <?php
                                            foreach ($provinsi_lists as $key => $val)
                                            {
                                                echo '<option id="'.$val->id_provinsi.'" value="'.$val->id_provinsi.'"'.set_select('id_provinsi', $val->id_provinsi).'>'.ucwords($val->provinsi).'</option>';
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('id_provinsi', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-12 margintop10">
                                        <div id="id_kota"></div>
										<?php echo form_error('id_kota', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Birth Place & Date</label><span class="fontred"> *</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Jakarta" name="birth_place" id="birth_place" value="<?php echo set_value('birth_place'); ?>">
                                        <?php echo form_error('birth_place', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                    <div class="input-group col-sm-6 paddingright15 date date-picker">
                                        <input type="text" readonly="readonly" class="form-control form-filter" id="birth_date" name="birth_date" value="<?php echo set_value('birth_date'); ?>" />
                                        <span class="input-group-addon hand-pointer">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                    <?php echo form_error('birth_date', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Marital Status</label><span class="fontred"> *</span>
                                <select class="form-control" name="marital_status" id="marital_status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_marital_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('marital_status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('marital_status', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Occupation</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="Karyawan" name="occupation" id="occupation" value="<?php echo set_value('occupation'); ?>">
                                    <?php echo form_error('occupation', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Religion</label><span class="fontred"> *</span>
                                <select class="form-control" name="religion" id="religion">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_religion as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('religion', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('religion', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Shirt Size</label><span class="fontred"> *</span>
                                <select class="form-control" name="shirt_size" id="shirt_size">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_shirt_size as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('shirt_size', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('shirt_size', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Status</label><span class="fontred"> *</span>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_member_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
                                <?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Close Up Photo</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<i class="fa fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Change</span>
												<span class="fileupload-new">Select file</span>
												<input type="file" name="photo" id="photo" />
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
                                    <?php echo form_error('photo', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>ID Card Photo</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<i class="fa fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Change</span>
												<span class="fileupload-new">Select file</span>
												<input type="file" name="idcard_photo" id="idcard_photo" />
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
										</div>
									</div>
                                    <?php echo form_error('idcard_photo', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>