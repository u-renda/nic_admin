<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reindex extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('reindex_model');
    }
	
	// 1
	function admin_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_admin_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$param2 = array();
					$param2['username'] = trim(strtolower($row->username));
					$param2['password'] = md5(trim($row->password));
					$param2['name'] = trim(strtolower($row->firstname));
					$param2['email'] = trim(strtolower($row->email));
					$param2['photo'] = '';
					$param2['admin_role'] = 1;
					$param2['admin_initial'] = trim(strtoupper($row->admin_initial));
					$param2['created_date'] = $row->create_date;
					$param2['updated_date'] = $row->update_date;
					$create = $this->reindex_model->admin($param2);
					
					// Update Nic_admin
					$update = $this->reindex_model->old_admin_update($row->admin_id, array('cron' => 'bot'));
					$i++;
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 4
	function events_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_events_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$get_nic_post = $this->reindex_model->old_post_info(array('post_id' => $row->post_id));
					
					if ($get_nic_post->num_rows() > 0)
					{
						$post_title = trim(strtolower($get_nic_post->row()->post_title));
						$get_post = $this->reindex_model->post_info(array('title' => $post_title));
						
						if ($get_post->num_rows() > 0)
						{
							$explode = explode(' ', $row->event_date);
							$date = $explode[0];
							
							if ($row->status == 'P')
							{
								$status = 1;
							}
							elseif ($row->status == 'D')
							{
								$status = 2;
							}
							else
							{
								$status = 3;
							}
							
							$param2 = array();
							$param2['id_post'] = $get_post->row()->id_post;
							$param2['title'] = $get_post->row()->title;
							$param2['date'] = $date;
							$param2['status'] = $status;
							$param2['created_date'] = $row->create_date;
							$param2['updated_date'] = $row->update_date;
							$create = $this->reindex_model->events($param2);
							$i++;
							
							// Update Nic_event
							$update = $this->reindex_model->old_events_update($row->event_id, array('cron' => 'bot'));
						}
					}
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 5
	function faq_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_faq_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$question = '';
					$answer = '';
					if ($row->faq_category == 'N')
					{
						$category = 2;
					}
					else
					{
						$category = 1;
					}
					
					if ($row->faq_type == 'Q')
					{
						$question = trim(strtolower($row->faq_content));
					}
					else
					{
						$answer = trim(strtolower($row->faq_content));
					}
					
					$param2 = array();
					$param2['category'] = $category;
					$param2['question'] = $question;
					$param2['answer'] = $answer;
					$param2['created_date'] = $row->create_date;
					$param2['updated_date'] = $row->update_date;
					$create = $this->reindex_model->faq($param2);
					$i++;
					
					// Update Nic_faq
					$update = $this->reindex_model->old_faq_update($row->faq_id, array('cron' => 'bot'));
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 7
	function kota_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_kota_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$get_nic_provinsi = $this->reindex_model->old_provinsi_info(array('prov_id' => $row->prov_id));
				
					if ($get_nic_provinsi->num_rows() > 0)
					{
						$name = trim(strtolower($get_nic_provinsi->row()->prov_name));
					
						$get_post = $this->reindex_model->provinsi_info(array('provinsi' => $name));
						$id_provinsi = $get_post->row()->id_provinsi;
						
						if ($row->status == 'X')
						{
							$status = 0;
						}
						else
						{
							$status = 1;
						}
						
						$param2 = array();
						$param2['id_provinsi'] = $id_provinsi;
						$param2['kota'] = trim(strtolower($row->city_name));
						$param2['price'] = trim($row->delivery_cost);
						$param2['status'] = $status;
						$param2['created_date'] = date('Y-m-d H:i:s');
						$param2['updated_date'] = date('Y-m-d H:i:s');
						$create = $this->reindex_model->kota($param2);
						$i++;
						
						// Update Delivery_cost
						$update = $this->reindex_model->old_kota_update($row->city_id, array('cron' => 'bot'));
					}
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 10
	function member_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_member_lists($param);

			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
                    // masukkan kota 'jakarta, dki jakarta' untuk semua member
					$get_kota = $this->reindex_model->kota_info(array('kota' => 'jakarta, dki jakarta'));

					$id_kota = $get_kota->row()->id_kota;
					
					if ($row->idcard_type == 'ktp')
					{
						$idcard_type = 1;
					}
					elseif ($row->idcard_type == 'sim')
					{
						$idcard_type = 2;
					}
					elseif ($row->idcard_type == 'passport')
					{
						$idcard_type = 3;
					}
					elseif ($row->idcard_type == 'student_id')
					{
						$idcard_type = 4;
					}
					else
					{
						$idcard_type = 5;
					}
					
					if ($row->gender == 'M')
					{
						$gender = 0;
					}
					else
					{
						$gender = 1;
					}
					
					if ($row->marital_status == 'M')
					{
						$marital_status = 1;
					}
					else
					{
						$marital_status = 0;
					}
					
					if ($row->religion == 'Islam')
					{
						$religion = 1;
					}
					elseif ($row->religion == 'Protestan' || $row->religion == 'kristen protest' || $row->religion == 'Kristen')
					{
						$religion = 2;
					}
					elseif ($row->religion == 'Katolik')
					{
						$religion = 3;
					}
					elseif ($row->religion == 'BUDHA' || $row->religion == 'Buddha')
					{
						$religion = 4;
					}
					elseif ($row->religion == 'Hindu')
					{
						$religion = 5;
					}
					elseif ($row->religion == 'Kongfuchu')
					{
						$religion = 6;
					}
					else
					{
						$religion = 7;
					}
					
					if ($row->shirt_size == 'M')
					{
						$shirt_size = 0;
					}
					else
					{
						$shirt_size = 1;
					}
					
					if ($row->reg_status == 'RV')
					{
						$status = 1;
					}
					elseif ($row->reg_status == 'TR')
					{
						$status = 2;
					}
					elseif ($row->reg_status == 'PR')
					{
						$status = 3;
					}
					elseif ($row->reg_status == 'AP')
					{
						$status = 4;
					}
					elseif ($row->reg_status == 'IV')
					{
						$status = 5;
					}
					else
					{
						$status = 6;
					}
					
					$param2 = array();
					$param2['id_kota'] = $id_kota;
					$param2['name'] = trim(strtolower($row->fullname));
					$param2['email'] = trim(strtolower($row->email));
					$param2['username'] = trim($row->username);
					$param2['password'] = trim($row->password);
					$param2['idcard_type'] = $idcard_type;
					$param2['idcard_number'] = trim($row->idcard_no);
					$param2['idcard_photo'] = trim($row->idscan_path);
					$param2['idcard_address'] = trim(strtolower($row->idcard_address));
					$param2['shipment_address'] = trim(strtolower($row->ship_address));
					$param2['postal_code'] = '';
					$param2['gender'] = $gender;
					$param2['phone_number'] = trim($row->phone_no);
					$param2['birth_place'] = trim(strtolower($row->birth_place));
					$param2['birth_date'] = trim($row->birth_date);
					$param2['marital_status'] = $marital_status;
					$param2['occupation'] = trim(strtolower($row->occupation));
					$param2['religion'] = $religion;
					$param2['shirt_size'] = $shirt_size;
					$param2['photo'] = trim($row->photo_path);
					$param2['status'] = $status;
					$param2['member_number'] = trim($row->queue_num);
					$param2['member_card'] = trim(strtoupper($row->member_id));
					$param2['approved_date'] = $row->approved_date;
					$param2['created_date'] = $row->create_date;
					$param2['updated_date'] = $row->update_date;
					$create = $this->reindex_model->member($param2);
					$i++;
						
					// Update Nic_member
					$update = $this->reindex_model->old_member_update($row->acct_id, array('cron' => 'bot'));
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 11
	function member_transfer_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_member_transfer_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$get_nic_member = $this->reindex_model->old_member_info(array('acct_id' => $row->acct_id));
				
					if ($get_nic_member->num_rows() > 0)
					{
						$fullname = trim(strtolower($get_nic_member->row()->fullname));
					
						$get_member = $this->reindex_model->member_info(array('name' => $fullname));
						$id_member = $get_member->row()->id_member;
					
						$explode = explode(' ', $row->tgl_trf);
						$date = $explode[0];
						
						if ($row->must_trf == 0)
						{
							$status = 0;
						}
						else
						{
							$status = 1;
						}
						
						$param2 = array();
						$param2['id_member'] = $id_member;
						$param2['total'] = trim($row->jml_trf);
						$param2['date'] = $date;
						$param2['photo'] = trim($row->trf_path);
						$param2['account_name'] = trim(strtolower($row->pemilik_rek));
						$param2['other_information'] = trim(strtolower($row->cat_tambahan));
						$param2['type'] = 1;
						$param2['status'] = $status;
						$param2['created_date'] = date('Y-m-d H:i:s');
						$param2['updated_date'] = date('Y-m-d H:i:s');
						$create = $this->reindex_model->member_transfer($param2);
						$i++;
						
						// Update Nic_transfer
						$update = $this->reindex_model->old_member_transfer_update($row->trf_id, array('cron' => 'bot'));
					}
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 8
	function nav_menu_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_nav_menu_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					if ($row->type == 'sidebar')
					{
						$type = 1;
					}
					elseif ($row->type == 'parent')
					{
						$type = 2;
					}
					else
					{
						$type = 3;
					}
					
					$param2 = array();
					$param2['parent_name'] = trim(strtolower($row->parent_name));
					$param2['title'] = trim(strtolower($row->title));
					$param2['url'] = trim(strtolower($row->url));
					$param2['type'] = $type;
					$param2['icon'] = trim(strtolower($row->icon));
					$param2['description'] = trim(strtolower($row->description));
					$param2['status'] = trim($row->status);
					$param2['menu_order'] = trim($row->menu_order);;
					$param2['created_date'] = date('Y-m-d H:i:s');
					$param2['updated_date'] = date('Y-m-d H:i:s');
					$create = $this->reindex_model->nav_menu($param2);
					
					// Update nav_menu_old
					$update = $this->reindex_model->old_nav_menu_update($row->id_nav_menu, array('cron' => 'bot'));
					$i++;
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 9
	function nav_user_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_nav_user_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$get_old_nav_menu = $this->reindex_model->old_nav_menu_info(array('nav_menu_id' => $row->nav_menu_id));
					
					if ($get_old_nav_menu->num_rows() > 0)
					{
						$get_nav_menu = $this->reindex_model->nav_menu_info(array('title' => trim(strtolower($get_old_nav_menu->row()->title))));
						
						$param2 = array();
						$param2['id_nav_menu'] = $get_nav_menu->row()->id_nav_menu;
						$param2['admin_role'] = 1;
						$param2['created_date'] = date('Y-m-d H:i:s');
						$param2['updated_date'] = date('Y-m-d H:i:s');
						$create = $this->reindex_model->nav_user($param2);
						
						// Update nav_user_old
						$update = $this->reindex_model->old_nav_user_update($row->nav_user_id, array('cron' => 'bot'));
						$i++;
					}
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 2
	function post_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_post_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$json_decode = json_decode($row->post_media);
					$media = $json_decode[1];
					
					if ($json_decode[0] == 'image')
					{
						$media_type = 2;
					}
					else
					{
						$media_type = 1;
					}
					
					if ($row->post_type == 'N')
					{
						$type = 2;
					}
					else
					{
						$type = 1;
					}
					
					if ($row->status == 'P')
					{
						$status = 1;
					}
					elseif ($row->status == 'D')
					{
						$status = 2;
					}
					else
					{
						$status = 3;
					}
					
					if ($row->is_event == 'N')
					{
						$event = 0;
					}
					else
					{
						$event = 1;
					}
					
					$param2 = array();
					$param2['title'] = trim(strtolower($row->post_title));
					$param2['slug'] = url_title($param2['title']);;
					$param2['content'] = trim(strtolower($row->post_content));
					$param2['media'] = trim(strtolower($media));
					$param2['media_type'] = $media_type;
					$param2['type'] = $type;
					$param2['status'] = $status;
					$param2['is_event'] = $event;
					$param2['created_date'] = $row->create_date;
					$param2['updated_date'] = $row->update_date;
					$create = $this->reindex_model->post($param2);
					
					// Update Nic_post
					$update = $this->reindex_model->old_post_update($row->post_id, array('cron' => 'bot'));
					$i++;
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
	
	// 3
	function post_archived_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_post_archived_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$get_nic_post = $this->reindex_model->old_post_info(array('post_id' => $row->post_id));
				
					if ($get_nic_post->num_rows() > 0)
					{
						$title = trim(strtolower($get_nic_post->row()->post_title));
					
						$get_post = $this->reindex_model->post_info(array('title' => $title));
						$id_post = $get_post->row()->id_post;
					
						$param2 = array();
						$param2['id_post'] = $id_post;
						$param2['year'] = $row->year;
						$param2['month'] = $row->month;
						$param2['created_date'] = date('Y-m-d H:i:s');
						$param2['updated_date'] = date('Y-m-d H:i:s');
						$create = $this->reindex_model->post_archived($param2);
						$i++;
						
						// Update Nic_archive
						$update = $this->reindex_model->old_post_archived_update($row->post_id, array('cron' => 'bot'));
					}
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}

    // 12
    function preferences_get()
    {
        $this->benchmark->mark('code_start');
        $validation = 'ok';

        $offset = intval(trim($this->input->get('offset')));
        $limit = intval(trim($this->input->get('limit')));

        if ( ! isset($offset))
        {
            $data['offset'] = 'required';
            $validation = 'error';
            $code = 400;
        }

        if ($limit == FALSE)
        {
            $data['limit'] = 'required';
            $validation = 'error';
            $code = 400;
        }

        if ($validation == 'ok')
        {
            $param = array();
            $param['limit'] = $limit;
            $param['offset'] = $offset;

            $get = $this->reindex_model->old_preferences_lists($param);

            if ($get->num_rows() > 0)
            {
                $i = 0;
                foreach ($get->result() as $row)
                {
                    $param2 = array();
                    $param2['key'] = trim(strtolower($row->pref_key));
                    $param2['value'] = trim($row->value);
                    $param2['created_date'] = date('Y-m-d H:i:s');
                    $param2['updated_date'] = date('Y-m-d H:i:s');
                    $create = $this->reindex_model->preferences($param2);
                    $i++;

                    // Update Ind_provinces
                    $update = $this->reindex_model->old_preferences_update($row->pref_id, array('cron' => 'bot'));
                }

                $data = "Berhasil. Total = ".$i;
                $validation = 'ok';
                $code = 200;
            }
            else
            {
                $data = "Selesai";
                $validation = 'error';
                $code = 400;
            }
        }

        $rv = array();
        $rv['message'] = $validation;
        $rv['code'] = $code;
        $rv['result'] = $data;
        $this->benchmark->mark('code_end');
        $rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
        print_r($rv);die();
    }
	
	// 6
	function provinsi_get()
	{
		$this->benchmark->mark('code_start');
		$validation = 'ok';
        
		$offset = intval(trim($this->input->get('offset')));
		$limit = intval(trim($this->input->get('limit')));
		
		if ( ! isset($offset))
		{
			$data['offset'] = 'required';
			$validation = 'error';
			$code = 400;
		}
		
		if ($limit == FALSE)
		{
			$data['limit'] = 'required';
			$validation = 'error';
			$code = 400;
		}
        
		if ($validation == 'ok')
		{
			$param = array();
			$param['limit'] = $limit;
			$param['offset'] = $offset;
			
			$get = $this->reindex_model->old_provinsi_lists($param);
			
			if ($get->num_rows() > 0)
			{
				$i = 0;
				foreach ($get->result() as $row)
				{
					$param2 = array();
					$param2['provinsi'] = trim(strtolower($row->prov_name));
					$param2['created_date'] = date('Y-m-d H:i:s');
					$param2['updated_date'] = date('Y-m-d H:i:s');
					$create = $this->reindex_model->provinsi($param2);
					$i++;
						
					// Update Ind_provinces
					$update = $this->reindex_model->old_provinsi_update($row->prov_id, array('cron' => 'bot'));
				}
				
				$data = "Berhasil. Total = ".$i;
				$validation = 'ok';
				$code = 200;
			}
			else
			{
				$data = "Selesai";
				$validation = 'error';
				$code = 400;
			}
		}
		
		$rv = array();
		$rv['message'] = $validation;
		$rv['code'] = $code;
		$rv['result'] = $data;
		$this->benchmark->mark('code_end');
		$rv['load'] = $this->benchmark->elapsed_time('code_start', 'code_end') . ' seconds';
		print_r($rv);die();
	}
}
