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

    function order_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');

        $get = $this->order_model->info(array('id_order' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_order'] = $data['id'];
                $query = $this->order_model->delete($param1);
				
                if ($query->code == 200)
                {
                    $response =  array('msg' => 'Delete data success', 'type' => 'success');
                }
                else
                {
                    $response =  array('msg' => 'Delete data failed', 'type' => 'error');
                }

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('delete_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found";
        }
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
            $action = '<a title="View Detail" href="order_view?id='.$row->id_order.'"><i class="fa fa-folder-open fontblue font18"></i></a>&nbsp;
                        <a title="Edit" href="order_edit?id='.$row->id_order.'"><i class="fa fa-pencil fontorange font18"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_order.'" class="delete '.$row->id_order.'-delete" href="#"><i class="fa fa-times fontred font18"></i></a>';
			
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
