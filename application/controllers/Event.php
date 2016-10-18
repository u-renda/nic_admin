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
            $action = '<a title="View Detail" href="admin_view?id='.$row->id_events.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="admin_edit?id='.$row->id_events.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_events.'" class="delete '.$row->id_events.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';
			
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
