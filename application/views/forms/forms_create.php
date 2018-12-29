<div class="row" id="forms_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forms - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_forms_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="panel-group" id="accordion2">
                            <?php $this->load->view('forms/create/main'); ?>
                            <?php $this->load->view('forms/create/question'); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_forms_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
