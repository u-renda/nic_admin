<div class="row" id="preferences_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Preferences - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_preferences_edit'); ?>" method="post">
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
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="key" id="key" value="<?php echo set_value('key', $preferences->key); ?>">
                                    <?php echo form_error('key', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Description</label>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="description" id="description" value="<?php echo set_value('description', $preferences->description); ?>">
                                    <?php echo form_error('description', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Type</label><span class="fontred"> *</span>
                                <select class="form-control" name="type" id="type">
                                    <option value="">-- Select One --</option>
                                    <?php foreach ($code_preferences_type as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($preferences->type == $key) { echo 'selected="selected"'; } echo set_select('type', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('type', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Value</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height250 mceEditor" name="value" id="value"><?php echo set_value('value', $preferences->value); ?></textarea>
                                    <?php echo form_error('value', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_preferences_edit">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
                        </button>
						<a href="<?php echo $this->config->item('link_email_template_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit_preferences_edit').click(function () {
            tinyMCE.triggerSave();
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });

        tinymce.init({
            mode: "specific_textareas",
            editor_selector: "mceEditor",
            forced_root_block: false,
            content_style: ".mce-content-body  {font-size: 14px; font-family: 'Open Sans', sans-serif;}",
            height: 250,
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks",
                "insertdatetime table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    });
</script>
