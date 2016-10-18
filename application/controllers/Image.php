<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('image_model');
        $this->load->model('image_album_model');
    }

    function image_album_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('date', 'date', 'required');
            $this->form_validation->set_rules('photo[]', 'photo', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $param = array();
                if (is_array($this->input->post('photo')) == TRUE)
				{
					$param['url'] = $this->input->post('photo');
				}
				
				$param['name'] = $this->input->post('name');
                $param['date'] = date('Y-m-d', strtotime($this->input->post('date')));
                $query = $this->image_album_model->create($param);
				
                if ($query->code == 200)
                {
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_image_album_lists'));
                }
                else
                {
                    $response =  array('msg' => 'Create data failed', 'type' => 'error');
                }
				
				echo json_encode($response);
				exit();
            }
        }

        $data['view_content'] = 'image/image_album_create';
        $this->load->view('templates/frame', $data);
    }

    function image_album_get()
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

        $get = get_image_album(array('q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
			$name = '<a title="'.ucwords($row->name).'" href="image_lists?id='.$row->id_image_album.'">'.ucwords($row->name).'</a>';
            $action = '<a title="Edit" href="admin_edit?id='.$row->id_image_album.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_image_album.'" class="delete '.$row->id_image_album.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'No' => $i,
                'Name' => $name,
                'Date' => $row->date,
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function image_album_lists()
	{
        $data = array();
        $data['view_content'] = 'image/image_album_lists';
        $this->display_view('templates/frame', $data);
	}
	
	function image_lists()
	{
		$id_image_album = $this->input->get_post('id');
		
		$get = $this->image_album_model->info(array('id_image_album' => $id_image_album));
		
		if ($get->code == 200)
		{
			$query = get_image(array('id_image_album' => $id_image_album));
			
			$data = array();
			$data['image_album'] = $get->result;
			$data['image'] = $query->result;
			$data['view_content'] = 'image/image_lists';
			$this->display_view('templates/frame', $data);
		}
		else
		{
			echo "Data not found";
		}
	}
}
