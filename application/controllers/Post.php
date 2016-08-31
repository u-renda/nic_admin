<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
    }

    function check_photo($param)
    {
        if ($param["error"] == 0)
        {
            $name = md5(basename($param["name"]) . date('Y-m-d H:i:s'));
            $target_dir = "http://localhost/uploads/";
            $imageFileType = strtolower(pathinfo($param["name"],PATHINFO_EXTENSION));

            $param2 = array();
/*
            $param2['target_file'] = '/var/www/html/uploads/' . $name . '.' . $imageFileType;
*/
            $param2['target_file'] = '../uploads/' . $name . '.' . $imageFileType;
            $param2['imageFileType'] = $imageFileType;
            $param2['tmp_name'] = $param["tmp_name"];
            $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
            $param2['size'] = $param["size"];

            $check_image = check_image($param2);

            if ($check_image == 'true')
            {
                return $param2['tmp_file'];
            }
            else
            {
                return FALSE;
            }
        }
    }

    function post_create()
    {
        $data = array();
        if ($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('type', 'type', 'required');
            $this->form_validation->set_rules('is_event', 'event', 'required');
            $this->form_validation->set_rules('content', 'content', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $media = '';
                $media_type = 0;
                if ($this->input->post('media') == 'image')
                {
                    if (isset($_FILES['photo']))
                    {
                        $photo = $this->check_photo($_FILES['photo']);

                        if ($photo != FALSE)
                        {
                            $media = $photo;
                            $media_type = 2;
                        }
                    }
                }
                elseif ($this->input->post('media') == 'video')
                {
                    $media = $this->input->post('video');
                    $media_type = 1;
                }
                
                $created_date = '';
                if ($this->input->post('created_date') != '')
                {
					$created_date = date('Y-m-d H:i:s', strtotime($this->input->post('created_date')));
				}

                $param = array();
                $param['title'] = $this->input->post('title');
                $param['content'] = $this->input->post('content');
                $param['type'] = $this->input->post('type');
                $param['status'] = $this->input->post('status');
                $param['is_event'] = $this->input->post('is_event');
                $param['media_type'] = $media_type;
                $param['media'] = $media;
                $param['created_date'] = $created_date;
                $query = $this->post_model->create($param);
				
                if ($query->code == 200)
                {
                    redirect($this->config->item('link_post_lists'));
                }
                else
                {
                    $data['error'] = $query->result;
                }
            }
        }

        $data['code_post_status'] = $this->config->item('code_post_status');
        $data['code_post_type'] = $this->config->item('code_post_type');
        $data['code_yes_no'] = $this->config->item('code_yes_no');
        $data['view_content'] = 'post/post_create';
        $this->load->view('templates/frame', $data);
    }

    function post_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');

        $get = $this->post_model->info(array('id_post' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_post'] = $data['id'];
                $param1['status'] = 3;
                $query = $this->post_model->update($param1);
				
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

    function post_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->post_model->info(array('id_post' => $id));

        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
				print_r($this->input->post());die();
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title', 'title', 'required');
                $this->form_validation->set_rules('status', 'status', 'required');
                $this->form_validation->set_rules('type', 'type', 'required');
                $this->form_validation->set_rules('is_event', 'event', 'required');
                $this->form_validation->set_rules('content', 'content', 'required');

                if ($this->form_validation->run() == TRUE)
                {
                    $media = $get->result->media;
                    $media_type = $get->result->media_type;
                    if ($this->input->post('change_media') == 'true')
                    {
                        if ($this->input->post('media') == 'image')
                        {
                            if (isset($_FILES['photo']))
                            {
                                $photo = $this->check_photo($_FILES['photo']);

                                if ($photo != FALSE)
                                {
                                    $media = $photo;
                                    $media_type = 2;
                                }
                            }
                        }
                        elseif ($this->input->post('media') == 'video')
                        {
                            $media = $this->input->post('video');
                            $media_type = 1;
                        }
                        else
                        {
                            $media = '';
                            $media_type = 0;
                        }
                    }

                    $param = array();
                    $param['id_post'] = $id;
                    $param['title'] = $this->input->post('title');
                    $param['content'] = $this->input->post('content');
                    $param['type'] = $this->input->post('type');
                    $param['status'] = $this->input->post('status');
                    $param['is_event'] = $this->input->post('is_event');
                    $param['media_type'] = $media_type;
                    $param['media'] = $media;
                    $param['created_date'] = date('Y-m-d H:i:s', strtotime($this->input->post('created_date')));
                    $query = $this->post_model->update($param);

                    if ($query->code == 200)
                    {
                        redirect($this->config->item('link_post_lists'));
                    } 
                    else
                    {
                        $data['error'] = $query->result;
                    }
                }
            }

            $video = '';
            $new_data = (array) $get->result;
            
            if ($new_data['media_type'] == 1)
            {
                if ($new_data['media'] != '')
                {
					$explode = explode('v=', $new_data['media']);
					$new_data['video'] = $explode[1];
				}
            }
			
			$new_data['new_content'] = html_entity_decode($new_data['content']);
			
            $data['code_post_status'] = $this->config->item('code_post_status');
            $data['code_post_type'] = $this->config->item('code_post_type');
            $data['code_yes_no'] = $this->config->item('code_yes_no');
            $data['post'] = (object) $new_data;
            $data['view_content'] = 'post/post_edit';
            $this->load->view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }

    function post_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'created_date';
        $sort = 'desc';
        $q = '';
        $type = $this->input->post('type');
        $is_event = $this->input->post('is_event');
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

        $code_post_status = $this->config->item('code_post_status');
        $code_post_type = $this->config->item('code_post_type');
        $code_yes_no = $this->config->item('code_yes_no');
        $get = get_post(array('type' => $type, 'is_event' => $is_event, 'status' => $status, 'q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" id="'.$row->id_post.'" class="view '.$row->id_post.'-view" href="#"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="post_edit?id='.$row->id_post.'"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;';

            if ($row->status != 3)
            {
                $action .= '<a title="Delete" id="'.$row->id_post.'" class="delete '.$row->id_post.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';
            }

            $status_template = $code_post_status[$row->status];

            if ($row->status == 1)
            {
                $status_template = '<span class="label label-success">'.$code_post_status[$row->status].'</span>';
            }
            elseif ($row->status == 2)
            {
                $status_template = '<span class="label label-warning">'.$code_post_status[$row->status].'</span>';
            }

            // Potong panjang content
            $strip = strip_tags(html_entity_decode($row->content));
            $content = substr($strip, 0, 200);
            
            if (strlen($strip) >= 200)
            {
				$content = substr($strip, 0, 200).' ...';
			}
			
            $entry = array(
                'No' => $i,
                'Title' => ucwords($row->title),
                'Content' => $content,
                'Type' => $code_post_type[$row->type],
                'Event' => $code_yes_no[$row->is_event],
                'Status' => $status_template,
                'CreatedDate' => date('d M Y', strtotime($row->created_date)),
                'Action' => $action
            );

            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

	function post_lists()
	{
        $data = array();
        $data['code_post_type'] = $this->config->item('code_post_type');
        $data['code_post_status'] = $this->config->item('code_post_status');
        $data['code_yes_no'] = $this->config->item('code_yes_no');
        $data['type'] = $this->input->get_post('type');
        $data['status'] = $this->input->get_post('status');
        $data['view_content'] = 'post/post_lists';
        $this->display_view('templates/frame', $data);
	}
    
    function post_view()
    {
		$id = $this->input->post('id');
		$get = $this->post_model->info(array('id_post' => $id));
		
		if ($get->code == 200)
		{
            $result = $get->result;
            $code_post_type = $this->config->item('code_post_type');
            $code_post_status = $this->config->item('code_post_status');
            $code_yes_no = $this->config->item('code_yes_no');
            
            $data = array();
            $data['title'] = ucwords($result->title);
            $data['slug'] = $result->slug;
            $data['content'] = replace_new_line(htmlspecialchars_decode($result->content));
            $data['media'] = $result->media;
            $data['media_type'] = $result->media_type;
            $data['type'] = $code_post_type[$result->type];
            $data['status'] = $code_post_status[$result->status];
            $data['is_event'] = $code_yes_no[$result->is_event];
            $data['created_date'] = $result->created_date;
			$this->load->view('post/post_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }
}
