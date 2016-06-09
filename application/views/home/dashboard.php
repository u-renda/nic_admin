<section role="main" class="content-body">
    <header class="page-header">
        <h2><?php echo $title; ?></h2>
    </header>
    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <div class="row">
                <?php $this->load->view('home/member_male'); ?>
                <?php $this->load->view('home/member_female'); ?>
                <?php $this->load->view('home/post_news'); ?>
                <?php $this->load->view('home/post_blog'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $this->load->view('home/member_status'); ?>
        <?php $this->load->view('home/member_chart'); ?>
    </div>
</section>
    

