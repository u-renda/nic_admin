<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('product_size_model');
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
            $this->form_validation->set_rules('photo', 'photo', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
            $this->form_validation->set_rules('price', 'price', 'required|numeric');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('type', 'type', 'required');
            $this->form_validation->set_rules('sizable', 'type', 'required');

            if ($this->form_validation->run() == FALSE)
			{
				$response =  array('msg' => validation_errors(), 'type' => 'error');
				echo json_encode($response);
				exit();
			}
			else
			{
                $param = array();
				$param['sizable'] = 0;
				
				if (is_array($this->input->post('other_photo')) == TRUE)
				{
					$param['other_photo'] = $this->input->post('other_photo', true);
				}
				
				if ($this->input->post('sizable') == 'yes')
				{
					$param['sizable'] = 1;
				}
				
                $param['name'] = $this->input->post('name');
                $param['image'] = $this->input->post('photo');
                $param['price'] = $this->input->post('price');
                $param['description'] = $this->input->post('description');
                $param['status'] = $this->input->post('status');
                $param['type'] = $this->input->post('type');
                $query = $this->product_model->create($param);
				
                if ($query->code == 200)
                {
					if ($this->input->post('sizable') == 'yes')
					{
						if ($this->input->post('size_s') == TRUE)
						{
							$param2 = array();
							$param2['id_product'] = $query->result->id_product;
							$param2['size'] = 'S';
							$param2['quantity'] = $this->input->post('quantity_s');
							$query2 = $this->product_size_model->create($param2);
						}
						
						if ($this->input->post('size_m') == TRUE)
						{
							$param2 = array();
							$param2['id_product'] = $query->result->id_product;
							$param2['size'] = 'M';
							$param2['quantity'] = $this->input->post('quantity_m');
							$query2 = $this->product_size_model->create($param2);
						}
						
						if ($this->input->post('size_l') == TRUE)
						{
							$param2 = array();
							$param2['id_product'] = $query->result->id_product;
							$param2['size'] = 'L';
							$param2['quantity'] = $this->input->post('quantity_l');
							$query2 = $this->product_size_model->create($param2);
						}
						
						if ($this->input->post('size_xl') == TRUE)
						{
							$param2 = array();
							$param2['id_product'] = $query->result->id_product;
							$param2['size'] = 'XL';
							$param2['quantity'] = $this->input->post('quantity_xl');
							$query2 = $this->product_size_model->create($param2);
						}
					}
					
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

        $data['code_product_sizable'] = $this->config->item('code_product_sizable');
        $data['code_product_status'] = $this->config->item('code_product_status');
        $data['code_product_type'] = $this->config->item('code_product_type');
        $data['view_content'] = 'product/product_create';
        $this->load->view('templates/frame', $data);
    }

    function product_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
		$data['grid'] = $this->input->post('grid');

        $get = $this->product_model->info(array('id_product' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_product'] = $data['id'];
                $query = $this->product_model->delete($param1);
				
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

    function product_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->product_model->info(array('id_product' => $id));

        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
				$this->form_validation->set_rules('name', 'name', 'required|callback_check_product_name');
				$this->form_validation->set_rules('price_member', 'price member', 'required|numeric');
				$this->form_validation->set_rules('description', 'description', 'required');
				$this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
				$this->form_validation->set_rules('status', 'status', 'required');
				$this->form_validation->set_rules('type', 'type', 'required');

                if ($this->form_validation->run() == FALSE)
				{
					$response =  array('msg' => validation_errors(), 'type' => 'error');
					echo json_encode($response);
					exit();
				}
				else
				{
                    $param = array();
					if (is_array($this->input->post('other_photo')) == TRUE)
					{
						$param['other_photo'] = $this->input->post('other_photo', true);
					}

                    $param['name'] = $this->input->post('name');
					$param['image'] = $this->input->post('photo');
					$param['price_public'] = $this->input->post('price_public');
					$param['price_member'] = $this->input->post('price_member');
					$param['price_sale'] = $this->input->post('price_sale');
					$param['description'] = $this->input->post('description');
					$param['quantity'] = $this->input->post('quantity');
					$param['status'] = $this->input->post('status');
					$param['type'] = $this->input->post('type');
					$param['size'] = $this->input->post('size');
					$param['colors'] = $this->input->post('colors');
					$param['material'] = $this->input->post('material');
					$query = $this->product_model->update($param);

                    if ($query->code == 200)
                    {
                        $response =  array('msg' => 'Edit data success', 'type' => 'success', 'location' => $this->config->item('link_product_lists'));
                    }
                    else
                    {
                        $response =  array('msg' => 'Edit data failed', 'type' => 'error');
                    }
					
					echo json_encode($response);
					exit();
                }
            }

            $data['product'] = $get->result;
			$data['code_product_status'] = $this->config->item('code_product_status');
			$data['code_product_type'] = $this->config->item('code_product_type');
            $data['view_content'] = 'product/product_edit';
            $this->load->view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
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
		$type = $this->input->post('type');
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

        $get = get_product(array('status' => $status, 'type' => $type, 'q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());
        
        foreach ($get->result as $row)
        {
            $status_template = color_product_status($row->status);
            $code_product_type = $this->config->item('code_product_type');
			
            $action = '<a title="View Detail" id="'.$row->id_product.'" class="view '.$row->id_product.'-view" href="#"><i class="fa fa-folder-open fontblue font18"></i></a>&nbsp;
                        <a title="Edit" href="product_edit?id='.$row->id_product.'" id="'.$row->id_product.'" class="edit '.$row->id_product.'-edit"><i class="fa fa-pencil fontorange font18"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_product.'" class="delete '.$row->id_product.'-delete" href="#"><i class="fa fa-times fontred font18"></i></a>';

            $entry = array(
                'No' => $i,
                'Name' => ucwords($row->name),
                'Price' => number_format($row->price, 0, ',', '.'),
                'Status' => $status_template,
                'Type' => $code_product_type[$row->type],
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
		$data['code_product_type'] = $this->config->item('code_product_type');
		$data['status'] = $this->input->get_post('status');
		$data['type'] = $this->input->get_post('type');
        $data['view_content'] = 'product/product_lists';
        $this->display_view('templates/frame', $data);
	}
    
    function product_view()
    {
		$id = $this->input->post('id');
		$get = $this->product_model->info(array('id_product' => $id));
		
		if ($get->code == 200)
		{
            $result = $get->result;
            $code_product_status = $this->config->item('code_product_status');
			
            $data = array();
            $data['name'] = ucwords($result->name);
            $data['image'] = $result->image;
            $data['description'] = replace_new_line(htmlspecialchars_decode($result->description));
            $data['price_public'] = $result->price_public;
            $data['price_member'] = $result->price_member;
            $data['price_sale'] = $result->price_sale;
            $data['quantity'] = $result->quantity;
            $data['colors'] = $result->detail->colors;
            $data['size'] = $result->detail->size;
            $data['material'] = $result->detail->material;
            $data['other_image'] = $result->other_image;
            $data['status'] = $code_product_status[$result->status];
			$this->load->view('product/product_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }
}
