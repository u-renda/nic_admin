<div class="col-md-12 col-lg-6 col-xl-6">
    <section class="panel panel-featured-left panel-featured-secondary">
        <div class="panel-body">
            <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                    <div class="summary-icon bg-secondary">
                        <i class="fa fa-female"></i>
                    </div>
                </div>
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title">Female</h4>
                        <div class="info">
                            <strong class="amount"><?php echo $female; ?></strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a class="text-muted text-uppercase" href="<?php echo $this->config->item('link_member_lists').'?gender=1&status=4'; ?>">view all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>