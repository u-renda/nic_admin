<div class="row" id="post_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Post - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_post_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Title</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="#TogetherNEZ" name="title" id="title" value="<?php echo set_value('title'); ?>">
                                    <div class="fontred" id="errorbox_title"></div>
									<?php echo form_error('title', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Status</label><span class="fontred"> *</span>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Select One --</option>
                                    <?php
                                    foreach ($code_post_status as $key => $val)
                                    {
                                        echo '<option value="'.$key.'"'.set_select('status', $key).'>'.$val.'</option>';
                                    }
                                    ?>
                                </select>
								<div class="fontred" id="errorbox_status"></div>
                                <?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Type</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php
                                    foreach ($code_post_type as $key => $val)
                                    {
										echo '<div class="radio-inline radio-custom">';
										echo '<input type="radio" name="type" id="type_'.$key.'" value="'.$key.'" '.set_radio('type', $key); if ($key == 1) { echo 'checked'; } echo '/>';
										echo '<label for="type_'.$key.'">'.$val.'</label></div>';
                                    }
                                    ?>
                                </div>
                                <?php echo form_error('type', '<div class="fontred">', '</div>'); ?>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Event</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <?php
                                    foreach ($code_yes_no as $key => $val)
                                    {
										echo '<div class="radio-inline radio-custom">';
										echo '<input type="radio" name="is_event" id="is_event_'.$key.'" value="'.$key.'" '.set_radio('is_event', $key); if ($key == 1) { echo 'checked'; } echo '/>';
										echo '<label for="is_event_'.$key.'">'.$val.'</label></div>';
                                    }
                                    ?>
                                </div>
                                <?php echo form_error('is_event', '<div class="fontred">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Media</label>
                                <div class="input-group col-sm-12">
									<div class="radio-inline radio-custom">
										<input type="radio" name="media" class="media" id="media_image" value="image" <?php echo set_radio('media', 'image'); ?>>
										<label for="media_image">Image</label>
									</div>
									<div class="radio-inline radio-custom">
										<input type="radio" name="media" class="media" id="media_video" value="video" <?php echo set_radio('media', 'video'); ?>>
										<label for="media_video">Video</label>
									</div>
									<div class="radio-inline radio-custom">
										<input type="radio" name="media" class="media" id="media_none" value="none" <?php echo set_radio('media', 'none'); ?> checked>
										<label for="media_none">None</label>
									</div>
                                    <?php echo form_error('media', '<div class="fontred">', '</div>'); ?>
                                </div>
                                <div class="image_option margintop10">
									<div class="col-sm-12 paddingleft0" id="div_photo">
										<input name="image" id="photo" class="file" type="file">
									</div>
                                </div>
                                <div class="video_option margintop10">
                                    <input type="text" class="form-control" placeholder="http://" name="video" id="video" value="<?php echo set_value('video'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Created Date</label>
                                <div class="row">
                                    <div class="input-group col-sm-12 paddinglr15 date date-picker">
                                        <input type="text" class="form-control form-filter" id="created_date" name="created_date" value="<?php echo set_value('created_date'); ?>" />
                                        <span class="input-group-addon hand-pointer">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                    <span id="helpBlock" class="help-block paddinglr15">Leave empty for today date.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
                                <label>Content</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <textarea class="form-control height250 mceEditor" name="content" id="content"><?php echo set_value('content'); ?></textarea>
                                    <div class="fontred" id="errorbox_content"></div>
									<?php echo form_error('content', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_post_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
