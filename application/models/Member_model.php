<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    var $page = 'member';

    function __construct()
    {
        parent::__construct();
        $this->key = array('api_key' => $this->config->item('nic_key'));
    }
	
	function chart_registered($params)
	{
		$result = null;
        $url = $this->config->item('nic_api'). $this->page . '/chart_registered';
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
		return $result;
	}

    function create($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/create';
        $params = array_merge($params, $this->key);
        $result = $this->rest->post($url, $params);
		return $result;
    }

    function delete($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/delete';
        $params = array_merge($params, $this->key);
        $result = $this->rest->post($url, $params);
		return $result;
    }

    function info($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/info';
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
		return $result;
    }

    function lists($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/lists';
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
		return $result;
    }

    function send_invalid($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/send_invalid';
        $params = array_merge($params, $this->key);
        $result = $this->rest->post($url, $params);
		return $result;
    }

    function update($params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). $this->page . '/update';
        $params = array_merge($params, $this->key);
        $result = $this->rest->post($url, $params);
		return $result;
    }
}
