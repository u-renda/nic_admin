<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
	
	function check_kota_lists()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		
		$result = get_kota(array('id_provinsi' => $id_provinsi, 'limit' => 100));
	
		if ($result->code == 200)
		{
			$data = array();
			$data['kota_lists'] = $result->result;
			$this->load->view('select_options_kota', $data);
		}
		else
		{
            echo 'false';
        }
	}
}
