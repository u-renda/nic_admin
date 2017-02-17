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
                        <textarea class="form-control height150" name="shipment_address" id="shipment_address"><?php echo set_value('shipment_address', stripcslashes($member->shipment_address)); ?></textarea>
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
                                <?php foreach ($provinsi_lists as $key => $val) { ?>
                                    <option id="<?php echo $val->id_provinsi; ?>" value="<?php echo $val->id_provinsi; ?>" <?php if ($kota->provinsi->id_provinsi == $val->id_provinsi) { echo 'selected="selected"'; } echo set_select('provinsi', $val->id_provinsi); ?>><?php echo ucwords($val->provinsi); ?></option>
                                <?php } ?>
                            </select>
                            <div class="fontred" id="errorbox_id_provinsi"></div>
                            <?php echo form_error('id_provinsi', '<div class="fontred">', '</div>'); ?>
                        </div>
                        <div class="col-sm-12 margintop10">
                            <select class="form-control" name="id_kota" id="id_kota">
                                <option value="">-- Select Kota --</option>
                                <?php foreach ($kota_lists as $key => $val) { ?>
                                    <option value="<?php echo $val->id_kota; ?>" <?php if ($member->kota->id_kota == $val->id_kota) { echo 'selected="selected"'; } echo set_select('kota', $val->id_kota); ?>><?php echo ucwords($val->kota).' - '.$member->kota->price; ?></option>
                                <?php } ?>
                            </select>
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
                        <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo set_value('postal_code', $member->postal_code); ?>">
                        <div class="fontred" id="errorbox_postal_code"></div>
                        <?php echo form_error('postal_code', '<div class="fontred">', '</div>'); ?>
                    </div>
                </div>
            </div>
            <?php if ($member->status == 3 || $member->status == 4) { ?>
            <hr><h3>Transfer Info</h3>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Jumlah Transfer</label>
                    <p class="form-control-static"><?php echo 'Rp '.$member_transfer->total; ?></p>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>No Resi Pengiriman</label>
                    <input type="text" class="form-control" name="resi2" id="resi2" value="<?php echo set_value('resi2', strtoupper($member_transfer->resi)); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Bukti Transfer</label>
                    <div class="input-group col-sm-12">
                        <img src="<?php echo $member_transfer->photo; ?>" alt="<?php echo ucwords($member->name); ?>" title="<?php echo ucwords($member->name); ?>" class="marginbottom15 img-responsive height250">
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" id="checkboxPhotoTransfer" value="yes">
                            <label for="checkboxPhotoTransfer">Change transfer photo</label>
                        </div>
                        <span id="change_transfer_photo">
                            <input type="file" class="file" name="image" id="transfer_photo2">
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Other Information</label>
                    <div class="input-group col-sm-12">
                        <textarea class="form-control height150" name="other_information2" id="other_information2"><?php echo set_value('other_information2', stripcslashes($member_transfer->other_information)); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 marginbottom15">
                    <label>Tanggal Transfer</label>
                    <div class="input-group paddingright15 date date-picker">
                        <input type="text" class="form-control form-filter" id="transfer_date2" name="transfer_date2" value="<?php echo set_value('transfer_date2', date('d M Y', strtotime($member_transfer->date))); ?>" />
                        <span class="input-group-addon hand-pointer">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 marginbottom15">
                    <label>Nama Pemilik Rekening</label>
                    <input type="text" class="form-control" name="account_name2" id="account_name2" value="<?php echo set_value('account_name2', ucwords($member_transfer->account_name)); ?>">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>