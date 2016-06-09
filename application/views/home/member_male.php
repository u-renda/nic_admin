<div class="col-md-12 col-lg-6 col-xl-6">
    <section class="panel panel-featured-left panel-featured-primary">
        <div class="panel-body">
            <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                    <div class="summary-icon bg-primary">
                        <i class="fa fa-male"></i>
                    </div>
                </div>
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title">Male</h4>
                        <div class="info">
                            <strong class="amount"><?php echo $male; ?></strong>
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a class="text-muted text-uppercase" href="<?php echo $this->config->item('link_member_lists').'?gender=0&status=4'; ?>">view all</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>