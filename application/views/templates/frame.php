<?php $this->load->view('templates/header'); ?>
<div class="row">
    <?php $this->load->view('templates/left_menu'); ?>
    <div class="col-sm-10 main-content">
        <div class="margintb15">
            <?php $this->load->view($view_content); ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php $this->load->view('templates/footer'); ?>