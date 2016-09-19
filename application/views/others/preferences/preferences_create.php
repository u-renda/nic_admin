<div class="row" id="preferences_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Preferences - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_preferences_create'); ?>" method="post">
                    <div class="form-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6 marginbottom15">
                                    <label>Key</label><span class="fontred"> *</span>
                                    <div class="col-sm-12 paddinglr0">
                                        <input type="text" class="form-control" placeholder="email_send_approve" name="key" id="key" value="<?php echo set_value('key'); ?>">
                                        <?php echo form_error('key', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 marginbottom15">
                                    <label>Description</label>
                                    <div class="col-sm-12 paddinglr0">
                                        <textarea class="form-control height150" name="description" id="description"><?php echo set_value('description'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 marginbottom15">
                                    <label>Value</label><span class="fontred"> *</span>
                                    <div class="col-sm-12 paddinglr0">
                                        <textarea class="form-control height250 mceEditor" name="value" id="value"><?php echo set_value('value'); ?></textarea>
                                        <?php echo form_error('value', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_preferences_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>