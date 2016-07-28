<div class="row" id="member_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Edit</h3>
            </div>
            <div class="panel-body">
				<form action="<?php echo $this->config->item('link_member_edit').'?id='.$member->id_member; ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" id="id" value="<?php echo $member->id_member; ?>">
					<input type="hidden" name="selfemail" id="selfemail" value="<?php echo $member->email; ?>">
					<div class="form-body">
						<div class="row">
							<div class="col-sm-12 marginbottom15">
								<?php
								if ($member->status == 1) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Request Transfer</a>';
									echo '<a href="'.$this->config->item('link_member_invalid').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-warning">Invalid Data</a>';
								} elseif ($member->status == 2) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Re-request Transfer</a>';
								} elseif ($member->status == 3) {
									echo '<a href="'.$this->config->item('link_member_approved').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Approved</a>';
									echo '<a href="'.$this->config->item('link_member_invalid_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-warning">Invalid Transfer</a>';
								} elseif ($member->status == 4) {
									echo '<a href="'.$this->config->item('link_member_approved').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success">Re-approved</a>';
								} ?>
							</div>
						</div>
						<div class="panel-group" id="accordion2">
							<?php
							$this->load->view('member/edit/account');
							$this->load->view('member/edit/shipment');
							$this->load->view('member/edit/membership');
							?>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" name="submit" value="Submit" class="btn blue" id="submit_member_edit">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save Changes
						</button>
						<a href="<?php echo $this->config->item('link_member_lists'); ?>" type="button" class="btn btn-danger">Cancel</a>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>