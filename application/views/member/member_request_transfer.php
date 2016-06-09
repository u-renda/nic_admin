<div class="row" id="member_request_transfer_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Request Transfer</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_member_request_transfer'); ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="id" id="id" value="<?php echo $member->id_member; ?>">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo ucwords($member->name); ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <p class="form-control-static"><?php echo $member->email; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control height250 mceEditor" name="email_content" id="email_content"><?php echo set_value('email_content', $email_content); ?></textarea>
                                <?php echo form_error('email_content', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_request_transfer">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Send Email
                        </button>
                        <button onclick="goBack()" class="btn btn-danger">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit_member_request_transfer').click(function () {
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

    function goBack() {
        window.history.back();
    }
</script>