<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->key = array('api_key' => $this->config->item('nic_key'));
    }

    function admin($endpoint, $params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). 'admin/' . $endpoint;
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
        return $result;
    }

    function member($endpoint, $params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). 'member/' . $endpoint;
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
        return $result;
    }

    function post($endpoint, $params)
    {
        $result = null;
        $url = $this->config->item('nic_api'). 'post/' . $endpoint;
        $params = array_merge($params, $this->key);
        $result = $this->rest->get($url, $params);
        return $result;
    }
}
