<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('kota_model');
        $this->load->model('member_model');
        $this->load->model('member_transfer_model');
        $this->load->model('preferences_model');
    }

    function check_email()
    {
        $selfemail = $this->input->post('selfemail');
		$email = $this->input->post('email');
		$get = $this->member_model->info(array('email' => $email));
		
        if ($get->code == 200 && $selfemail != $email)
        {
            $this->form_validation->set_message('check_email', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_idcard_number()
	{
		$selfidcard_number = $this->input->post('selfidcard_number');
		$idcard_number = $this->input->post('idcard_number');
		$get = $this->member_model->info(array('idcard_number' => $idcard_number));
		
        if ($get->code == 200 && $selfidcard_number != $idcard_number)
        {
            $this->form_validation->set_message('check_idcard_number', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = $this->member_model->info(array('name' => $name));
		
        if ($get->code == 200 && $selfname != $name)
        {
            $this->form_validation->set_message('check_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_phone_number()
	{
		$selfphone_number = $this->input->post('selfphone_number');
		$phone_number = $this->input->post('phone_number');
		$get = $this->member_model->info(array('phone_number' => $phone_number));
		
        if ($get->code == 200 && $selfphone_number != $phone_number)
        {
            $this->form_validation->set_message('check_phone_number', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_transfer_photo()
    {
        if (isset($_FILES['transfer_photo']))
        {
            if ($_FILES["transfer_photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["transfer_photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_MEMBER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["transfer_photo"]["name"],PATHINFO_EXTENSION));

                $param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["transfer_photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["transfer_photo"]["size"];

                $check_image = check_image($param2);

                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_transfer_photo', $check_image);
                    return FALSE;
                }
            }
        }
    }
	
	function member_approved()
	{
		$id = $this->input->get_post('id');
        $get = $this->member_model->info(array('id_member' => $id));

        if ($get->code == 200)
        {
			// generate username & nomor member card
			$generate_username = generate_username($get->result);
			$get_member_number = get_member_number();
			$get_member_card = get_member_card($get->result, $this->session->userdata('id_admin'));
				
            $get_template = get_email_template_info(array('key' => 'email_approve_member'), $get->result, $get_member_card, $generate_username);
			
            if ($this->input->post('submit') == TRUE)
            {
				$param = array();
				$param['id_member'] = $id;
				$param['status'] = 4;
				$param['username'] = $generate_username;
				$param['member_number'] = $get_member_number;
				$param['member_card'] = $get_member_card;
				$update = $this->member_model->update($param);

				if ($update->code == 200)
				{
					$response = '?type=success&msg=send email approved to';
				}
				else
				{
					$response = '?type=error&msg=send email approved to';
				}
				
				redirect($this->config->item('link_member_lists').$response);
            }

            $data['email_content'] = $get_template;
            $data['member'] = $get->result;
            $data['view_content'] = 'member/member_approved';
            $this->display_view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
	}

    function member_create()
    {
        $data = array();
        if ($this->input->post('submit') == TRUE)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('idcard_type', 'tipe ID', 'required');
			$this->form_validation->set_rules('idcard_number', 'nomor ID', 'required|numeric|callback_check_idcard_number');
			$this->form_validation->set_rules('name', 'nama', 'required|callback_check_name');
			$this->form_validation->set_rules('gender', 'jenis kelamin', 'required');
			$this->form_validation->set_rules('birth_place', 'tempat lahir', 'required');
			$this->form_validation->set_rules('birth_date', 'tanggal lahir', 'required');
			$this->form_validation->set_rules('phone_number', 'nomor telp', 'required|numeric|callback_check_phone_number');
			$this->form_validation->set_rules('idcard_address', 'alamat sesuai ID', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email');
			$this->form_validation->set_rules('shirt_size', 'ukuran baju', 'required');
			$this->form_validation->set_rules('shipment_address', 'alamat pengiriman', 'required');
			$this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
			$this->form_validation->set_rules('id_kota', 'kota', 'required');
			$this->form_validation->set_rules('postal_code', 'kode pos', 'required');
			$this->form_validation->set_rules('idcard_photo', 'ID card foto', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
			$this->form_validation->set_rules('photo', 'foto diri', 'required', array('required' => '%s harus diisi. Pastikan Anda sudah membaca cara upload foto.'));
			
			if ($this->form_validation->run() == FALSE)
			{
				$response =  array('msg' => validation_errors(), 'type' => 'error');
				echo json_encode($response);
				exit();
			}
			else
			{
				$param = array();
				$param['id_kota'] = $this->input->post('id_kota');
				$param['id_admin'] = $this->session->userdata('id_admin');
				$param['name'] = $this->input->post('name');
				$param['email'] = $this->input->post('email');
				$param['idcard_type'] = $this->input->post('idcard_type');
				$param['idcard_number'] = $this->input->post('idcard_number');
				$param['idcard_address'] = $this->input->post('idcard_address');
				$param['shipment_address'] = $this->input->post('shipment_address');
				$param['postal_code'] = $this->input->post('postal_code');
				$param['gender'] = $this->input->post('gender');
				$param['phone_number'] = $this->input->post('phone_number');
				$param['birth_place'] = $this->input->post('birth_place');
				$param['birth_date'] = date('Y-m-d', strtotime($this->input->post('birth_date')));
				$param['shirt_size'] = $this->input->post('shirt_size');
				$param['status'] = 4;
				$param['idcard_photo'] = $this->input->post('idcard_photo');
				$param['photo'] = $this->input->post('photo');
				$param['notes'] = $this->input->post('notes');
				$query = $this->member_model->create($param);
				
				if ($query->code == 200)
				{
					// get harga transfer
					$query2 = $this->kota_model->info(array('id_kota' => $param['id_kota']));
					
					// create member transfer
					$param2 = array();
					$param2['id_member'] = $query->result->id_member;
					$param2['name'] = $param['name'];
					$param2['total'] = $this->config->item('registration_fee') + $query2->result->price;
					$param2['status'] = 1;
					$param2['type'] = 1;
					$query3 = $this->member_transfer_model->create($param2);
					
					$response =  array('msg' => 'Create data success', 'type' => 'success', 'location' => $this->config->item('link_member_transfer_edit').'?id='.$query3->result->id_member_transfer);
				}
				else
				{
					$response =  array('msg' => 'Create data failed', 'type' => 'error');
				}
				
				echo json_encode($response);
				exit();
			}
		}
		
		$data['provinsi_lists'] = get_provinsi(array('limit' => 40))->result;
		$data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
		$data['code_member_gender'] = $this->config->item('code_member_gender');
		$data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
        $data['view_content'] = 'member/member_create';
        $this->load->view('templates/frame', $data);
    }

    function member_delete()
    {
        $data = array();
        $data['id'] = $this->input->post('id');
        $data['action'] = $this->input->post('action');
        $data['grid'] = $this->input->post('grid');

        $get = $this->member_model->info(array('id_member' => $data['id']));

        if ($get->code == 200)
        {
            if ($this->input->post('delete'))
            {
                $param1 = array();
                $param1['id_member'] = $data['id'];
                $query = $this->member_model->delete($param1);

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

    function member_edit()
    {
        $id = $this->input->get_post('id');
        $get = $this->member_model->info(array('id_member' => $id));
		$data = array();
		
        if ($get->code == 200)
        {
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_member_email');
                $this->form_validation->set_rules('idcard_type', 'ID card type', 'required');
                $this->form_validation->set_rules('idcard_number', 'ID card number', 'required|numeric');
                $this->form_validation->set_rules('idcard_address', 'ID card address', 'required');
                $this->form_validation->set_rules('idcard_photo', 'ID card photo', 'callback_check_idcard_photo');
                $this->form_validation->set_rules('shipment_address', 'shipment address', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                $this->form_validation->set_rules('postal_code', 'postal code', 'required|numeric');
                $this->form_validation->set_rules('phone_number', 'phone number', 'required|numeric');
                $this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
                $this->form_validation->set_rules('id_kota', 'kota', 'required');
                $this->form_validation->set_rules('birth_place', 'birth place', 'required');
                $this->form_validation->set_rules('birth_date', 'birth date', 'required');
                $this->form_validation->set_rules('shirt_size', 'shirt size', 'required');
                $this->form_validation->set_rules('photo', 'photo', 'callback_check_photo');
                $this->form_validation->set_rules('status', 'status', 'required');
				
				if ($this->input->post('status') == 3)
				{
					$this->form_validation->set_rules('transfer_photo', 'transfer photo', 'callback_check_transfer_photo');
					$this->form_validation->set_rules('transfer_date', 'transfer date', 'required');
					$this->form_validation->set_rules('account_name', 'account name', 'required');
				}
				
                if ($this->form_validation->run() == TRUE)
                {
                    $param = array();
                    $photo = '';
                    $idcard_photo = '';

                    if (isset($_FILES['photo']))
                    {
                        if ($_FILES["photo"]["error"] == 0)
                        {
                            $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                            $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));
                            $photo = UPLOAD_MEMBER_HOST . $name . '.' . $imageFileType;
                        }
                    }

                    if (isset($_FILES['idcard_photo']))
                    {
                        if ($_FILES["idcard_photo"]["error"] == 0)
                        {
                            $name = md5(basename($_FILES["idcard_photo"]["name"]) . date('Y-m-d H:i:s'));
                            $imageFileType = strtolower(pathinfo($_FILES["idcard_photo"]["name"],PATHINFO_EXTENSION));
                            $idcard_photo = UPLOAD_MEMBER_HOST . $name . '.' . $imageFileType;
                        }
                    }
					
					if ($this->input->post('status') == 3)
					{
						if ($_FILES["transfer_photo"]["error"] == 0)
                        {
                            $name = md5(basename($_FILES["transfer_photo"]["name"]) . date('Y-m-d H:i:s'));
                            $imageFileType = strtolower(pathinfo($_FILES["transfer_photo"]["name"],PATHINFO_EXTENSION));
                            $transfer_photo = UPLOAD_MEMBER_HOST . $name . '.' . $imageFileType;
                        }
						
						$param['other_information'] = $this->input->post('other_information');
						$param['account_name'] = $this->input->post('account_name');
						$param['transfer_date'] = date('Y-m-d', strtotime($this->input->post('transfer_date')));
						$param['transfer_photo'] = $transfer_photo;
					}

                    $param['id_member'] = $id;
                    $param['id_admin'] = $this->session->userdata('id_admin');
                    $param['id_kota'] = $this->input->post('id_kota');
                    $param['name'] = $this->input->post('name');
                    $param['email'] = $this->input->post('email');
					$param['idcard_type'] = $this->input->post('idcard_type');
                    $param['idcard_number'] = $this->input->post('idcard_number');
                    $param['idcard_address'] = $this->input->post('idcard_address');
                    $param['idcard_photo'] = $idcard_photo;
                    $param['shipment_address'] = $this->input->post('shipment_address');
                    $param['gender'] = $this->input->post('gender');
                    $param['postal_code'] = $this->input->post('postal_code');
                    $param['phone_number'] = $this->input->post('phone_number');
                    $param['birth_place'] = $this->input->post('birth_place');
                    $param['birth_date'] = date('Y-m-d', strtotime($this->input->post('birth_date')));
                    $param['marital_status'] = $this->input->post('marital_status');
                    $param['occupation'] = $this->input->post('occupation');
                    $param['religion'] = $this->input->post('religion');
                    $param['shirt_size'] = $this->input->post('shirt_size');
                    $param['photo'] = $photo;
                    $param['status'] = $this->input->post('status');
                    $param['username'] = $this->input->post('username');
                    $param['member_number'] = $this->input->post('member_number');
                    $param['member_card'] = $this->input->post('member_card');
                    $param['notes'] = $this->input->post('notes');
					
                    if ($this->input->post('password') != '')
                    {
                        $param['password'] = $this->input->post('password');
                    }
					
                    $query = $this->member_model->update($param);
					
                    if ($query->code == 200)
                    {
						$response = '?type=success&msg=edit';
                    }
                    else
                    {
                        $response = '?type=error&msg=edit';
                    }
					
					redirect($this->config->item('link_member_lists').$response);
                }
            }
			
			// Get provinsi from id_kota
			$kota_info = '';
			$query6 = $this->kota_model->info(array('id_kota' => $get->result->kota->id_kota));
			
			if ($query6->code == 200)
			{
				$kota_info = $query6->result;
			}
			
			// Get member transfer
			$member_transfer = array();
			$query2 = $this->member_transfer_model->lists(array('id_member' => $id, 'type' => 1));
			
			if ($query2->code == 200)
			{
				foreach ($query2->result as $row)
				{
					$member_transfer['id_member_transfer'] = $row->id_member_transfer;
					$member_transfer['total'] = $row->total;
					$member_transfer['resi'] = $row->resi;
					$member_transfer['photo'] = $row->photo;
					$member_transfer['other_information'] = $row->other_information;
					$member_transfer['date'] = $row->date;
					$member_transfer['account_name'] = $row->account_name;
				}
			}
			
            $data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
            $data['code_member_gender'] = $this->config->item('code_member_gender');
            $data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
            $data['code_member_religion'] = $this->config->item('code_member_religion');
            $data['code_member_status'] = $this->config->item('code_member_status');
            $data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
            $data['provinsi_lists'] = get_provinsi(array('limit' => 40))->result;
            $data['member'] = $get->result;
            $data['kota'] = $kota_info;
            $data['kota_lists'] = get_kota(array('limit' => 200, 'id_provinsi' => $data['kota']->provinsi->id_provinsi))->result;
			$data['member_transfer'] = (object) $member_transfer;
            $data['view_content'] = 'member/member_edit';
            $this->display_view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }

    function member_get()
    {
        $page = $this->input->post('page') ? $this->input->post('page') : 1;
        $pageSize = $this->input->post('pageSize') ? $this->input->post('pageSize') : 20;
        $offset = ($page - 1) * $pageSize;
        $i = $offset * 1 + 1;
        $order = 'member_number';
        $sort = 'desc';
        $q = '';
        $id_card_type = $this->input->post('id_card_type');
        $religion = $this->input->post('religion');
        $status = $this->input->post('status');
        $marital_status = $this->input->post('marital_status');
        $shirt_size = $this->input->post('shirt_size');
        $gender = $this->input->post('gender');
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

        $code_member_shirt_size = $this->config->item('code_member_shirt_size');
        $get = get_member(array('idcard_type' => $id_card_type, 'religion' => $religion, 'status' => $status, 'gender' => $gender, 'marital_status' => $marital_status, 'shirt_size' => $shirt_size, 'q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => strtolower($order), 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" id="'.$row->id_member.'" class="view '.$row->id_member.'-view" href="#"><i class="fa fa-folder-open fontblue font18"></i></a>&nbsp;
                        <a title="Edit" href="member_edit?id='.$row->id_member.'" id="'.$row->id_member.'" class="edit '.$row->id_member.'-edit"><i class="fa fa-pencil fontorange font18"></i></a>&nbsp;';

            if ($row->status != 6)
            {
                $action .= '<a title="Delete" id="'.$row->id_member.'" class="delete '.$row->id_member.'-delete" href="#"><i class="fa fa-times fontred font18"></i></a>';
            }

            $status_template = color_member_status($row->status);
            $approved_date = '-';
            $member_card = '-';
            $member_number = '-';
			
            if ($row->approved_date != '0000-00-00 00:00:00' && $row->approved_date != '' && $row->approved_date != null)
            {
                $approved_date = date('d M Y', strtotime($row->approved_date));
            }
            
            if ($row->member_card != '')
            {
                $member_card = strtoupper($row->member_card);
            }
            
            if ($row->member_number != '00000')
            {
                $member_number = $row->member_number;
            }
            
            $entry = array(
                'No' => $i,
                'Name' => ucwords($row->name),
                'MemberCard' => $member_card,
                'ShirtSize' => $code_member_shirt_size[$row->shirt_size],
                'MemberNumber' => $member_number,
                'Status' => $status_template,
                'ApprovedDate' => $approved_date,
                'Action' => $action
            );
            
            $jsonData['results'][] = $entry;
            $i++;
        }

        echo json_encode($jsonData);
    }

    function member_invalid()
    {
        $id = $this->input->get_post('id');
        $get = $this->member_model->info(array('id_member' => $id));

        if ($get->code == 200)
        {
            $get_template = get_email_template_info(array('key' => 'email_invalid_data'), $get->result);
			
            if ($this->input->post('submit') == TRUE)
            {
				$update = $this->member_model->update(array('id_member' => $id, 'status' => 2));

				if ($update->code == 200)
				{
					$response = '?type=success&msg=send email invalid to';
				}
				else
				{
					$response = '?type=error&msg=send email invalid to';
				}
				
				redirect($this->config->item('link_member_lists').$response);
            }

            $data['email_content'] = $get_template;
            $data['member'] = $get->result;
            $data['view_content'] = 'member/member_invalid';
            $this->display_view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }

	function member_lists()
	{
        $data = array();
		$type = $this->input->get('type') ? $this->input->get('type') : '';
		$msg = $this->input->get('msg') ? $this->input->get('msg') : '';
		
        $data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
        $data['code_member_religion'] = $this->config->item('code_member_religion');
        $data['code_member_status'] = $this->config->item('code_member_status');
        $data['code_member_gender'] = $this->config->item('code_member_gender');
        $data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
        $data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
        $data['gender'] = $this->input->get_post('gender');
        $data['status'] = $this->input->get_post('status');
		$data['alert_type'] = $type;
		$data['alert_msg'] = $msg;
        $data['view_content'] = 'member/member_lists';
        $this->display_view('templates/frame', $data);
	}

    function member_request_transfer()
    {
        $id = $this->input->get_post('id');
        $from = $this->input->get_post('from');
        $get = $this->member_model->info(array('id_member' => $id));

        if ($get->code == 200)
        {
            $get_template = get_email_template_info(array('key' => 'email_req_transfer', 'from' => $from), $get->result);
			
            if ($this->input->post('submit') == TRUE)
            {
				$update = $this->member_model->update(array('id_member' => $id, 'status' => 2));

				if ($update->code == 200)
				{
					$response = '?type=success&msg=send email request transfer to';
				}
				else
				{
					$response = '?type=error&msg=send email request transfer to';
				}
				
				redirect($this->config->item('link_member_lists').$response);
            }

            $data['email_content'] = $get_template;
            $data['member'] = $get->result;
            $data['view_content'] = 'member/member_request_transfer';
            $this->display_view('templates/frame', $data);
        }
        else
        {
            echo "Data not found";
        }
    }
	
	function member_transfer_edit()
	{
		$data = array();
		$data['id'] = $this->input->get_post('id');
		
		$query = $this->member_transfer_model->info(array('id_member_transfer' => $data['id']));
		
		if ($query->code == 200)
		{
			if ($this->input->post('submit') == TRUE)
            {
				$this->load->library('form_validation');
                $this->form_validation->set_rules('date', 'date', 'required');
                $this->form_validation->set_rules('status', 'status', 'required');
                $this->form_validation->set_rules('account_name', 'pemilik rekening', 'required');
				$this->form_validation->set_rules('photo', 'bukti transfer', 'required');
				
				if ($this->form_validation->run() == TRUE)
                {
					$param = array();
                    $param['id_member_transfer'] = $data['id'];
                    $param['date'] = $this->input->post('title');
                    $param['status'] = $this->input->post('status');
                    $param['account_name'] = $this->input->post('account_name');
                    $param['photo'] = $this->input->post('photo');
                    $param['resi'] = $this->input->post('resi');
                    $param['other_information'] = $this->input->post('other_information');
					print_r($param);die();
                    $query = $this->member_transfer_model->update($param);
					
					if ($query->code == 200)
					{
						$response =  array('msg' => 'Edit data success', 'type' => 'success', 'location' => $this->config->item('link_member_lists'));
					}
					else
					{
						$response =  array('msg' => 'Edit data failed', 'type' => 'error');
					}
					
					echo json_encode($response);
					exit();
				}
			}
			
			$code_member_transfer_type = $this->config->item('code_member_transfer_type');
			$result = $query->result;
			
			$get = array();
			$get['id_member_transfer'] = $result->id_member_transfer;
			$get['member_name'] = ucwords($result->member->name);
			$get['type'] = $code_member_transfer_type[$result->type];
			$get['name'] = ucwords($result->name);
			$get['total'] = 'Rp '.number_format($result->total, 0, ',', '.');
			$get['status'] = $result->status;
			$get['resi'] = $result->resi;
			$get['account_name'] = $result->account_name;
			$get['other_information'] = $result->other_information;
			
			$data['code_member_transfer_status'] = $this->config->item('code_member_transfer_status');
			$data['member_transfer'] = (object) $get;
			$data['view_content'] = 'member/member_transfer_edit';
            $this->display_view('templates/frame', $data);
		}
		else
		{
			echo "Data not found";
		}
	}
    
    function member_view()
    {
		$id = $this->input->post('id');
		$get = $this->member_model->info(array('id_member' => $id));
		
		if ($get->code == 200)
		{
            $member = $get->result;
            $code_member_idcard_type = $this->config->item('code_member_idcard_type');
            $code_member_gender = $this->config->item('code_member_gender');
            $code_member_marital_status = $this->config->item('code_member_marital_status');
            $code_member_religion = $this->config->item('code_member_religion');
            $code_member_shirt_size = $this->config->item('code_member_shirt_size');
            $code_member_status = $this->config->item('code_member_status');
            
			$religion = '';
			if ($member->religion == TRUE)
			{
				$religion = $code_member_religion[$member->religion];
			}
			
            $data = array();
            $data['name'] = ucwords($member->name);
            $data['email'] = $member->email;
            $data['username'] = $member->username;
            $data['idcard_type'] = $code_member_idcard_type[$member->idcard_type];
            $data['idcard_number'] = $member->idcard_number;
            $data['idcard_photo'] = $member->idcard_photo;
            $data['idcard_address'] = replace_new_line($member->idcard_address);
            $data['shipment_address'] = replace_new_line($member->shipment_address);
            $data['postal_code'] = $member->postal_code;
            $data['gender'] = $code_member_gender[$member->gender];
            $data['phone_number'] = $member->phone_number;
            $data['birth_place'] = ucwords($member->birth_place);
            $data['birth_date'] = date('d M Y', strtotime($member->birth_date));
            $data['marital_status'] = $code_member_marital_status[$member->marital_status];
            $data['occupation'] = ucwords($member->occupation);
            $data['religion'] = $religion;
            $data['shirt_size'] = $code_member_shirt_size[$member->shirt_size];
            $data['photo'] = $member->photo;
            $data['status'] = $code_member_status[$member->status];
            $data['member_card'] = $member->member_card;
            $data['kota'] = ucwords($member->kota->kota);
			$this->load->view('member/member_view', $data);
		}
		else
		{
			echo "Data Not Found";
		}
    }
}
