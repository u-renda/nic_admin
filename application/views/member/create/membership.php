<div class="panel panel-accordion panel-accordion-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
                <i class="fa fa-credit-card"></i> Membership
            </a>
        </h4>
    </div>
    <div id="collapse2Three" class="accordion-body collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Shirt Size</label><span class="fontred"> *</span>
                    <select class="form-control" name="shirt_size" id="shirt_size">
                        <option value="">-- Select One --</option>
                        <?php
                        foreach ($code_member_shirt_size as $key => $val)
                        {
                            echo '<option value="'.$key.'"'.set_select('shirt_size', $key).'>'.$val.'</option>';
                        }
                        ?>
                    </select>
                    <div class="fontred" id="errorbox_shirt_size"></div>
                    <?php echo form_error('shirt_size', '<div class="fontred">', '</div>'); ?>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Status</label><span class="fontred"> *</span>
                    <p class="form-control-static text-success">Approved</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Notes</label>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control height150" name="notes" id="notes"><?php echo set_value('notes'); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>