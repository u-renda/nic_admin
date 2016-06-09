<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Name:</u></label>
            <div class="form-control-static paddingtop0"><?php echo ucwords($name); ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Email:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $email; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Username:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $username; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Member Card:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $member_card; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>ID Card Type:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $idcard_type; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>ID Card Number:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $idcard_number; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>ID Card Address:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $idcard_address; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Shipment Address:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $shipment_address; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Gender:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $gender; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Postal Code:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $postal_code; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Phone Number:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $phone_number; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Kota:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $kota; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Birth Place & Date:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $birth_place.', '.$birth_date; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Marital Status:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $marital_status; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Occupation:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $occupation; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Religion:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $religion; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Shirt Size:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $shirt_size; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Status:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $status; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Close Up Photo:</u></label>
            <img class="paddingtop0 fullwidth" src="<?php echo $photo; ?>" alt="<?php echo ucwords($name); ?>">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>ID Card Photo:</u></label>
            <img class="paddingtop0 fullwidth" src="<?php echo $idcard_photo; ?>" alt="<?php echo ucwords($name); ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 margintop15">
        <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
    </div>
</div>