<div class="row" id="secret_santa_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Secret Santa - Add Member</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_secret_santa_create'); ?>" method="post">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama yang ikut secret santa" name="name" id="name" value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_secret_santa_create">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit_secret_santa_create').click(function () {
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>
