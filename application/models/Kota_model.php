<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {

    var $page = 'kota';

    function __construct()
    {
        parent::__construct();
        $this->key = array('api_key' => $this->config->item('nic_key'));
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
}