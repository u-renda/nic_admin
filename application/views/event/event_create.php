<div class="row" id="event_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Event - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_event_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
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
								<div class="input-group col-sm-12">
									<?php
									foreach ($code_event_status as $key => $val)
									{
										echo '<div class="radio-inline radio-custom">';
										echo '<input type="radio" name="status" id="status_'.$key.'" value="'.$key.'" '.set_radio('status', $key); if ($key == 1) { echo 'checked'; } echo '/>';
										echo '<label for="status_'.$key.'">'.$val.'</label></div>';
									}
									?>
								</div>
								<?php echo form_error('status', '<div class="fontred">', '</div>'); ?>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Date</label><span class="fontred"> *</span>
                                <div class="row">
                                    <div class="input-group col-sm-12 paddinglr15 date date-picker">
                                        <input type="text" class="form-control form-filter" id="date" name="date" value="<?php echo set_value('date'); ?>" />
										<span class="input-group-addon hand-pointer">
                                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                </div>
								<div class="fontred" id="errorbox_date"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_event_create">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
