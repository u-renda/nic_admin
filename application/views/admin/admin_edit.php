<div class="row" id="admin_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin - Edit</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_admin_edit').'?id='.$admin->id_admin; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?php echo $admin->id_admin; ?>">
                    <input type="hidden" name="selfemail" id="selfemail" value="<?php echo $admin->email; ?>">
                    <input type="hidden" name="selfinitial" id="selfinitial" value="<?php echo $admin->admin_initial; ?>">
                    <div class="form-body">
                        <?php if (isset($error)) {
                            foreach ($error as $key => $val) {
                                echo '<div class="fontred">'.$key.' = '.$val.'</div>';
                            }
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Name</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name', ucwords($admin->name)); ?>">
                                    <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Email</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email', $admin->email); ?>">
                                    <?php echo form_error('email', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Username</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username', $admin->username); ?>">
                                    <?php echo form_error('username', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Password</label>
                                <div class="input-group col-sm-12">
                                    <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>">
                                    <span id="helpBlock" class="help-block">Leave empty if not change.</span>
                                    <?php echo form_error('password', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Initial</label><span class="fontred"> *</span>
                                <div class="input-group col-sm-12">
                                    <input type="text" class="form-control" name="initial" id="initial" value="<?php echo set_value('initial', $admin->admin_initial); ?>">
                                    <?php echo form_error('initial', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_admin_edit">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
                            </button>
                            <a href="<?php echo $this->config->item('link_admin_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>