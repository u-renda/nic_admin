<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    function check_product_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = $this->product_model->info(array('name' => $name));
		
        if ($get->code == 200 && $selfname != $name)
        {
            $this->form_validation->set_message('check_product_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function product_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required|callback_check_product_name');
            $this->form_validation->set_rules('photo', 'photo', 'required');
            $this->form_validation->set_rules('price_public', 'price public', 'required|numeric');
            $this->form_validation->set_rules('price_member', 'price member', 'required|numeric');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
            $this->form_validation->set_rules('status', 'status', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
				if (is_array($this->input->post('other_photo')) == TRUE)
				{
					$param['other_photo'] = $this->input->post('other_photo');
				}
				
                $param['name'] = $this->input->post('name');
                $param['image'] = $this->input->post('photo');
                $param['price_public'] = $this->input->post('price_public');
                $param['price_member'] = $this->input->post('price_member');
                $param['description'] = $this->input->post('description');
                $param['quantity'] = $this->input->post('quantity');
                $param['status'] = $this->input->post('status');
                $query = $this->product_model->create($param);
				
                if ($query->code == 200)
                {
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_product_lists'));
                }
                else
                {
                    $response =  array('msg' => 'Create data failed', 'type' => 'error');
                }
				
				echo json_encode($response);
				exit();
            }
        }

        $data['code_product_status'] = $this->config->item('code_product_status');
        $data['view_content'] = 'product/product_create';
        $this->load->view('templates/frame', $data);
    }

    function product_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';
        $q = '';
		$status = $this->input->post('status');
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        if ($filter)
        {
            if (empty($filter['filters']))
            {
                $q = $filter;
            }
            else
            {
                $q = $filter['filters'][0]['value'];
            }
        }

        $get = get_product(array('status' => $status, 'q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());
        
        foreach ($get->result as $row)
        {
            $status_template = color_product_status($row->status);
            
            $action = '<a title="View Detail" href="admin_view?id='.$row->id_product.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="admin_edit?id='.$row->id_product.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_product.'" class="delete '.$row->id_product.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'No' => $i,
                'Name' => ucwords($row->name),
                'PricePublic' => number_format($row->price_public, 0, ',', '.'),
                'PriceMember' => number_format($row->price_member, 0, ',', '.'),
                'Quantity' => $row->quantity,
                'Status' => $status_template,
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function product_lists()
	{
        $data = array();
		$data['code_product_status'] = $this->config->item('code_product_status');
		$data['status'] = $this->input->get_post('status');
        $data['view_content'] = 'product/product_lists';
        $this->display_view('templates/frame', $data);
	}
}
