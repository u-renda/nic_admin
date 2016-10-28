<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Name:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $name; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Quantity:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $quantity; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Price Public:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $price_public; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Price Member:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $price_member; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Status:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $status; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Description:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $description; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Size:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $size; ?></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Color:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $colors; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Material:</u></label>
            <div class="form-control-static paddingtop0"><?php echo $material; ?></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"><u>Image:</u></label>
            <img class="paddingtop0 paddingbottom10 fullwidth" src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
        </div>
    </div>
    <?php foreach ($other_image as $row) { ?>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label marginbottom0"></label>
            <img class="paddingtop0 paddingbottom10 fullwidth" src="<?php echo $row->image; ?>" alt="<?php echo $name; ?>">
        </div>
    </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-sm-12 margintop15">
        <button type="button" class="btn pull-right" data-dismiss="modal">Close</button>
    </div>
</div>