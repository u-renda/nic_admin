<div class="panel panel-accordion panel-accordion-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
                <i class="fa fa-file"></i> Main Forms
            </a>
        </h4>
    </div>
    <div id="collapse2One" class="accordion-body collapse in">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Title</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo set_value('title',$result->title); ?>">
                        <div class="fontred" id="errorbox_title"></div>
						<?php echo form_error('title', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Status</label><span class="fontred"> *</span>
                    <select class="form-control" name="status" id="status">
                        <option value="">-- Select One --</option>
                        <?php
                        foreach ($code_forms_status as $key => $val)
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
                    <label>Description</label><span class="fontred"> *</span>
                    <div class="input-group col-sm-12">
                        <textarea class="form-control" name="description" id="description" rows="5"><?php echo set_value('description'); ?></textarea>
                        <div class="fontred" id="errorbox_description"></div>
						<?php echo form_error('description', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Main Photo</label>
                    <div class="margintop10">
						<div class="col-sm-12 paddingleft0" id="div_photo">
							<input name="image" id="photo" class="file" type="file">
						</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 marginbottom15">
                    <label>Detail</label><span class="fontred"> *</span>
                    <div class="input-group col-sm-12">
                        <textarea class="form-control height250 mceEditor" name="detail" id="detail"><?php echo set_value('detail'); ?></textarea>
                        <div class="fontred" id="errorbox_detail"></div>
						<?php echo form_error('detail', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>