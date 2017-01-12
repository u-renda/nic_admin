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
                        <input type="text" class="form-control" placeholder="Agnez Mo" name="name" id="name" value="<?php echo set_value('name'); ?>">
                        <div class="fontred" id="errorbox_name"></div>
                        <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Email</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" placeholder="admin@nezindaclub.com" name="email" id="email" value="<?php echo set_value('email'); ?>">
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
                        <?php
                        foreach ($code_member_idcard_type as $key => $val)
                        {
                            echo '<option value="'.$key.'"'.set_select('idcard_type', $key).'>'.$val.'</option>';
                        }
                        ?>
                    </select>
                    <div class="fontred" id="errorbox_idcard_type"></div>
                    <?php echo form_error('idcard_type', '<div class="fontred">', '</div>'); ?>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>ID Card Number</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" placeholder="1234567890" name="idcard_number" id="idcard_number" value="<?php echo set_value('idcard_number'); ?>">
                        <div class="fontred" id="errorbox_idcard_number"></div>
                        <?php echo form_error('idcard_number', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Phone Number</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" placeholder="08121234567890" name="phone_number" id="phone_number" value="<?php echo set_value('phone_number'); ?>">
                        <div class="fontred" id="errorbox_phone_number"></div>
                        <?php echo form_error('phone_number', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Gender</label><span class="fontred"> *</span>
                    <div class="input-group col-sm-12">
                        <?php
                        foreach ($code_member_gender as $key => $val)
                        {
                            echo '<div class="radio-inline radio-custom">';
                            echo '<input type="radio" name="gender" id="gender_'.$key.'" value="'.$key.'" '.set_radio('gender', $key); if ($key == 1) { echo 'checked'; } echo '/>';
                            echo '<label for="gender_'.$key.'">'.$val.'</label></div>';
                        }
                        ?>
                    </div>
                    <?php echo form_error('gender', '<div class="fontred">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Birth Place & Date</label><span class="fontred"> *</span>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Jakarta" name="birth_place" id="birth_place" value="<?php echo set_value('birth_place'); ?>">
                            <div class="fontred" id="errorbox_birth_place"></div>
                            <?php echo form_error('birth_place', '<div class="fontred">', '</div>'); ?>
                        </div>
                        <div class="input-group col-sm-6 paddingright15 date date-picker">
                            <input type="text" readonly="readonly" class="form-control form-filter" id="birth_date" name="birth_date" value="<?php echo set_value('birth_date'); ?>" />
                            <span class="input-group-addon hand-pointer">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            </span>
                        </div>
                        <div class="fontred" id="errorbox_birth_date"></div>
                        <?php echo form_error('birth_date', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15" id="div_idcard">
                    <label class="control-label">Upload ID Card Foto <span class="required">*</span></label>
                    <input name="image" id="idcard_photo" class="file" type="file">
                </div>
                <div class="col-sm-6 marginbottom15" id="div_photo">
                    <label class="control-label">Upload Foto Diri <span class="required">*</span></label>
                    <input name="image" id="photo" class="file" type="file">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>ID Card Address</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control height150" name="idcard_address" id="idcard_address"><?php echo set_value('idcard_address'); ?></textarea>
                        <div class="fontred" id="errorbox_idcard_address"></div>
                        <?php echo form_error('idcard_address', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>