<div class="row" id="member_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Edit</h3>
            </div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form action="<?php echo $this->config->item('link_member_edit').'?id='.$member->id_member; ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" id="id" value="<?php echo $member->id_member; ?>">
							<input type="hidden" name="selfemail" id="selfemail" value="<?php echo $member->email; ?>">
							<div class="form-actions">
								<?php
								if ($member->status == 1) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Request Transfer</a>';
									echo '<a href="'.$this->config->item('link_member_invalid').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-warning">Invalid Data</a>';
								} elseif ($member->status == 2) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Re-request Transfer</a>';
								} ?>
							</div>
							<div class="form-body">
								<div class="panel-group" id="accordion2">
									<div class="panel panel-accordion panel-accordion-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
													<i class="fa fa-user"></i> Member
												</a>
											</h4>
										</div>
										<div id="collapse2One" class="accordion-body collapse in">
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Name</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name', ucwords($member->name)); ?>">
															<?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Email</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email', $member->email); ?>">
															<?php echo form_error('email', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>ID Card Type</label><span class="fontred"> *</span>
														<select class="form-control" name="idcard_type" id="idcard_type">
															<option value="">-- Select One --</option>
															<?php foreach ($code_member_idcard_type as $key => $val) { ?>
															<option value="<?php echo $key; ?>" <?php if ($member->idcard_type == $key) { echo 'selected="selected"'; } echo set_select('idcard_type', $key); ?>><?php echo $val; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('idcard_type', '<div class="fontred">', '</div>'); ?>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>ID Card Number</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="idcard_number" id="idcard_number" value="<?php echo set_value('idcard_number', $member->idcard_number); ?>">
															<?php echo form_error('idcard_number', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Phone Number</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo set_value('phone_number', $member->phone_number); ?>">
															<?php echo form_error('phone_number', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Gender</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<?php foreach ($code_member_gender as $key => $val) { ?>
																<label class="radio-inline radio-custom">
																	<input type="radio" name="gender" id="gender" value="<?php echo $key; ?>" <?php if ($member->gender == $key) { echo 'checked="checked"'; } echo set_radio('gender', $key) .'><label>'. $val . '</label>'; ?>
																</label>
															<?php } ?>
														</div>
														<?php echo form_error('gender', '<div class="fontred">', '</div>'); ?>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Birth Place & Date</label><span class="fontred"> *</span>
														<div class="row">
															<div class="col-sm-6">
																<input type="text" class="form-control" name="birth_place" id="birth_place" value="<?php echo set_value('birth_place', ucwords($member->birth_place)); ?>">
																<?php echo form_error('birth_place', '<div class="fontred">', '</div>'); ?>
															</div>
															<div class="input-group col-sm-6 paddingright15 date date-picker">
																<input type="text" class="form-control form-filter" id="birth_date" name="birth_date" value="<?php echo set_value('birth_date', date('d M Y', strtotime($member->birth_date))); ?>" />
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
															<?php foreach ($code_member_marital_status as $key => $val) { ?>
																<option value="<?php echo $key; ?>" <?php if ($member->marital_status == $key) { echo 'selected="selected"'; } echo set_select('marital_status', $key); ?>><?php echo $val; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('marital_status', '<div class="fontred">', '</div>'); ?>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Occupation</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="occupation" id="occupation" value="<?php echo set_value('occupation', ucwords($member->occupation)); ?>">
															<?php echo form_error('occupation', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Religion</label><span class="fontred"> *</span>
														<select class="form-control" name="religion" id="religion">
															<option value="">-- Select One --</option>
															<?php foreach ($code_member_religion as $key => $val) { ?>
																<option value="<?php echo $key; ?>" <?php if ($member->religion == $key) { echo 'selected="selected"'; } echo set_select('religion', $key); ?>><?php echo $val; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('religion', '<div class="fontred">', '</div>'); ?>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Close Up Photo</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<img src="<?php echo $member->photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="checkboxPhoto" value="yes">
																<label for="checkboxPhoto">Change photo</label>
															</div>
															<span id="change_photo">
																<input type="file" class="form-control" name="photo" id="photo">
																<?php echo form_error('photo', '<div class="fontred">', '</div>'); ?>
															</span>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>ID Card Photo</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<img src="<?php echo $member->idcard_photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="checkboxIDcard" value="yes">
																<label for="checkboxIDcard">Change ID card photo</label>
															</div>
															<span id="change_idcard_photo">
																<input type="file" class="form-control" name="idcard_photo" id="idcard_photo">
																<?php echo form_error('idcard_photo', '<div class="fontred">', '</div>'); ?>
															</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>ID Card Address</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<textarea class="form-control height150" name="idcard_address" id="idcard_address"><?php echo set_value('idcard_address', stripcslashes($member->idcard_address)); ?></textarea>
															<?php echo form_error('idcard_address', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Status</label>
														<h4><p class="form-control-static"><?php echo $color_member_status; ?></p></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-accordion panel-accordion-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
													<i class="fa fa-shopping-cart"></i> Shipment
												</a>
											</h4>
										</div>
										<div id="collapse2Two" class="accordion-body collapse">
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Shipment Address</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<textarea class="form-control height150" name="shipment_address" id="shipment_address"><?php echo set_value('shipment_address', stripcslashes($member->shipment_address)); ?></textarea>
															<?php echo form_error('shipment_address', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Provinsi & Kota</label><span class="fontred"> *</span>
														<div class="row">
															<div class="col-sm-12">
																<select class="form-control" name="id_provinsi" id="id_provinsi">
																	<option value="">-- Select Provinsi --</option>
																	<?php foreach ($provinsi_lists as $key => $val) { ?>
																		<option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php if ($kota->id_provinsi == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->provinsi); ?></option>
																	<?php } ?>
																</select>
																<?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
															</div>
															<div class="col-sm-12 margintop10">
																<select class="form-control" name="id_kota" id="id_kota">
																	<option value="">-- Select Kota --</option>
																	<?php foreach ($kota_lists as $key => $val) { ?>
																		<option value="<?php echo $val->id_kota; ?>" <?php if ($member->kota->id_kota == $val->id_kota) { echo 'selected="selected"'; } echo set_select('kota', $val->id_kota); ?>><?php echo ucwords($val->kota).' - '.$member->kota->price; ?></option>
																	<?php } ?>
																</select>
																<?php echo form_error('kota', '<div class="fontred">', '</div>'); ?>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Shipment Postal Code</label><span class="fontred"> *</span>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code', $member->postal_code); ?>">
															<?php echo form_error('postal_code', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Shirt Size</label><span class="fontred"> *</span>
														<select class="form-control" name="shirt_size" id="shirt_size">
															<option value="">-- Select One --</option>
															<?php foreach ($code_member_shirt_size as $key => $val) { ?>
																<option value="<?php echo $key; ?>" <?php if ($member->shirt_size == $key) { echo 'selected="selected"'; } echo set_select('shirt_size', $key); ?>><?php echo $val; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('shirt_size', '<div class="fontred">', '</div>'); ?>
													</div>
												</div>
												<?php if ($member->status == 3 || $member->status == 4) { ?>
												<hr><h3>Transfer Info</h3>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Jumlah Transfer</label>
														<p class="form-control-static"><?php echo 'Rp '.$member_transfer->total; ?></p>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>No Resi Pengiriman</label>
														<input type="text" class="form-control" name="resi2" id="resi2" value="<?php echo set_value('resi2', strtoupper($member_transfer->resi)); ?>">
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Bukti Transfer</label>
														<div class="input-group col-sm-12">
															<img src="<?php echo $member_transfer->photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
															<div class="checkbox-custom checkbox-default">
																<input type="checkbox" id="checkboxPhotoTransfer" value="yes">
																<label for="checkboxPhotoTransfer">Change transfer photo</label>
															</div>
															<span id="change_transfer_photo">
																<input type="file" class="form-control" name="transfer_photo2" id="transfer_photo2">
															</span>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Other Information</label>
														<div class="input-group col-sm-12">
															<textarea class="form-control height150" name="other_information2" id="other_information2"><?php echo set_value('other_information2', stripcslashes($member_transfer->other_information)); ?></textarea>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Tanggal Transfer</label>
														<div class="input-group paddingright15 date date-picker">
															<input type="text" class="form-control form-filter" id="transfer_date2" name="transfer_date2" value="<?php echo set_value('transfer_date2', date('d M Y', strtotime($member_transfer->date))); ?>" />
															<span class="input-group-addon hand-pointer">
																<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															</span>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Nama Pemilik Rekening</label>
														<input type="text" class="form-control" name="account_name2" id="account_name2" value="<?php echo set_value('account_name2', ucwords($member_transfer->account_name)); ?>">
													</div>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="panel panel-accordion panel-accordion-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
													<i class="fa fa-credit-card"></i> Membership
												</a>
											</h4>
										</div>
										<div id="collapse2Three" class="accordion-body collapse">
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Username</label>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username', $member->username); ?>">
															<?php echo form_error('username', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Password</label>
														<div class="checkbox-custom checkbox-default">
															<input type="checkbox" id="checkboxPassword" value="yes">
															<label for="checkboxPassword">Change password</label>
														</div>
														<span id="change_password">
															<div class="input-group col-sm-12">
																<input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>">
																<?php echo form_error('password', '<div class="fontred">', '</div>'); ?>
															</div>
														</span>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Member Number</label>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="member_number" id="member_number" value="<?php echo set_value('member_number', $member->member_number); ?>">
															<?php echo form_error('member_number', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
													<div class="col-sm-6 marginbottom15">
														<label>Member Card Number</label>
														<div class="input-group col-sm-12">
															<input type="text" class="form-control" name="member_card" id="member_card" value="<?php echo set_value('member_card', $member->member_card); ?>">
															<?php echo form_error('member_card', '<div class="fontred">', '</div>'); ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 marginbottom15">
														<label>Status</label><span class="fontred"> *</span>
														<select class="form-control" name="status" id="status">
															<option value="">-- Select One --</option>
															<?php foreach ($code_member_status as $key => $val) { ?>
																<option value="<?php echo $key; ?>" <?php if ($member->status == $key) { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
															<?php } ?>
														</select>
														<?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
													</div>
												</div>
												<div id="change_status">
													<hr><h3>Transfer Info</h3>
													<h5 class="fontred">* Please fill form below</h5>
													<div class="row">
														<div class="col-sm-6 marginbottom15">
															<label>Jumlah Transfer</label>
															<p class="form-control-static"><?php echo 'Rp '.$total_transfer; ?></p>
														</div>
														<div class="col-sm-6 marginbottom15">
															<label>No Resi Pengiriman</label>
															<input type="text" class="form-control" name="resi" id="resi" value="<?php echo set_value('resi'); ?>">
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6 marginbottom15">
															<label>Bukti Transfer</label><span class="fontred">*</span>
															<div class="input-group col-sm-12">
																<input type="file" class="form-control" name="transfer_photo" id="transfer_photo">
															</div>
														</div>
														<div class="col-sm-6 marginbottom15">
															<label>Other Information</label><span class="fontred">*</span>
															<div class="input-group col-sm-12">
																<textarea class="form-control height150" name="other_information" id="other_information"><?php echo set_value('other_information'); ?></textarea>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6 marginbottom15">
															<label>Tanggal Transfer</label><span class="fontred">*</span>
															<div class="input-group paddingright15 date date-picker">
																<input type="text" class="form-control form-filter" id="transfer_date" name="transfer_date" value="<?php echo set_value('transfer_date'); ?>" />
																<span class="input-group-addon hand-pointer">
																	<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																</span>
															</div>
														</div>
														<div class="col-sm-6 marginbottom15">
															<label>Nama Pemilik Rekening</label><span class="fontred">*</span>
															<input type="text" class="form-control" name="account_name" id="account_name" value="<?php echo set_value('account_name', ucwords($member_transfer->account_name)); ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_edit">
									<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
								</button>
								<a href="<?php echo $this->config->item('link_member_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
							</div>
						</form>
					</div>
				</div>
                <!--<div class="row">-->
                <!--    <div class="col-sm-12 marginbottom15">-->
                <!--        <?php if ($member->status == 1) { ?>-->
                <!--        <a href="<?php echo $this->config->item('link_member_request_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Request Transfer</a>-->
                <!--        <a href="<?php echo $this->config->item('link_member_invalid').'?id='.$member->id_member; ?>" type="button" class="btn btn-warning">Invalid Data</a>-->
                <!--        <?php } elseif ($member->status == 2) { ?>-->
                <!--        <a href="<?php echo $this->config->item('link_member_request_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Request Transfer</a>-->
                <!--        <?php } elseif ($member->status == 3) { ?>-->
                <!--        <a href="<?php echo $this->config->item('link_member_approve').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Approve</a>-->
                <!--        <a href="<?php echo $this->config->item('link_member_invalid_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-warning">Invalid Transfer</a>-->
                <!--        <?php } elseif ($member->status == 4) { ?>-->
                <!--        <a href="<?php echo $this->config->item('link_member_resend_approval').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Resend Approval</a>-->
                <!--        <?php } elseif ($member->status == 5) { ?>-->
                <!--        <a href="<?php echo $this->config->item('link_member_resend_invalid').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Resend Invalid</a>-->
                <!--        <?php } ?>-->
                <!--    </div>-->
                <!--</div>-->
                
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                    
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>