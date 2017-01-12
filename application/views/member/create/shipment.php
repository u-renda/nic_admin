<div class="panel panel-accordion panel-accordion-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
                <i class="fa fa-shopping-cart"></i> Shipment
            </a>
        </h4>
    </div>
    <div id="collapse2Two" class="accordion-body collapse">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Shipment Address</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <textarea class="form-control height150" name="shipment_address" id="shipment_address"><?php echo set_value('shipment_address'); ?></textarea>
                        <div class="fontred" id="errorbox_shipment_address"></div>
                        <?php echo form_error('shipment_address', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Provinsi & Kota</label><span class="fontred"> *</span>
                    <div class="row">
                        <div class="col-sm-12">
                            <select class="form-control" name="id_provinsi" id="id_provinsi">
                                <option value="">-- Select Provinsi --</option>
                                <?php
                                foreach ($provinsi_lists as $key => $val)
                                {
                                    echo '<option id="'.$val->id_provinsi.'" value="'.$val->id_provinsi.'"'.set_select('id_provinsi', $val->id_provinsi).'>'.ucwords($val->provinsi).'</option>';
                                }
                                ?>
                            </select>
                            <div class="fontred" id="errorbox_id_provinsi"></div>
                            <?php echo form_error('id_provinsi', '<div class="fontred">', '</div>'); ?>
                        </div>
                        <div class="col-sm-12 margintop10">
                            <div id="id_kota"></div>
                            <div class="fontred" id="errorbox_id_kota"></div>
                            <?php echo form_error('id_kota', '<div class="fontred">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Shipment Postal Code</label><span class="fontred"> *</span>
                    <div class="col-sm-12 paddinglr0">
                        <input type="text" class="form-control" placeholder="15413" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code'); ?>">
                        <div class="fontred" id="errorbox_postal_code"></div>
                        <?php echo form_error('postal_code', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>