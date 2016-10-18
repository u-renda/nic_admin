<div class="row" id="faq_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">F.A.Q. - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_faq_create'); ?>" method="post" enctype="multipart/form-data" id="the_form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12 marginbottom15">
								<label>Category</label><span class="fontred"> *</span>
								<div class="input-group col-sm-12">
									<?php
									foreach ($code_faq_category as $key => $val)
									{
										echo '<div class="radio-inline radio-custom">';
										echo '<input type="radio" name="category" id="category_'.$key.'" value="'.$key.'" '.set_radio('category', $key); if ($key == 1) { echo 'checked'; } echo '/>';
										echo '<label for="category_'.$key.'">'.$val.'</label></div>';
									}
									?>
								</div>
								<?php echo form_error('category', '<div class="fontred">', '</div>'); ?>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
								<label>Question</label><span class="fontred"> *</span>
								<div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150" name="question" id="question"><?php echo set_value('question'); ?></textarea>
									<div class="fontred" id="errorbox_question"></div>
									<?php echo form_error('question', '<div class="fontred">', '</div>'); ?>
								</div>
							</div>
                            <div class="col-sm-6 marginbottom15">
								<label>Answer</label><span class="fontred"> *</span>
								<div class="col-sm-12 paddinglr0">
									<textarea class="form-control height150" name="answer" id="answer"><?php echo set_value('answer'); ?></textarea>
									<div class="fontred" id="errorbox_answer"></div>
									<?php echo form_error('answer', '<div class="fontred">', '</div>'); ?>
								</div>
							</div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                            </button>
                        </div>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
