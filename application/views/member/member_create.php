<div class="row" id="member_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_member_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
						<div class="panel-group" id="accordion2">
							<?php $this->load->view('member/create/account'); ?>
							<?php $this->load->view('member/create/shipment'); ?>
							<?php $this->load->view('member/create/membership'); ?>
						</div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>