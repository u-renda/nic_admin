<div class="row" id="admin_create_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin - Add New</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $this->config->item('link_admin_create'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <?php if (isset($error)) {
							if (is_object($error)) {
								foreach ($error as $key => $val) {
									echo '<div class="fontred">'.$key.' = '.$val.'</div>';
								}
							} else {
								echo '<div class="fontred">'.$error.'</div>';
							}
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Name</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="Agnez Mo" name="name" id="name" value="<?php echo set_value('name'); ?>">
                                    <?php echo form_error('name', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Email</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="admin@nezindaclub.com" name="email" id="email" value="<?php echo set_value('email'); ?>">
                                    <?php echo form_error('email', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Username</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="nezindaclub" name="username" id="username" value="<?php echo set_value('username'); ?>">
                                    <?php echo form_error('username', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 marginbottom15">
                                <label>Password</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="password" class="form-control" placeholder="******" name="password" id="password" value="<?php echo set_value('password'); ?>">
                                    <?php echo form_error('password', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 marginbottom15">
                                <label>Initial</label><span class="fontred"> *</span>
                                <div class="col-sm-12 paddinglr0">
                                    <input type="text" class="form-control" placeholder="N" name="initial" id="initial" value="<?php echo set_value('initial'); ?>">
                                    <?php echo form_error('initial', '<div class="fontred">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" name="submit" value="Submit" class="btn blue" id="submit_admin_create">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Create New
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
