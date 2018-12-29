<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('forms_model');
    }

    function forms_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required|callback_check_forms_title');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                $param['title'] = $this->input->post('title');
                $param['description'] = $this->input->post('description');
                $param['status'] = $this->input->post('status');
                $param['photo'] = $this->input->post('photo');
                $query = $this->forms_model->create($param);

                if ($query->code == 200)
                {
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_forms_lists'));
                }
                else
                {
                    $response =  array('msg' => 'Create data failed', 'type' => 'error');
                }
				
				echo json_encode($response);
				exit();
            }
        }

        $data['code_yes_no'] = $this->config->item('code_yes_no');
        $data['code_answer_type'] = $this->config->item('code_answer_type');
        $data['code_forms_status'] = $this->config->item('code_forms_status');
        $data['view_content'] = 'forms/forms_create';
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

    function forms_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->forms_model->info(array('id_forms' => $id));

        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_admin_email');
                $this->form_validation->set_rules('username', 'username', 'required');
                $this->form_validation->set_rules('initial', 'initial', 'required|max_length[3]|callback_check_admin_initial');

                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    if ($this->input->post('password') != '')
                    {
                        $param['password'] = $this->input->post('password');
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

            $data['result'] = $get->result;
            $data['view_content'] = 'forms/forms_edit';
            $this->load->view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }

    function forms_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'title';
        $sort = 'asc';
        $sort_post = $this->input->post('sort');
        $status = $this->input->post('status');

        if ($sort_post)
        {
            $order = $sort_post[0]['field'];
            $sort = $sort_post[0]['dir'];
        }

        $get = $this->forms_model->lists(array('$status' => $status, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());
        $code_forms_status = $this->config->item('code_forms_status');
        
        foreach ($get->result as $row)
        {
            $action = '<a title="Edit" href="forms_edit?id='.$row->id_forms.'" id="'.$row->id_forms.'" class="edit '.$row->id_forms.'-edit"><i class="fa fa-pencil fontorange font18"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_forms.'" class="delete '.$row->id_forms.'-delete" href="#"><i class="fa fa-times fontred font18"></i></a>';

            $entry = array(
                'No' => $i,
                'Title' => ucwords($row->title),
                'Description' => $row->description,
                'Status' => $code_forms_status[$row->status],
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function forms_lists()
	{
        $data = array();
		$type = $this->input->get('type') ? $this->input->get('type') : '';
		$msg = $this->input->get('msg') ? $this->input->get('msg') : '';
		
        $data['status'] = $this->input->get_post('status');
        $data['code_forms_status'] = $this->config->item('code_forms_status');
		$data['alert_type'] = $type;
		$data['alert_msg'] = $msg;
        $data['view_content'] = 'forms/forms_lists';
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
