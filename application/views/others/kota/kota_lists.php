<div class="row" id="kota_lists_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo ucwords($provinsi->provinsi).' - '; ?>Kota - Lists</h3>
            </div>
            <div class="panel-body">
				<div class="marginbottom15">
					<button type="button" class="btn btn-success" onclick="kota_create()" id="create_button" value="<?php echo $provinsi->id_provinsi; ?>"> Create New Kota </button>
					<a href="<?php echo $this->config->item('link_provinsi_lists'); ?>" type="button" class="btn btn-default">Back</a>
					<div class="fontred margintop10"><em>* Search for: kota name</em></div>
				</div>
                <div id="grid_kota" data-provinsi="<?php echo $provinsi->id_provinsi; ?>"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>