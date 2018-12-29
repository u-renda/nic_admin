<div class="row" id="forms_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Forms - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_forms_edit').'?id='.$result->id_forms; ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="panel-group" id="accordion2">
                            <?php $this->load->view('forms/edit/main'); ?>
                            <?php $this->load->view('forms/edit/question'); ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_forms_edit">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>