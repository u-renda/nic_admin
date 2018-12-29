<div class="panel panel-accordion panel-accordion-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
                <i class="fa fa-question-mark"></i> Questions
            </a>
        </h4>
    </div>
    <div id="collapse2Three" class="accordion-body collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Question</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" placeholder="Nama" name="question" id="question" value="<?php echo set_value('question'); ?>">
                        <div class="fontred" id="errorbox_question"></div>
						<?php echo form_error('question', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Required</label><span class="fontred"> *</span>
                    <div class="input-group col-sm-12">
                        <?php
                        foreach ($code_yes_no as $key => $val)
                        {
    						echo '<div class="radio-inline radio-custom">';
    						echo '<input type="radio" name="is_required" id="is_required_'.$key.'" value="'.$key.'" '.set_radio('is_required', $key); if ($key == 1) { echo 'checked'; } echo '/>';
    						echo '<label for="is_required_'.$key.'">'.$val.'</label></div>';
                        }
                        ?>
                    </div>
                    <?php echo form_error('is_required', '<div class="fontred">', '</div>'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Description</label>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control" name="description" id="description"><?php echo set_value('notes'); ?></textarea>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Answer Type</label><span class="fontred"> *</span>
                    <div class="input-group col-sm-12">
                        <?php
                        foreach ($code_answer_type as $key => $val)
                        {
    						echo '<div class="radio-inline radio-custom">';
    						echo '<input type="radio" name="answer_type" class="answer_type" id="answer_type_'.$key.'" value="'.$key.'" '.set_radio('answer_type', $key); if ($key == 1) { echo 'checked'; } echo '/>';
    						echo '<label for="answer_type_'.$key.'">'.$val.'</label></div>';
                        }
                        ?>
                    </div>
                    <?php echo form_error('answer_type', '<div class="fontred">', '</div>'); ?>
                    <div class="answer_option margintop10">
						<div class="col-sm-12 paddingleft0" id="div_answer">
							<?php for($i=1;$i<=5;$i++){
							    echo '<input type="text" class="form-control" name="answer" id="answer_'.$i.'">';
							} ?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>