<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
    }

    function event_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('date', 'type', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                $param['title'] = $this->input->post('title');
                $param['status'] = $this->input->post('status');
                $param['date'] = date('Y-m-d', strtotime($this->input->post('date')));
                $query = $this->event_model->create($param);
				
                if ($query->code == 200)
                {
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_event_lists'));
                }
                else
                {
                    $response =  array('msg' => 'Create data failed', 'type' => 'error');
                }
				
				echo json_encode($response);
				exit();
            }
        }

		$data['code_event_status'] = $this->config->item('code_event_status');
        $data['view_content'] = 'event/event_create';
        $this->load->view('templates/frame', $data);
    }

    function event_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->event_model->info(array('id_events' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_events'] = $data['id'];
                $query = $this->event_model->delete($param1);

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

    function event_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';
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

        $get = get_event(array('q' => $q, 'status' => $status, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());
        
        foreach ($get->result as $row)
        {
            $action = '<a title="Edit" href="event_edit?id='.$row->id_events.'" id="'.$row->id_events.'" class="edit '.$row->id_events.'-edit"><i class="fa fa-pencil fontorange font18"></i></a>&nbsp;
                        <a title="Delete" id="'.$row->id_events.'" class="delete '.$row->id_events.'-delete" href="#"><i class="fa fa-times fontred font18"></i></a>';
			
			$status_template = color_event_status($row->status);
			
            $entry = array(
                'No' => $i,
                'Title' => ucwords($row->title),
                'Date' => date('d M Y', strtotime($row->date)),
                'Status' => $status_template,
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function event_lists()
	{
        $data = array();
		$data['code_event_status'] = $this->config->item('code_event_status');
		$data['status'] = $this->input->get_post('status');
        $data['view_content'] = 'event/event_lists';
        $this->display_view('templates/frame', $data);
	}
}
