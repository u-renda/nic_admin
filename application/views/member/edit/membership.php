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
                    <label>Password</label>
                    <div class="checkbox-custom checkbox-default">
                        <input type="checkbox" name="checkboxPassword" id="checkboxPassword" value="yes">
                        <label for="checkboxPassword">Change password</label>
                    </div>
                    <span id="change_password">
                        <div class="col-sm-12 paddinglr0">
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>">
                            <?php echo form_error('password', '<div class="fontred">', '</div>'); ?>
                        </div>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Member Number</label>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="member_number" id="member_number" value="<?php echo set_value('member_number', $member->member_number); ?>">
                        <?php echo form_error('member_number', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Member Card Number</label>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="member_card" id="member_card" value="<?php echo set_value('member_card', $member->member_card); ?>">
                        <?php echo form_error('member_card', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Shirt Size</label><span class="fontred"> *</span>
                    <select class="form-control" name="shirt_size" id="shirt_size">
                        <option value="">-- Select One --</option>
                        <?php foreach ($code_member_shirt_size as $key => $val) { ?>
                            <option value="<?php echo $key; ?>" <?php if ($member->shirt_size == $key) { echo 'selected="selected"'; } echo set_select('shirt_size', $key); ?>><?php echo $val; ?></option>
                        <?php } ?>
                    </select>
                    <div class="fontred" id="errorbox_shirt_size"></div>
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
                    <div class="fontred" id="errorbox_status"></div>
                    <?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Notes</label>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control height150" name="notes" id="notes"><?php echo set_value('notes', stripcslashes($member->notes)); ?></textarea>
                    </div>
                </div>
            </div>
            <div id="change_status">
                <hr><h3>Transfer Info</h3>
                <h5 class="fontred">* Please fill form below</h5>
                <div class="row">
                    <div class="col-sm-6 marginbottom15">
                        <label>Jumlah Transfer</label>
                        <p class="form-control-static"><?php echo 'Rp '.$member_transfer->total; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 marginbottom15">
                        <label>Tanggal Transfer</label><span class="fontred">*</span>
                        <div class="input-group date date-picker">
                            <input type="text" class="form-control form-filter" id="transfer_date" name="transfer_date" value="<?php echo set_value('transfer_date'); ?>" />
                            <span class="input-group-addon hand-pointer">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 marginbottom15">
                        <label>Nama Pemilik Rekening</label><span class="fontred">*</span>
                        <input type="text" class="form-control" name="account_name" id="account_name" value="<?php echo set_value('account_name'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 marginbottom15">
                        <label>Bukti Transfer</label><span class="fontred">*</span>
                        <div class="col-sm-12 paddinglr0">
                            <input type="file" class="form-control" name="transfer_photo" id="transfer_photo">
                        </div>
                    </div>
                    <div class="col-sm-6 marginbottom15">
                        <label>Other Information</label>
                        <div class="col-sm-12 paddinglr0">
                            <textarea class="form-control height150" name="other_information" id="other_information"><?php echo set_value('other_information'); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>