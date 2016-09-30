<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
    }

    function order_get()
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
            $action = '<a title="View Detail" href="admin_view?id='.$row->id_admin.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
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

	function order_lists()
	{
        $data = array();
        $data['view_content'] = 'order/order_lists';
        $this->display_view('templates/frame', $data);
	}
}
