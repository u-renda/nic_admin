<div class="row" id="image_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Image - Lists</h3>
            </div>
            <div class="panel-body">
                <h4><?php echo ucwords($image_album->name); ?></h4>
                <div class="row">
                    <?php foreach($image as $row) { ?>
                    <div class="col-md-3">
                        <a href="">
                            <span class="thumb-info thumb-info-no-zoom">
                                <span class="thumb-info-wrapper">
                                    <img src="<?php echo $row->url; ?>" class="img-responsive">
                                    <span class="thumb-info-action">
                                        <span class="thumb-info-action-icon"><i class="fa fa-download"></i></span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>