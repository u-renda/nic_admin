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
                            <label class="col-sm-2 control-label">Nama</label>
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
                            <label class="col-sm-2 control-label">Isi Email</label>
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