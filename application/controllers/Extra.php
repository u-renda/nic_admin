<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('kota_model');
		$this->load->model('member_model');
		$this->load->model('product_model');
		$this->load->model('provinsi_model');
		$this->load->library('imagemanipulation');
    }
	
	function check_admin_email()
	{
		$self = $this->input->post('selfemail');
		$input = $this->input->post('email');
		
		$result = $this->admin_model->info(array('email' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_admin_initial()
	{
		$self = $this->input->post('selfemail');
		$input = $this->input->post('initial');
		
		$result = $this->admin_model->info(array('admin_initial' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_admin_name()
	{
		$self = $this->input->post('selfemail');
		$input = $this->input->post('name');
		
		$result = $this->admin_model->info(array('name' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
    
	function check_all($image)
	{
		// Check image size
		$check_size = $this->imagemanipulation->check_size($image['size']);
		
		if ($check_size == TRUE)
		{
			$msg = array(
				"message" => "error",
				"code" => 400,
				"result" => array(
					"checking" => "Client: ".$check_size
				)
			);
			
			return $msg;
		}
		else
		{
			$explode = explode('.', $image['name']);
			$extension = strtolower(end($explode));
			
			// Check image format
			$check_format = $this->imagemanipulation->check_format($extension);
			
			if ($check_format == TRUE)
			{
				$msg = array(
					"message" => "error",
					"code" => 400,
					"result" => array(
						"checking" => "Client: ".$check_format
					)
				);
				
				return $msg;
			}
			else
			{
				// Check image info (content)
				$check_info = $this->imagemanipulation->check_info($image['tmp_name']);
				
				if ($check_info == TRUE)
				{
					$msg = array(
						"message" => "error",
						"code" => 400,
						"result" => array(
							"checking" => "Client: ".$check_info
						)
					);
					
					return $msg;
				}
				else
				{
					return TRUE;
				}
			}
		}
	}

    function check_kota()
	{
		$selfname = $this->input->post('selfkota');
		$name = $this->input->post('kota');
		$id = $this->input->post('id_provinsi');
		$get = $this->kota_model->info(array('kota' => $name, 'id_provinsi' => $id));
		
        if ($get->code == 200 && $selfname != $name)
        {
            echo 'false';
		}
		else
		{
            echo 'true';
        }
    }
	
	function check_kota_lists()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		
		$result = get_kota(array('id_provinsi' => $id_provinsi, 'limit' => 100));
	
		if ($result->code == 200)
		{
			$data = array();
			$data['kota_lists'] = $result->result;
			$this->load->view('select_options_kota', $data);
		}
		else
		{
            echo 'false';
        }
	}
	
	function check_member_email()
	{
		$self = $this->input->post('selfemail');
		$input = $this->input->post('email');
		
		$result = $this->member_model->info(array('email' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_member_idcard_number()
	{
		$self = $this->input->post('selfidcard_number');
		$input = $this->input->post('idcard_number');
		
		$result = $this->member_model->info(array('idcard_number' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_member_name()
	{
		$self = $this->input->post('selfname');
		$input = $this->input->post('name');
		
		$result = $this->member_model->info(array('name' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_member_phone_number()
	{
		$self = $this->input->post('selfphone_number');
		$input = $this->input->post('phone_number');
		
		$result = $this->member_model->info(array('phone_number' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}
	
	function check_product_name()
	{
		$self = $this->input->post('selfname');
		$input = $this->input->post('name');
		
		$result = $this->product_model->info(array('name' => $input));
	
		if ($result->code == 200 && $self != $input)
		{
			echo 'false';
		}
		else
		{
            echo 'true';
        }
	}

    function check_provinsi()
	{
		$selfname = $this->input->post('selfprovinsi');
		$name = $this->input->post('provinsi');
		$get = $this->provinsi_model->info(array('provinsi' => $name));
		
        if ($get->code == 200 && $selfname != $name)
        {
            echo 'false';
		}
		else
		{
            echo 'true';
        }
    }
	
	function upload_image()
	{
		$watermark = $this->input->post('watermark');
		$type = $this->input->post('type');
		
		if (isset($_FILES["image"]))
		{
			$image = $_FILES["image"];
			if (is_array($image["name"]) == TRUE)
			{
				$temp = array();
				$temp['name'] = $image["name"][0];
				$temp['type'] = $image["type"][0];
				$temp['tmp_name'] = $image["tmp_name"][0];
				$temp['error'] = $image["error"][0];
				$temp['size'] = $image["size"][0];
				$image = $temp;
			}
			
			// Check image (size, format & content)
			$check_all = $this->check_all($image);
			
			if (is_array($check_all) == FALSE)
			{
				$rename_files = md5(basename($image["name"]) . date('Y-m-d H:i:s'));
				$imageFileType = strtolower(pathinfo($image["name"],PATHINFO_EXTENSION));
				
				// Save Original Image
				$param = array();
				$param['rename_files'] = $rename_files;
				$param['type'] = $type;
				$param['extension'] = $imageFileType;
				$save_ori = $this->imagemanipulation->save($image, $param);
				
				if ($save_ori == 1)
				{
					// resize foto
					if ($type == 'post')
					{
						$param['resize'] = $this->config->item('code_1024x600');
						$resize_1024x600 = $this->imagemanipulation->resize($param, $image, $watermark);
					}
					
					$param['resize'] = $this->config->item('code_640x640');
					$resize_640x640 = $this->imagemanipulation->resize($param, $image, $watermark);
					
					if ($resize_640x640 == 1)
					{
						$param['resize'] = $this->config->item('code_350x350');
						$resize_350x350 = $this->imagemanipulation->resize($param, $image, $watermark, TRUE);
						
						if ($resize_350x350 == 1)
						{
							$photo = UPLOAD_HOST . $type. '/' .$rename_files . '.' . $imageFileType;
							
							$result = array();
							$result['image'] = $photo;
							
							echo json_encode($result);
						}
						else
						{
							return FALSE;
						}
					}
					else
					{
						return FALSE;
					}
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				return $check_all;
			}
		}
		else
		{
			return FALSE;
		}
	}
}
