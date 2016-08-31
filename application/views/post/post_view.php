<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Title:</u></label>
            <div class="form-control-static paddingtop0"><?php echo ucwords($title); ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Slug:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $slug; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Type:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $type; ?></div>
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
            <label class="control-label marginbottom0"><u>Event:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $is_event; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Created Date:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $created_date; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Media:</u></label>
            <?php if ($media_type == 2) { ?>
            <img class="paddingtop0 paddingbottom10 fullwidth" src="<?php echo $media; ?>" alt="<?php echo ucwords($title); ?>">
            <?php } else { ?>
            <div class="form-control-static paddingtop0">-</div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Content:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $content; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 margintop15">
        <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
    </div>
</div>