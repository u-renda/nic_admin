<div class="row" id="image_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Image - Lists</h3>
            </div>
            <div class="panel-body media-gallery">
                <div class="marginbottom15">
					<a href="<?php echo $this->config->item('link_image_album_lists'); ?>" type="button" class="btn btn-default">Back</a>
				</div>
                <h4><?php echo ucwords($image_album->name); ?></h4>
                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <?php if ($image != '') {
                    foreach($image as $row) { ?>
                    <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo $row->url; ?>">
                                    <img src="<?php echo $row->url_thumb; ?>" class="img-responsive" alt="Image">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-group pull-right">
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="<?php echo $this->config->item('link_image_download'); ?>"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a title="Delete" id="<?php echo $row->id_image; ?>" class="delete" href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>