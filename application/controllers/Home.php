<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('is_login') == FALSE) { redirect($this->config->item('link_login')); }
    }
	
	function approved()
	{
		$param = array();
		$param['status'] = 4;
		$query = get_member($param)->total;
		return $query;
	}
	
	function awaiting_approved()
	{
		$param = array();
		$param['status'] = 3;
		$query = get_member($param)->total;
		return $query;
	}
	
	function awaiting_review()
	{
		$param = array();
		$param['status'] = 1;
		$query = get_member($param)->total;
		return $query;
	}
	
	function blog()
	{
		$param = array();
		$param['type'] = 1;
		$param['status'] = 1;
		$query = get_post($param)->total;
		return $query;
	}

	function dashboard()
	{
        $data = array();
        $data['awaiting_review'] = $this->awaiting_review();
        $data['awaiting_approved'] = $this->awaiting_approved();
        $data['approved'] = $this->approved();
        $data['male'] = $this->male();
        $data['female'] = $this->female();
        $data['news'] = $this->news();
        $data['blog'] = $this->blog();
        $data['title'] = 'Dashboard';
        $data['member_chart'] = $this->member_chart();
        $data['view_content'] = 'home/dashboard';
        $this->display_view('templates/frame', $data);
	}
	
	function female()
	{
		$param = array();
		$param['gender'] = 1;
		$param['status'] = 4;
		$query = get_member($param)->total;
		return $query;
	}
	
	function male()
	{
		$param = array();
		$param['gender'] = 0;
		$param['status'] = 4;
		$query = get_member($param)->total;
		return $query;
	}
	
	function member_chart()
	{
		// Get tanggal approved
		$query = $this->member_model->chart_registered(array('year' => date('Y')));
		
		$result = array();
		if ($query->code == 200)
		{
			$code_month = $this->config->item('code_month');
			
			foreach ($query->result as $row)
			{
				$result[$code_month[$row->month]] = $row->total;
			}
		}

		return $result;
	}
	
	function news()
	{
		$param = array();
		$param['type'] = 2;
		$param['status'] = 1;
		$query = get_post($param)->total;
		return $query;
	}
}
