<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    function admin_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required|callback_check_admin_name');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_admin_email');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
            $this->form_validation->set_rules('initial', 'initial', 'required|max_length[1]|callback_check_admin_initial');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                $param['username'] = $this->input->post('username');
                $param['password'] = $this->input->post('password');
                $param['name'] = $this->input->post('name');
                $param['email'] = $this->input->post('email');
                $param['admin_role'] = 1;
                $param['admin_group'] = 1;
                $param['position'] = 'admin';
                $param['photo'] = $this->input->post('photo');
                $param['admin_initial'] = $this->input->post('initial');
                $query = $this->admin_model->create($param);

                if ($query->code == 200)
                {
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_admin_lists'));
                }
                else
                {
                    $response =  array('msg' => 'Create data failed', 'type' => 'error');
                }
				
				echo json_encode($response);
				exit();
            }
        }

        $data['view_content'] = 'admin/admin_create';
        $this->load->view('templates/frame', $data);
    }

    function admin_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->admin_model->info(array('id_admin' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_admin'] = $data['id'];
                $query = $this->admin_model->delete($param1);

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

    function admin_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->admin_model->info(array('id_admin' => $id));

        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email_edit');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('initial', 'initial', 'required|max_length[3]|callback_check_initial_edit');

                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    if ($this->input->post('password') != '')
                    {
                        $data['password'] = $this->input->post('password');
                    }

                    $param['id_admin'] = $id;
                    $param['username'] = $this->input->post('username');
                    $param['name'] = $this->input->post('name');
                    $param['email'] = $this->input->post('email');
                    $param['admin_role'] = 1;
                    $param['admin_initial'] = $this->input->post('initial');
                    $query = $this->admin_model->update($param);

                    if ($query->code == 200)
                    {
                        redirect($this->config->item('link_admin_lists'));
                    }
                    else
                    {
                        $data['error'] = $query->result;
                    }
                }
            }

            $data['admin'] = $get->result;
            $data['view_content'] = 'admin/admin_edit';
            $this->load->view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }

    function admin_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'name';
        $sort = 'asc';
        $q = '';
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

        $get = get_admin(array('q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" id="'.$row->id_admin.'" class="view '.$row->id_admin.'-view" href="#"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="admin_edit?id='.$row->id_admin.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_admin.'" class="delete '.$row->id_admin.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'no' => $i,
                'name' => ucwords($row->name),
                'email' => $row->email,
                'username' => $row->username,
                'initial' => strtoupper($row->initial),
                'action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function admin_lists()
	{
        $data = array();
        $data['view_content'] = 'admin/admin_lists';
        $this->display_view('templates/frame', $data);
	}
    
    function admin_view()
    {
		$id = $this->input->post('id');
		$get = $this->admin_model->info(array('id_admin' => $id));
		
		if ($get->code == 200)
		{
            $result = $get->result;
            $code_admin_role = $this->config->item('code_admin_role');
            $code_admin_group = $this->config->item('code_admin_group');
			
            $data = array();
            $data['username'] = $result->username;
            $data['email'] = $result->email;
            $data['admin_initial'] = $result->admin_initial;
            $data['name'] = $result->name;
            $data['photo'] = $result->photo;
            $data['position'] = $result->position;
            $data['twitter'] = $result->twitter;
            $data['admin_role'] = $code_admin_role[$result->admin_role];
            $data['admin_group'] = $code_admin_group[$result->admin_group];
			$this->load->view('admin/admin_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }

    function check_admin_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = $this->admin_model->info(array('name' => $name));
		
        if ($get->code == 200 && $selfname != $name)
        {
            $this->form_validation->set_message('check_admin_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_admin_email()
    {
        $selfemail = $this->input->post('selfemail');
		$email = $this->input->post('email');
		$get = $this->admin_model->info(array('email' => $email));
		
        if ($get->code == 200 && $selfemail != $email)
        {
            $this->form_validation->set_message('check_admin_email', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_admin_initial()
    {
        $self = $this->input->post('selfinitial');
		$initial = $this->input->post('initial');
		$get = $this->admin_model->info(array('admin_initial' => $initial));
		
        if ($get->code == 200 && $self != $initial)
        {
            $this->form_validation->set_message('check_admin_initial', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
