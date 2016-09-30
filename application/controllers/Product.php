<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
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

        $get = get_product(array('q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());
        
        foreach ($get->result as $row)
        {
            $status_template = color_product_status($row->status);
            
            $action = '<a title="View Detail" href="admin_view?id='.$row->id_product.'"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="admin_edit?id='.$row->id_product.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Delete" id="'.$row->id_product.'" class="delete '.$row->id_product.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';

            $entry = array(
                'No' => $i,
                'Name' => ucwords($row->name),
                'PricePublic' => number_format($row->price_public, 0, ',', '.'),
                'PriceMember' => number_format($row->price_member, 0, ',', '.'),
                'Quantity' => $row->quantity,
                'Status' => $status_template,
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
        $data['view_content'] = 'product/product_lists';
        $this->display_view('templates/frame', $data);
	}
}
