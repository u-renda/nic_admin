<div class="col-xl-3 col-lg-2">
    <section class="panel panel-transparent">
        <header class="panel-heading">
            <h2 class="panel-title">Member Status</h2>
        </header>
        <div class="panel-body">
            <section class="panel">
                <div class="panel-body">
                    <div class="h4 text-weight-bold mb-none"><?php echo $awaiting_review; ?></div>
                    <a href="<?php echo $this->config->item('link_member_lists').'?status=1'; ?>"><span class="label label-warning mb-none">Awaiting Review</span></a>
                </div>
            </section>
            <section class="panel">
                <div class="panel-body">
                    <div class="h4 text-weight-bold mb-none"><?php echo $awaiting_approved; ?></div>
                    <a href="<?php echo $this->config->item('link_member_lists').'?status=3'; ?>"><span class="label label-primary mb-none">Awaiting Approval</span></a>
                </div>
            </section>
            <section class="panel">
                <div class="panel-body">
                    <div class="h4 text-weight-bold mb-none"><?php echo $approved; ?></div>
                    <a href="<?php echo $this->config->item('link_member_lists').'?status=4'; ?>"><span class="label label-success mb-none">Approved</span></a>
                </div>
            </section>
        </div>
    </section>
</div>