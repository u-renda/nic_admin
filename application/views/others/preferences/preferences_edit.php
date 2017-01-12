<div class="row" id="preferences_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Preferences - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_preferences_edit').'?id='.$preferences->id_preferences; ?>" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $preferences->id_preferences; ?>">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Key</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" name="key" id="key" value="<?php echo set_value('key', $preferences->key); ?>">
                                    <?php echo form_error('key', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Description</label>
                                <div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150" name="description" id="description"><?php echo set_value('description', $preferences->description); ?></textarea>
                                    <?php echo form_error('description', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Value</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height250 mceEditor" name="value" id="value"><?php echo set_value('value', stripcslashes($preferences->value)); ?></textarea>
                                    <?php echo form_error('value', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_preferences_edit">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
                        </button>
						<a href="<?php echo $this->config->item('link_preferences_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
