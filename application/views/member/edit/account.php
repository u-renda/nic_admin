<div class="panel panel-accordion panel-accordion-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
                <i class="fa fa-user"></i> Account
            </a>
        </h4>
    </div>
    <div id="collapse2One" class="accordion-body collapse in">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Name</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name', ucwords($member->name)); ?>">
                        <div class="fontred" id="errorbox_name"></div>
                        <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Email</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email', $member->email); ?>">
                        <div class="fontred" id="errorbox_email"></div>
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
                    <div class="fontred" id="errorbox_idcard_type"></div>
                        <?php echo form_error('idcard_type', '<div class="fontred">', '</div>'); ?>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>ID Card Number</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="idcard_number" id="idcard_number" value="<?php echo set_value('idcard_number', $member->idcard_number); ?>">
                        <div class="fontred" id="errorbox_idcard_number"></div>
                        <?php echo form_error('idcard_number', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Phone Number</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo set_value('phone_number', $member->phone_number); ?>">
                        <div class="fontred" id="errorbox_phone_number"></div>
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
                            <div class="fontred" id="errorbox_birth_place"></div>
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
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Close Up Photo</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <img src="<?php echo $member->photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" id="checkboxPhoto" value="yes">
                            <label for="checkboxPhoto">Change photo</label>
                        </div>
                        <span id="change_photo">
                            <input type="file" class="file" name="image" id="photo">
                            <?php echo form_error('photo', '<div class="fontred">', '</div>'); ?>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>ID Card Photo</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <img src="<?php echo $member->idcard_photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" id="checkboxIDcard" value="yes">
                            <label for="checkboxIDcard">Change ID card photo</label>
                        </div>
                        <span id="change_idcard_photo">
                            <input type="file" class="file" name="image" id="idcard_photo">
                            <?php echo form_error('idcard_photo', '<div class="fontred">', '</div>'); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>ID Card Address</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control height150" name="idcard_address" id="idcard_address"><?php echo set_value('idcard_address', stripcslashes($member->idcard_address)); ?></textarea>
                        <div class="fontred" id="errorbox_idcard_address"></div>
                        <?php echo form_error('idcard_address', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>