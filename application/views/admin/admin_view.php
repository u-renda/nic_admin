<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Name:</u></label>
            <div class="form-control-static paddingtop0"><?php echo ucwords($name); ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Initial:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $admin_initial; ?></div>
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
            <label class="control-label marginbottom0"><u>Email:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $email; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Position:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $position; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Twitter:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $twitter; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Admin Role:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $admin_role; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Admin Group:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $admin_group; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Photo:</u></label>
            <img class="paddingtop0 paddingbottom10 fullwidth" src="<?php echo $photo; ?>" alt="<?php echo ucwords($name); ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 margintop15">
        <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
    </div>
</div>