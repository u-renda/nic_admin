<div class="row" id="member_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Edit</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 marginbottom15">
                        <?php if ($member->status == 1) { ?>
                        <a href="<?php echo $this->config->item('link_member_request_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Request Transfer</a>
                        <a href="<?php echo $this->config->item('link_member_invalid').'?id='.$member->id_member; ?>" type="button" class="btn btn-warning">Invalid Data</a>
                        <?php } elseif ($member->status == 2) { ?>
                        <a href="<?php echo $this->config->item('link_member_request_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Request Transfer</a>
                        <?php } elseif ($member->status == 3) { ?>
                        <a href="<?php echo $this->config->item('link_member_approve').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Approve</a>
                        <a href="<?php echo $this->config->item('link_member_invalid_transfer').'?id='.$member->id_member; ?>" type="button" class="btn btn-warning">Invalid Transfer</a>
                        <?php } elseif ($member->status == 4) { ?>
                        <a href="<?php echo $this->config->item('link_member_resend_approval').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Resend Approval</a>
                        <?php } elseif ($member->status == 5) { ?>
                        <a href="<?php echo $this->config->item('link_member_resend_invalid').'?id='.$member->id_member; ?>" type="button" class="btn btn-success">Resend Invalid</a>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12 marginbottom15">
                        <?php if ($member->status == 1) { 
						echo 'Ongkos Kirim: ' . number_format($kota->price, 0, ',', '.'); 
                        } elseif ($member->status == 2 || $member->status == 3 ||  $member->status == 4) { 
						echo 'Total Transfer: ' . number_format($member_transfer->total, 0, ',', '.'); 
						} ?>
                    </div>
                </div>
                <form action="<?php echo $this->config->item('link_member_edit'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?php echo $member->id_member; ?>">
                    <input type="hidden" name="selfemail" id="selfemail" value="<?php echo $member->email; ?>">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } 
                        
                        if ($member->status == 3) { ?>
							<div class="row">
								<div class="col-sm-12 marginbottom15">
									<div class="col-sm-12 fontbold paddinglr0">Bukti Transfer</div>
									<div class="col-sm-2">Tanggal:</div>
									<div class="col-sm-10"><?php echo date('d M Y', strtotime($member_transfer->date)); ?></div>
									<div class="col-sm-2">Pemilik Rekening:</div>
									<div class="col-sm-10"><?php echo ucwords($member_transfer->account_name); ?></div>
									<div class="col-sm-2">Catatan:</div>
									<div class="col-sm-10"><?php echo $member_transfer->other_information ? $member_transfer->other_information : 'None'; ?></div>
									<div class="col-sm-2">Bukti:</div>
									<div class="col-sm-12"><img src="<?php echo $member_transfer->photo; ?>" class="marginbottom15 img-responsive height250"></div>
								</div>
							</div>
						<?php } ?>
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
                                    <?php foreach ($code_id_card_type as $key => $val) { ?>
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
                                <label>ID Card Address</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height150" name="idcard_address" id="idcard_address"><?php echo set_value('idcard_address', $member->idcard_address); ?></textarea>
                                    <?php echo form_error('idcard_address', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Shipment Address</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height150" name="shipment_address" id="shipment_address"><?php echo set_value('shipment_address', $member->shipment_address); ?></textarea>
                                    <?php echo form_error('shipment_address', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Gender</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php foreach ($code_gender as $key => $val) { ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="gender" value="<?php echo $key; ?>" <?php if ($member->gender == $key) { echo 'checked="checked"'; } echo set_radio('gender', $key) .'>'. $val; ?>
                                        </label>
                                    <?php } ?>
                                </div>
                                <?php echo form_error('gender', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Shipment Postal Code</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code', $member->postal_code); ?>">
                                    <?php echo form_error('postal_code', '<div class="fontred">', '</div>'); ?>
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
                                <label>Kota</label><span class="fontred"> *</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="form-control" name="provinsi" id="provinsi">
                                            <option value="">-- Select Provinsi --</option>
                                            <?php foreach ($provinsi_lists as $key => $val) { ?>
                                                <option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php if ($kota->id_provinsi == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->provinsi); ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php echo form_error('provinsi', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-6 paddingleft0">
                                        <select class="form-control" name="kota" id="kota">
                                            <option value="">-- Select Kota --</option>
                                            <?php foreach ($kota_lists as $key => $val) { ?>
                                                <option value="<?php echo $val->id_kota; ?>" <?php if ($member->id_kota == $val->id_kota) { echo 'selected="selected"'; } echo set_select('kota', $val->id_kota); ?>><?php echo ucwords($val->kota).' - '.$member->kota->price; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php echo form_error('kota', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                </div>
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
                                        <input type="text" class="form-control form-filter" id="birth_date" name="birth_date" value="<?php echo set_value('birth_date', date('d M y', strtotime($member->birth_date))); ?>" />
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
                                    <?php foreach ($code_marital_status as $key => $val) { ?>
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
                                    <?php foreach ($code_religion as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($member->religion == $key) { echo 'selected="selected"'; } echo set_select('religion', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('religion', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Shirt Size</label><span class="fontred"> *</span>
                                <select class="form-control" name="shirt_size" id="shirt_size">
                                    <option value="">-- Select One --</option>
                                    <?php foreach ($code_shirt_size as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($member->shirt_size == $key) { echo 'selected="selected"'; } echo set_select('shirt_size', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('shirt_size', '<div class="fontred">', '</div>'); ?>
                            </div>
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
                                <div class="input-group col-sm-12">
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>">
                                    <span id="helpBlock" class="help-block">Biarkan kosong jika tidak ingin mengganti password.</span>
                                    <?php echo form_error('password', '<div class="fontred">', '</div>'); ?>
                                </div>
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
                                <label>Member Card</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="member_card" id="member_card" value="<?php echo set_value('member_card', $member->member_card); ?>">
                                    <?php echo form_error('member_card', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Close Up Photo</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <img src="<?php echo $member->photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
                                    <input type="file" class="form-control" name="photo" id="photo">
                                    <span id="helpBlock" class="help-block">Biarkan kosong jika tidak ingin mengganti foto diri.</span>
                                    <?php echo form_error('photo', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>ID Card Photo</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <img src="<?php echo $member->idcard_photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
                                    <input type="file" class="form-control" name="idcard_photo" id="idcard_photo">
                                    <span id="helpBlock" class="help-block">Biarkan kosong jika tidak ingin mengganti foto ID.</span>
                                    <?php echo form_error('idcard_photo', '<div class="fontred">', '</div>'); ?>
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
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var provinsi = $(this).find("option:selected").attr("id");
            var dataString = 'id_provinsi='+ provinsi;
            $.ajax({
                url: '<?php echo base_url()."dropdown_kota_lists"; ?>',
                type: "POST",
                data: dataString,
                beforeSend : function (){
                    $('#kota').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    $('#kota').html(data);
                }
            });
        });

        $('.date-picker').datepicker({
            orientation: "auto left",
            endDate: "-10y",
            format: "dd M yyyy"
        });

        $('#submit_member_edit').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>
