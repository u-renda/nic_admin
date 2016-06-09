<div class="row" id="post_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_post_edit'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?php echo $post->id_post; ?>">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Title</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo set_value('title', ucwords($post->title)); ?>">
                                    <?php echo form_error('title', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Status</label><span class="fontred"> *</span>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Select One --</option>
                                    <?php foreach ($code_post_status as $key => $val) { ?>
                                        <option value="<?php echo $key; ?>" <?php if ($post->status == $key) { echo 'selected="selected"'; } echo set_select('status', $key); ?>><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Type</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php foreach ($code_post_type as $key => $val) { ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="type" id="type" value="<?php echo $key; ?>" <?php if ($post->type == $key) { echo 'checked="checked"'; } echo set_radio('type', $key) .'>'. $val; ?>
                                        </label>
                                    <?php } ?>
                                </div>
                                <?php echo form_error('type', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Event</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php foreach ($code_yes_no as $key => $val) { ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_event" id="is_event" value="<?php echo $key; ?>" <?php if ($post->is_event == $key) { echo 'checked="checked"'; } echo set_radio('is_event', $key) .'>'. $val; ?>
                                        </label>
                                    <?php } ?>
                                </div>
                                <?php echo form_error('is_event', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Media</label>
                                <div class="input-group col-sm-12">
                                    <?php if ($post->media_type == 2) { ?>
                                    <img src="<?php echo $post->media; ?>" alt="<?php echo ucwords($post->title); ?>" title="<?php echo ucwords($post->title); ?>" class="marginbottom15 img-responsive height250">
                                    <?php } elseif ($post->media_type == 1 && $post->media != '') { ?>
                                    <iframe width="420" height="315" src="<?php echo 'https://www.youtube.com/embed/'.$post->video; ?>"></iframe>
                                    <?php } else { echo "<strong>No Media</strong>"; } ?>
                                </div>
                                <label>Change Media</label>
                                <div>
                                    <input type="checkbox" name="change_media" class="change_media" id="change_media" value="false" /> YES
                                </div>
                                <div class="media_yes">
                                    <input type="radio" name="media" class="media" id="media" value="image" <?php echo set_radio('media', 'image'); ?>> Image
                                    <input type="radio" name="media" class="media" id="media" value="video" <?php echo set_radio('media', 'video'); ?>> Video
                                    <input type="radio" name="media" class="media" id="media" value="no_media" <?php echo set_radio('no_media', 'video'); ?>> No Media
                                </div>
                                <div class="image_option margintop10">
                                    <div class="input-group col-sm-12">
                                        <input type="file" class="form-control" name="photo" id="photo">
                                        <?php echo form_error('photo', '<div class="fontred">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="video_option margintop10">
                                    <input type="text" class="form-control" name="video" id="video" value="<?php echo set_value('video'); ?>">
                                    <?php echo form_error('video', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Created Date</label>
                                <div class="row">
                                    <div class="input-group col-sm-12 paddinglr15 date date-picker">
                                        <input type="text" class="form-control form-filter" id="created_date" name="created_date" value="<?php echo set_value('created_date', date('d M Y', strtotime($post->created_date))); ?>" />
                                        <span class="input-group-addon hand-pointer">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                    <?php echo form_error('created_date', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Content</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height250 mceEditor" name="content" id="content"><?php echo set_value('content', $post->content); ?></textarea>
                                    <?php echo form_error('content', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_post_edit">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
                            </button>
                            <a href="<?php echo $this->config->item('link_post_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy"
        });

        $(".image_option").hide();
        $(".video_option").hide();
        $(".media_yes").hide();
        $('.media').change(function() {
            if (this.value == 'image') {
                $(".image_option").show();
                $(".video_option").hide();
            }
            else if (this.value == 'video') {
                $(".video_option").show();
                $(".image_option").hide();
            }
            else
            {
                $(".image_option").hide();
                $(".video_option").hide();
            }
        });

        $('.change_media').change(function() {
            if($('.change_media').is(":checked")) {
                $(this).attr("value", "true");
                $(this).attr("checked", "checked");
                $(".media_yes").show();
            }
            else
            {
                $(this).attr("value", "false");
                $(this).removeAttr("checked");
                $(".media_yes").hide();
                $(".image_option").hide();
                $(".video_option").hide();
            }
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

        $('#submit_post_edit').click(function () {
            tinyMCE.triggerSave();
            $(this).html('<i class="fa fa-spinner fa-spin font26"></i>');
        });
    });
</script>
