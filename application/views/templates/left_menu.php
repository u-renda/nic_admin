<div class="col-sm-2 left-menu bg-white">
    <div class="left-logo"><img src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="<?php echo $this->config->item('title'); ?>" class="img-responsive"></div>
    <div class="left-name marginbottom15">Hi, <strong><?php echo ucwords($this->session->userdata('name')); ?></strong></div>
    <div class="left-name marginbottom15"><a href="<?php echo $this->config->item('link_logout'); ?>" class="fontblack a-default">Sign Out</a></div>
    <div class="navigation">
        <div class="panel-group" role="tablist">
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
                        <div class="panel-title">Home</div>
                    </div>
                </a>
                <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_dashboard'); ?>"><li class="list-group-item">Dashboard</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup10" aria-expanded="false" aria-controls="collapseListGroup10">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading10">
                        <h4 class="panel-title">Help</h4>
                    </div>
                </a>
                <div id="collapseListGroup10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading10">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_help_member_awaiting_review'); ?>"><li class="list-group-item">Member - Awaiting Review</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="false" aria-controls="collapseListGroup2">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
                        <h4 class="panel-title">Member</h4>
                    </div>
                </a>
                <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_member_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_member_lists'); ?>"><li class="list-group-item">Lists</li></a>
                        <a href="<?php echo $this->config->item('link_member_download'); ?>"><li class="list-group-item">Download</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="false" aria-controls="collapseListGroup3">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
                        <h4 class="panel-title">Post</h4>
                    </div>
                </a>
                <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_post_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_post_lists'); ?>"><li class="list-group-item">Lists</li></a>
                        <a href="<?php echo $this->config->item('link_event_create'); ?>"><li class="list-group-item">Event Add New</li></a>
                        <a href="<?php echo $this->config->item('link_event_lists'); ?>"><li class="list-group-item">Event Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup9" aria-expanded="false" aria-controls="collapseListGroup9">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading9">
                        <h4 class="panel-title">Product</h4>
                    </div>
                </a>
                <div id="collapseListGroup9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading9">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_product_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_product_lists'); ?>"><li class="list-group-item">Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup8" aria-expanded="false" aria-controls="collapseListGroup8">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading8">
                        <h4 class="panel-title">Order</h4>
                    </div>
                </a>
                <div id="collapseListGroup8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading8">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_order_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_order_lists'); ?>"><li class="list-group-item">Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup7" aria-expanded="false" aria-controls="collapseListGroup7">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading7">
                        <h4 class="panel-title">Image Gallery</h4>
                    </div>
                </a>
                <div id="collapseListGroup7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading7">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_image_album_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_image_album_lists'); ?>"><li class="list-group-item">Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup4" aria-expanded="false" aria-controls="collapseListGroup4">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading4">
                        <h4 class="panel-title">Admin</h4>
                    </div>
                </a>
                <div id="collapseListGroup4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading4">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_admin_create'); ?>"><li class="list-group-item">Add New</li></a>
                        <a href="<?php echo $this->config->item('link_admin_lists'); ?>"><li class="list-group-item">Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup11" aria-expanded="false" aria-controls="collapseListGroup11">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading11">
                        <h4 class="panel-title">Forms</h4>
                    </div>
                </a>
                <div id="collapseListGroup11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading11">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_forms_create'); ?>"><li class="list-group-item">Create</li></a>
                        <a href="<?php echo $this->config->item('link_forms_lists'); ?>"><li class="list-group-item">Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup5" aria-expanded="false" aria-controls="collapseListGroup5">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading5">
                        <h4 class="panel-title">Others</h4>
                    </div>
                </a>
                <div id="collapseListGroup5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading5">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_faq_lists'); ?>"><li class="list-group-item">FAQ Lists</li></a>
                        <a href="<?php echo $this->config->item('link_preferences_lists'); ?>"><li class="list-group-item">Preferences Lists</li></a>
                        <a href="<?php echo $this->config->item('link_provinsi_lists'); ?>"><li class="list-group-item">Provinsi Lists</li></a>
                        <a href="<?php echo $this->config->item('link_secret_santa_lists'); ?>"><li class="list-group-item">Secret Santa Lists</li></a>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup6" aria-expanded="false" aria-controls="collapseListGroup6">
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading6">
                        <h4 class="panel-title">API Debug</h4>
                    </div>
                </a>
                <div id="collapseListGroup6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading6">
                    <ul class="list-group">
                        <a href="<?php echo $this->config->item('link_api_admin'); ?>"><li class="list-group-item">Admin</li></a>
                        <a href="<?php echo $this->config->item('link_api_member'); ?>"><li class="list-group-item">Member</li></a>
                        <a href="<?php echo $this->config->item('link_api_post'); ?>"><li class="list-group-item">Post</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
