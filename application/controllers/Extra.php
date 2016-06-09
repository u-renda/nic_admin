<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }

	function dropdown_kota_lists()
	{
        $data = array();
        $data['kota_lists'] = get_kota(array('id_provinsi' => $this->input->post('id_provinsi'), 'limit' => 200, 'offset' => 0, 'order' => 'kota', 'sort' => 'asc'))->result;
        $this->load->view('select_options_kota', $data);
	}
}
