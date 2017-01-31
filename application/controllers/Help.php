<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }
	
	function help_member_awaiting_review()
	{
        $data = array();
        $data['title'] = 'Help - Member (Awaiting Review)';
        $data['view_content'] = 'help/help_member_awaiting_review';
        $this->display_view('templates/frame', $data);
	}
}
