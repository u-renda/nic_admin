<div class="row" id="member_transfer_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member Transfer - Edit</h3>
            </div>
            <div class="panel-body">
				<form action="<?php echo $this->config->item('link_member_transfer_edit').'?id='.$member_transfer->id_member_transfer; ?>" method="post" enctype="multipart/form-data" id="the_form">
					<input type="hidden" name="id" id="id" value="<?php echo $member_transfer->id_member_transfer; ?>">
					<div class="form-body">
						<div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Member Name</label>
                                    <div class="col-sm-12 paddinglr0">
                                        <p class="form-control-static"><?php echo $member_transfer->member_name; ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Type</label>
                                    <div class="col-sm-12 paddinglr0">
                                        <p class="form-control-static text-success"><?php echo $member_transfer->type; ?></p>
                                    </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Transfer Name</label>
                                    <div class="col-sm-12 paddinglr0">
                                        <p class="form-control-static"><?php echo $member_transfer->name; ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Total</label>
                                    <div class="col-sm-12 paddinglr0">
                                        <p class="form-control-static"><?php echo $member_transfer->total; ?></p>
                                    </div>
                                </div>
							</div>
							<hr>
							<div class="row">
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Tanggal transfer</label><span class="fontred"> *</span>
                                    <div class="row">
										<div class="input-group col-sm-12 paddinglr15 date date-picker">
											<input type="text" readonly="readonly" class="form-control form-filter" id="date" name="date" value="<?php echo set_value('date'); ?>" />
											<span class="input-group-addon hand-pointer">
												<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
											</span>
										</div>
										<div class="fontred" id="errorbox_date"></div>
										<?php echo form_error('date', '<div class="fontred">', '</div>'); ?>
									</div>
                                </div>
								<div class="col-sm-6 marginbottom15">
									<label class="fontbold">Pemilik rekening</label><span class="fontred"> *</span>
                                    <div class="col-sm-12 paddinglr0">
                                        <input type="text" class="form-control" name="account_name" id="account_name" value="<?php echo set_value('account_name', $member_transfer->account_name); ?>">
                                        <div class="fontred" id="errorbox_account_name"></div>
                                        <?php echo form_error('account_name', '<div class="fontred">', '</div>'); ?>
                                    </div>
								</div>
                            </div>
							<div class="row">
                                <div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">Status</label><span class="fontred"> *</span>
                                    <select class="form-control" name="status" id="status">
										<option value="">-- Select One --</option>
										<?php
										foreach ($code_member_transfer_status as $key => $val) { ?>
											<option value="<?php echo $key; ?>" <?php if ($member_transfer->status == $key) { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
										<?php } ?>
									</select>
									<div class="fontred" id="errorbox_status"></div>
									<?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
                                </div>
								<div class="col-sm-6 marginbottom15">
                                    <label class="fontbold">No. Resi</label>
									<div class="col-sm-12 paddinglr0">
                                        <input type="text" class="form-control" name="resi" id="resi" value="<?php echo set_value('resi', $member_transfer->resi); ?>">
                                    </div>
								</div>
                            </div>
							<div class="row">
								<div class="col-sm-6 marginbottom15">
									<label class="fontbold">Bukti Transfer</label><span class="fontred">*</span>
									<div class="col-sm-12 paddinglr0">
										<input name="image" id="photo" class="file" type="file">
									</div>
								</div>
								<div class="col-sm-6 marginbottom15">
									<label class="fontbold">Other information</label>
									<div class="col-sm-12 paddinglr0">
										<textarea class="form-control height150" name="other_information" id="other_information"><?php echo set_value('other_information', stripcslashes($member_transfer->other_information)); ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_transfer_edit">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
						</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>