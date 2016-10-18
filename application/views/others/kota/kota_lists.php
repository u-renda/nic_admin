<div class="row" id="kota_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo ucwords($provinsi->provinsi).' - '; ?>Kota - Lists</h3>
            </div>
            <div class="panel-body">
				<div class="marginbottom15">
					<a href="<?php echo $this->config->item('link_kota_create'); ?>" type="button" class="btn btn-success">Create New Kota</a>
					<a href="<?php echo $this->config->item('link_provinsi_lists'); ?>" type="button" class="btn btn-default">Back</a>
					<div class="fontred margintop10"><em>* Search for: kota name</em></div>
				</div>
                <div id="grid_kota" data-provinsi="<?php echo $provinsi->id_provinsi; ?>"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>