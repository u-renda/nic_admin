<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }

    function order_create()
    {
        // isinya adalah list product (bentuk table, bukan kendo. Table di dlm form)
		// tiap nama product, ada checkbox nya di sebelah kiri untuk pilih barangnya
		
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

        $data['view_content'] = 'order/order_create';
        $this->load->view('templates/frame', $data);
    }

    function order_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';
		$status = $this->input->post('status');
        $sort_post = $this->input->post('sort');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $get = get_order(array('status' => $status, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" href="admin_view?id='.$row->id_order.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="admin_edit?id='.$row->id_order.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_order.'" class="delete '.$row->id_order.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';
			
			$status_template = color_order_status($row->status);
			
            $entry = array(
                'No' => $i,
                'Name' => ucwords($row->name),
                'Email' => $row->email,
                'Phone' => $row->phone,
                'Status' => $status_template,
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function order_lists()
	{
        $data = array();
		$data['code_order_status'] = $this->config->item('code_order_status');
		$data['status'] = $this->input->get_post('status');
        $data['view_content'] = 'order/order_lists';
        $this->display_view('templates/frame', $data);
	}
}
