<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('preferences_model');
        $this->load->model('provinsi_model');
        $this->load->model('secret_santa_model');
    }

    function kota_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'kota';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $id_provinsi = $this->input->get_post('id');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $get = get_kota(array('id_provinsi' => $id_provinsi, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="Kota Lists" href="kota_lists?id='.$row->id_kota.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="provinsi_edit?id='.$row->id_kota.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_kota.'" class="delete '.$row->id_kota.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'no' => $i,
                'kota' => ucwords($row->kota),
                'price' => $row->price,
                'action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }
    
    function kota_lists()
    {
		$id_provinsi = $this->input->get_post('id');
		
		$get_info = $this->provinsi_model->info(array('id_provinsi' => $id_provinsi));
		
		if ($get_info->code == 200)
		{
			$data = array();
			$data['provinsi'] = $get_info->row();
			$data['view_content'] = 'others/kota_lists';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			echo "Data not found";
		}
	}
	
	function preferences_create()
	{
		$data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('key', 'key', 'required');
            $this->form_validation->set_rules('value', 'value', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                $param['key'] = $this->input->post('key');
                $param['value'] = $this->input->post('value');
                $param['description'] = $this->input->post('description');
				$query = $this->preferences_model->create($param);
				
                if ($query->code == 200)
                {
                    $response = '?type=success&msg=create';
                }
                else
                {
                    $response = '?type=error&msg=create';
                }
				
				redirect($this->config->item('link_preferences_lists').$response);
            }
        }

        $data['view_content'] = 'others/preferences/preferences_create';
        $this->load->view('templates/frame', $data);
	}

    function preferences_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->preferences_model->info(array('id_preferences' => $id));

        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('key', 'key', 'required');
                $this->form_validation->set_rules('value', 'value', 'required');
                $this->form_validation->set_rules('type', 'type', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $param['id_preferences'] = $id;
                    $param['key'] = $this->input->post('key');
                    $param['value'] = $this->input->post('value');
                    $param['type'] = $this->input->post('type');
                    $param['description'] = replace_new_line($this->input->post('description'));
                    $query = $this->preferences_model->update($param);

                    if ($query->code == 200)
                    {
                        redirect($this->config->item('link_email_template_lists'));
                    }
                    else
                    {
                        $data['error'] = $query->result;
                    }
                }
            }

            $data['code_preferences_type'] = $this->config->item('code_preferences_type');
            $data['preferences'] = $get->result;
            $data['view_content'] = 'others/preferences_edit';
            $this->display_view('templates/frame', $data);
        }
    }

    function preferences_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'key';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $get = get_preferences(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" href="preferences_view?id='.$row->id_preferences.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="preferences_edit?id='.$row->id_preferences.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_preferences.'" class="delete '.$row->id_preferences.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            // Potong panjang content
            $strip = strip_tags(replace_new_line($row->value));
            $content = substr($strip, 0, 200).' ...';
			$strip2 = replace_new_line($row->description);

            $entry = array(
                'No' => $i,
                'Key' => $row->key,
                'Value' => $content,
                'Description' => $strip2,
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function preferences_lists()
	{
        $data = array();
        $data['email'] = get_preferences(array('order' => 'key', 'sort' => 'asc', 'offset' => 0, 'limit' => 20));
        $data['view_content'] = 'others/preferences/preferences_lists';
        $this->display_view('templates/frame', $data);
	}

    function provinsi_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->provinsi_model->info(array('id_provinsi' => $id));
		
        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
				
                if ($this->form_validation->run() == TRUE)
                {
					
                    $param = array();
                    $param['id_provinsi'] = $id;
                    $param['provinsi'] = $this->input->post('provinsi');
                    $query = $this->provinsi_model->update($param);
					
                    if ($query->code == 200)
                    {
                        redirect($this->config->item('link_provinsi_lists'));
                    }
                    else
                    {
                        $data['error'] = $query->result;
                    }
                }
            }

            $data['provinsi'] = $get->result;
            $data['view_content'] = 'others/provinsi/provinsi_edit';
            $this->display_view('templates/frame', $data);
        }
    }

    function provinsi_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('provinsi', 'provinsi', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                $param['provinsi'] = $this->input->post('provinsi');
                $query = $this->provinsi_model->create($param);
				
                if ($query->code == 200)
                {
                    redirect($this->config->item('link_provinsi_lists'));
                }
                else
                {
                    $data['error'] = $query->result;
                }
            }
        }

        $data['view_content'] = 'others/provinsi/provinsi_create';
        $this->load->view('others/provinsi/provinsi_create', $data);
    }

    function provinsi_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');

        $get = $this->provinsi_model->info(array('id_provinsi' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_provinsi'] = $data['id'];
                $query = $this->provinsi_model->delete($param1);

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

    function provinsi_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'provinsi';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $filter = $this->input->post('filter');
        $q = '';

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

        $get = get_provinsi(array('q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="Kota Lists" href="kota_lists?id='.$row->id_provinsi.'"><i class="fa fa-sitemap fontblue font16"></i></a>&nbsp;
                        <a title="Edit" href="provinsi_edit?id='.$row->id_provinsi.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_provinsi.'" class="delete '.$row->id_provinsi.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'no' => $i,
                'provinsi' => ucwords($row->provinsi),
                'action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }
    
    function provinsi_lists()
    {
		$data = array();
        $data['view_content'] = 'others/provinsi/provinsi_lists';
        $this->display_view('templates/frame', $data);
	}
    
    function secret_santa_create()
    {
		$data = array();
		
		if ($this->input->post('submit'))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$param = array();
				$param['name'] = $this->input->post('name');
                $param['created_date'] = date('Y-m-d H:i:s');
                $param['updated_date'] = date('Y-m-d H:i:s');
				$query = $this->secret_santa_model->create($param);

				if ($query)
				{
					redirect($this->config->item('link_secret_santa_lists'));
				}
				else
				{
					$data['error'] = $query->result();
				}
			}
		}
		
		$data['view_content'] = 'others/provinsi/secret_santa_create';
		$this->display_view('templates/frame', $data);
	}

    function secret_santa_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');

        $get = $this->secret_santa_model->info(array('id_secret_santa' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_secret_santa'] = $data['id'];
                $query = $this->secret_santa_model->delete($param1);

                if ($query)
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

    function secret_santa_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $get = get_secret_santa(array('limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
			$code_secret_santa_status = $this->config->item('code_secret_santa_status');
			
            $action = '<a title="View Detail" href="secret_santa_view?id='.$row->id_secret_santa.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
						<a title="Random" id="'.$row->id_secret_santa.'" class="random '.$row->id_secret_santa.'-random" href="#"><span class="glyphicon glyphicon-random fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_secret_santa.'" class="delete '.$row->id_secret_santa.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'no' => $i,
                'id_secret_santa' => $row->id_secret_santa,
                'name' => ucwords($row->name),
                'chosen_id' => $row->chosen_id,
                'status' => $code_secret_santa_status[$row->status],
                'created_date' => $row->created_date,
                'action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function secret_santa_lists()
	{
        $data = array();
        $data['view_content'] = 'others/secret_santa_lists';
        $this->display_view('templates/frame', $data);
	}
	
	function secret_santa_random()
	{
		$data = array();
		$data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');

        $get = $this->secret_santa_model->info(array('id_secret_santa' => $data['id'], 'status' => 0));
		
        if ($get->code == 200)
        {
            if ($this->input->post('random'))
            {
                $param1 = array();
                $param1['id_secret_santa'] = $data['id'];
                $query2 = get_secret_santa(array('not_id_secret_santa' => $data['id'], 'chosen' => 0, 'order' => 'name', 'sort' => 'asc', 'limit' => 20, 'offset' => 0));
				$count = count($query2->result);

				$potential = Array();
				foreach($query2->result as $row)
				{
					$potential[] = $row->id_secret_santa;
				}
				
				$rand = rand(100, 999);
				$leftover = $rand % $count;
				$chosen_id = $potential[$leftover];
				
				$param2 = array();
				$param2['chosen_id'] = $chosen_id;
				$param2['status'] = 1;
				$query3 = $this->secret_santa_model->update($data['id'], $param2);
				
				if ($query3)
				{
					$param3 = array();
					$param3['chosen'] = 1;
					$query4 = $this->secret_santa_model->update($chosen_id, $param3);
					
					$response =  array('msg' => 'Random data success', 'type' => 'success');
				}
				else
				{
					$response =  array('msg' => 'Random data failed', 'type' => 'error');
				}

                echo json_encode($response);
                exit();
            }
            else
            {
                $this->load->view('random_confirm', $data);
            }
        }
        else
        {
            echo "Data Not Found or already chosen";
        }
	}
}
