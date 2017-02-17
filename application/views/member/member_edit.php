<div class="row" id="member_edit_page">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Member - Edit</h3>
            </div>
            <div class="panel-body">
				<form action="<?php echo $this->config->item('link_member_edit').'?id='.$id; ?>" method="post" enctype="multipart/form-data" id="the_form">
					<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
					<input type="hidden" name="selfemail" id="selfemail" value="<?php echo $member->email; ?>">
					<input type="hidden" name="selfname" id="selfname" value="<?php echo $member->name; ?>">
					<input type="hidden" name="selfidcard_number" id="selfidcard_number" value="<?php echo $member->idcard_number; ?>">
					<input type="hidden" name="selfphone_number" id="selfphone_number" value="<?php echo $member->phone_number; ?>">
					<?php
					if ($member->photo == '')
					{
						echo '<input type="hidden" name="photo" id="default_photo" value="'.base_url('assets/images').'/user_default_big.png">';
					}
					else
					{
						echo '<input type="hidden" name="photo" id="default_photo" value="'.$member->photo.'">';
					}
					if ($member->idcard_photo == '')
					{
						echo '<input type="hidden" name="idcard_photo" id="default_idcard_photo" value="'.base_url('assets/images').'/user_default_big.png">';
					}
					else
					{
						echo '<input type="hidden" name="idcard_photo" id="default_idcard_photo" value="'.$member->idcard_photo.'">';
					}
					?>
					
					<div class="form-body">
						<div class="row">
							<div class="col-sm-12 marginbottom15">
								<?php
								if ($member->status == 1) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-envelope"></i> Request Transfer</a>';
									echo '<a href="'.$this->config->item('link_member_invalid').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-envelope"></i> Invalid Data</a>';
								} elseif ($member->status == 2) {
									echo '<a href="'.$this->config->item('link_member_request_transfer').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-envelope"></i> Resend - Request Transfer</a>';
								} elseif ($member->status == 3) {
									echo '<a href="'.$this->config->item('link_member_approved').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-envelope"></i> Approved</a>';
								} elseif ($member->status == 4) {
									echo '<a href="'.$this->config->item('link_member_approved').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-envelope"></i> Resend - Approved</a>';
								} elseif ($member->status == 5) {
									echo '<a href="'.$this->config->item('link_member_invalid').'?id='.$member->id_member.'" type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-envelope"></i> Resend - Invalid Data</a>';
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