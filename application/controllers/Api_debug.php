<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_debug extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    function api_admin()
    {
        $data = array();
        $data['query_result'] = '';
        
        if ($this->input->post('submit'))
        {
			$this->load->library('form_validation');
            $this->form_validation->set_rules('endpoint', 'endpoint', 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
				$endpoint = $this->input->post('endpoint');
				
                $param = array();
                $param['limit'] = $this->input->post('limit');
                $param['offset'] = $this->input->post('offset');
                $param['order'] = $this->input->post('order');
                $param['sort'] = $this->input->post('sort');
                $param['admin_role'] = $this->input->post('admin_role');
                
                $data['query_result'] = $this->api_model->admin($endpoint, $param);
            }
		}
		
        $data['code_api_endpoint'] = $this->config->item('code_api_endpoint');
        $data['code_api_admin_order'] = $this->config->item('code_api_admin_order');
        $data['code_api_sort'] = $this->config->item('code_api_sort');
        $data['view_content'] = 'api_debug/api_admin';
        $this->load->view('templates/frame', $data);
    }

    function api_member()
    {
        $data = array();
        $data['query_result'] = '';
        
        if ($this->input->post('submit'))
        {
			$this->load->library('form_validation');
            $this->form_validation->set_rules('endpoint', 'endpoint', 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
				$endpoint = $this->input->post('endpoint');
				
                $param = array();
                $param['limit'] = $this->input->post('limit');
                $param['offset'] = $this->input->post('offset');
                $param['order'] = $this->input->post('order');
                $param['sort'] = $this->input->post('sort');
                $param['idcard_type'] = $this->input->post('idcard_type');
                $param['gender'] = $this->input->post('gender');
                $param['marital_status'] = $this->input->post('marital_status');
                $param['religion'] = $this->input->post('religion');
                $param['shirt_size'] = $this->input->post('shirt_size');
                $param['status'] = $this->input->post('status');
                $param['q'] = $this->input->post('q');
                
                $data['query_result'] = $this->api_model->member($endpoint, $param);
            }
		}
		
        $data['code_api_endpoint'] = $this->config->item('code_api_endpoint');
        $data['code_api_member_order'] = $this->config->item('code_api_member_order');
        $data['code_api_sort'] = $this->config->item('code_api_sort');
        $data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
        $data['code_member_gender'] = $this->config->item('code_member_gender');
        $data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
        $data['code_member_religion'] = $this->config->item('code_member_religion');
        $data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
        $data['code_member_status'] = $this->config->item('code_member_status');
        $data['view_content'] = 'api_debug/api_member';
        $this->load->view('templates/frame', $data);
    }

    function api_post()
    {
        $data = array();
        $data['query_result'] = '';
        
        if ($this->input->post('submit'))
        {
			$this->load->library('form_validation');
            $this->form_validation->set_rules('endpoint', 'endpoint', 'required');
            
            if ($this->form_validation->run() == TRUE)
            {
				$endpoint = $this->input->post('endpoint');
				
                $param = array();
                $param['media_type'] = $this->input->post('media_type');
                $param['type'] = $this->input->post('type');
                $param['status'] = $this->input->post('status');
                $param['is_event'] = $this->input->post('is_event');
                $param['limit'] = $this->input->post('limit');
                $param['offset'] = $this->input->post('offset');
                $param['order'] = $this->input->post('order');
                $param['sort'] = $this->input->post('sort');
                
                $data['query_result'] = $this->api_model->post($endpoint, $param);
            }
		}
		
        $data['code_api_endpoint'] = $this->config->item('code_api_endpoint');
        $data['code_api_post_order'] = $this->config->item('code_api_post_order');
        $data['code_api_sort'] = $this->config->item('code_api_sort');
        $data['code_post_media_type'] = $this->config->item('code_post_media_type');
        $data['code_post_type'] = $this->config->item('code_post_type');
        $data['code_post_status'] = $this->config->item('code_post_status');
        $data['code_yes_no'] = $this->config->item('code_yes_no');
        $data['view_content'] = 'api_debug/api_post';
        $this->load->view('templates/frame', $data);
    }
}
