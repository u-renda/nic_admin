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

    function check_idcard_photo()
    {
        if (isset($_FILES['idcard_photo']))
        {
            if ($_FILES["idcard_photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["idcard_photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_MEMBER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["idcard_photo"]["name"],PATHINFO_EXTENSION));

                $param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["idcard_photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["idcard_photo"]["size"];

                $check_image = check_image($param2);

                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_idcard_photo', $check_image);
                    return FALSE;
                }
            }
        }
    }

    function check_member_email()
    {
        $selfemail = $this->input->post('selfemail');
		$email = $this->input->post('email');
		$get = $this->member_model->info(array('email' => $email));
		
        if ($get->code == 200 && $selfemail != $email)
        {
            $this->form_validation->set_message('check_member_email', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_member_idcard_number()
	{
		$selfidcard_number = $this->input->post('selfidcard_number');
		$idcard_number = $this->input->post('idcard_number');
		$get = $this->member_model->info(array('idcard_number' => $idcard_number));
		
        if ($get->code == 200 && $selfidcard_number != $idcard_number)
        {
            $this->form_validation->set_message('check_member_idcard_number', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_member_name()
	{
		$selfname = $this->input->post('selfname');
		$name = $this->input->post('name');
		$get = $this->member_model->info(array('name' => $name));
		
        if ($get->code == 200 && $selfname != $name)
        {
            $this->form_validation->set_message('check_member_name', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_member_phone_number()
	{
		$selfphone_number = $this->input->post('selfphone_number');
		$phone_number = $this->input->post('phone_number');
		$get = $this->member_model->info(array('phone_number' => $phone_number));
		
        if ($get->code == 200 && $selfphone_number != $phone_number)
        {
            $this->form_validation->set_message('check_member_phone_number', '%s already exist');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function check_photo()
    {
        if (isset($_FILES['photo']))
        {
            if ($_FILES["photo"]["error"] == 0)
            {
                $name = md5(basename($_FILES["photo"]["name"]) . date('Y-m-d H:i:s'));
                $target_dir = UPLOAD_MEMBER_HOST;
                $imageFileType = strtolower(pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION));

                $param2 = array();
                $param2['target_file'] = UPLOAD_FOLDER . $name . '.' . $imageFileType;
                $param2['imageFileType'] = $imageFileType;
                $param2['tmp_name'] = $_FILES["photo"]["tmp_name"];
                $param2['tmp_file'] = $target_dir . $name . '.' . $imageFileType;
                $param2['size'] = $_FILES["photo"]["size"];

                $check_image = check_image($param2);

                if ($check_image == 'true')
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('check_photo', $check_image);
                    return FALSE;
                }
            }
        }
    }

    function member_create()
    {
        $data = array();
        if ($this->input->post('submit') == TRUE)
        {
            $this->load->helper('string');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required|callback_check_member_name');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_member_email');
            $this->form_validation->set_rules('idcard_type', 'ID card type', 'required');
            $this->form_validation->set_rules('idcard_number', 'ID card number', 'required|numeric|callback_check_member_idcard_number');
            $this->form_validation->set_rules('idcard_address', 'ID card address', 'required');
            $this->form_validation->set_rules('idcard_photo', 'ID card photo', 'callback_check_idcard_photo');
            $this->form_validation->set_rules('shipment_address', 'shipment address', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');
            $this->form_validation->set_rules('postal_code', 'postal code', 'required|numeric');
            $this->form_validation->set_rules('phone_number', 'phone number', 'required|numeric|callback_check_member_phone_number');
            $this->form_validation->set_rules('id_provinsi', 'provinsi', 'required');
            $this->form_validation->set_rules('id_kota', 'kota', 'required');
            $this->form_validation->set_rules('birth_place', 'birth place', 'required');
            $this->form_validation->set_rules('birth_date', 'birth date', 'required');
            $this->form_validation->set_rules('marital_status', 'marital status', 'required');
            $this->form_validation->set_rules('occupation', 'occupation', 'required');
            $this->form_validation->set_rules('religion', 'religion', 'required');
            $this->form_validation->set_rules('shirt_size', 'shirt size', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('photo', 'photo', 'callback_check_photo');
			
            if ($this->form_validation->run() == TRUE)
            {
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
                
                $username = '';
                $member_number = '';
                $member_card = '';
                $member_card = '';
                $approved_date = '';
                if ($this->input->post('status') == 4) // 4 = approved
                {
                    $member_number = get_member_number();
                
                    $param2 = array();
                    $param2['birth_date'] = $this->input->post('birth_date');
                    $param2['member_number'] = $member_number;
                    $param2['gender'] = $this->input->post('gender');
                    
                    $member_card = get_member_card($param2);
                    $username = get_member_username(strtolower($this->input->post('name')));
                    $approved_date = date('Y-m-d H:i:s');
                }
                
                $param = array();
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
                $param['username'] = $username;
                $param['password'] = random_string('alnum', 8);
                $param['member_number'] = $member_number;
                $param['member_card'] = $member_card;
                $param['approved_date'] = $approved_date;
                $query = $this->member_model->create($param);
                
                if ($query->code == 200)
                {
                    // create member transfer
                    $query3 = $this->kota_model->info(array('id_kota' => $this->input->post('kota')));
                    $ongkir = 0;
                    
                    if ($query3->code == 200)
                    {
                        $ongkir = $query3->result->price;
                    }
                    
                    $param3 = array();
                    $param3['id_member'] = $query->result->id_member;
                    $param3['total'] = $this->config->item('registration_fee') + $ongkir;
                    $param3['date'] = date('Y-m-d');
                    $param3['photo'] = '-';
                    $param3['account_name'] = '-';
                    $param3['other_information'] = 'Pendaftaran on the spot - cash';
                    $param3['type'] = 1;
                    $param3['status'] = 2;
                    $param3['created_date'] = date('Y-m-d H:i:s');
                    $param3['updated_date'] = date('Y-m-d H:i:s');
                    $query2 = $this->member_transfer_model->create($param3);
                    
                    if ($query2->code == 200)
                    {
                        $response = '?type=success';
                    }
                    else
                    {
                        $response = '?type=error';
                    }
                    
                    redirect($this->config->item('link_member_lists').$response);
                }
                else
                {
                    $data['error'] = $query->result;
                }
            }
        }

        $data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
        $data['code_member_gender'] = $this->config->item('code_member_gender');
        $data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
        $data['code_member_religion'] = $this->config->item('code_member_religion');
        $data['code_member_status'] = $this->config->item('code_member_status');
        $data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
        $data['provinsi_lists'] = get_provinsi(array('limit' => 40))->result;
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

        if ($get->code == 200)
        {
            $kota_info = $this->kota_model->info(array('id_kota' => $get->result->id_kota));
            $member_transfer = $this->member_transfer_model->info(array('id_member' => $id, 'type' => 1));
            
            if ($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name', 'name', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_check_email_edit');
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
                $this->form_validation->set_rules('marital_status', 'marital status', 'required');
                $this->form_validation->set_rules('occupation', 'occupation', 'required');
                $this->form_validation->set_rules('religion', 'religion', 'required');
                $this->form_validation->set_rules('shirt_size', 'shirt size', 'required');
                $this->form_validation->set_rules('photo', 'photo', 'callback_check_photo');
                $this->form_validation->set_rules('status', 'status', 'required');

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

                    $param['id_member'] = $id;
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

                    if ($this->input->post('password') != '')
                    {
                        $param['password'] = md5($this->input->post('password'));
                    }
                    
                    // Merubah beberapa data jika status berubah
                    if ($this->input->post('status') == 1) // awaiting review
                    {
                        // Kosongkan username & password
                        $param['username'] = '';
                        $param['password'] = '';
                        
                        // Delete member transfer jika ada
                        if ($member_transfer->code == 200)
                        {
                            $query3 = $this->member_transfer_model->delete(array('id_member_transfer' => $query2->result->id_member_transfer));
                        }
                    }
                    elseif ($this->input->post('status') == 2) // awaiting transfer
                    {
                        // Kosongkan username & password
                        $param['username'] = '';
                        $param['password'] = '';
                        
                        // Ubah jumlah transfer, sesuai dengan data yang udah di update
                        if ($member_transfer->code == 200)
                        {
                            // Get kode unik transfer
                            $query4 = $this->preferences_model->info(array('key' => 'unique_trf_id'));
                            $kode_unik = 0;
                            
                            if ($query4->code == 200)
                            {
                                $kode_unik = $query4->result->value;
                                
                                // Update valuenya
                                $param3 = array();
                                $param3['id_preferences'] = $query4->result->id_preferences;
                                $param3['value'] = $kode_unik + 1;
                                $query5 = $this->preferences_model->update($param3);
                            }
                            
                            $param2 = array();
                            $param2['id_member_transfer'] = $member_transfer->result->id_member_transfer;
                            $param2['total'] = $this->config->item('registration_fee') + $kota_info->result->price + $kode_unik;
                            $param2['status'] = 1;
                            $query2 = $this->member_transfer_model->update($param2);
                        }
                    }
                    elseif ($this->input->post('status') == 2) // awaiting transfer
                    {
                        
                    }
                    
                    $query = $this->member_model->update($param);

                    if ($query->code == 200)
                    {
                        redirect($this->config->item('link_member_lists'));
                    }
                    else
                    {
                        $data['error'] = $query->result;
                    }
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
            $data['kota'] = $kota_info->result;
            $data['kota_lists'] = get_kota(array('limit' => 200, 'id_provinsi' => $data['kota']->id_provinsi))->result;
            $data['member_transfer'] = $member_transfer->result;
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
        $code_member_status = $this->config->item('code_member_status');
        $get = get_member(array('idcard_type' => $id_card_type, 'religion' => $religion, 'status' => $status, 'gender' => $gender, 'marital_status' => $marital_status, 'shirt_size' => $shirt_size, 'q' => $q, 'limit' => $pageSize, 'offset' => $offset, 'order' => $order, 'sort' => $sort));
        $jsonData = array('total' => $get->total, 'results' => array());

        foreach ($get->result as $row)
        {
            $action = '<a title="View Detail" id="'.$row->id_member.'" class="view '.$row->id_member.'-view" href="#"><span class="glyphicon glyphicon-folder-open fontblue font16" aria-hidden="true"></span></a>&nbsp;
                        <a title="Edit" href="member_edit?id='.$row->id_member.'" id="'.$row->id_member.'" class="edit '.$row->id_member.'-edit"><span class="glyphicon glyphicon-pencil fontorange font16" aria-hidden="true"></span></a>&nbsp;';

            if ($row->status != 6)
            {
                $action .= '<a title="Delete" id="'.$row->id_member.'" class="delete '.$row->id_member.'-delete" href="#"><span class="glyphicon glyphicon-remove fontred font16" aria-hidden="true"></span></a>';
            }

            $status_template = $code_member_status[$row->status];

            if ($row->status == 1)
            {
                $status_template = '<span class="label label-warning">'.$code_member_status[$row->status].'</span>';
            }
            elseif ($row->status == 3)
            {
                $status_template = '<span class="label label-primary">'.$code_member_status[$row->status].'</span>';
            }
            elseif ($row->status == 4)
            {
                $status_template = '<span class="label label-success">'.$code_member_status[$row->status].'</span>';
            }
            
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

	function member_lists()
	{
        $type = $this->input->get('type');
        
        if ($type == TRUE)
        {
            
        }
        
        $data = array();
        $data['code_member_idcard_type'] = $this->config->item('code_member_idcard_type');
        $data['code_member_religion'] = $this->config->item('code_member_religion');
        $data['code_member_status'] = $this->config->item('code_member_status');
        $data['code_member_gender'] = $this->config->item('code_member_gender');
        $data['code_member_marital_status'] = $this->config->item('code_member_marital_status');
        $data['code_member_shirt_size'] = $this->config->item('code_member_shirt_size');
        $data['gender'] = $this->input->get_post('gender');
        $data['status'] = $this->input->get_post('status');
        $data['view_content'] = 'member/member_lists';
        $this->display_view('templates/frame', $data);
	}

    function member_request_transfer()
    {
        $id = $this->input->get_post('id');
        $get = $this->member_model->info(array('id_member' => $id));

        if ($get->code == 200)
        {
            $get_template = get_email_template_info(array('key' => 'email_req_transfer'), $get->result);

            if ($this->input->post('submit') == TRUE)
            {
                // send email
                $param = array();
                $param['subject'] = $this->config->item('title').' - Informasi Transfer Membership';
                $param['email'] = $get->result->email;
                $send_email = send_email($param, $get_template);

                if ($send_email == TRUE)
                {
                    $update = $this->member_model->update(array('id_member' => $id, 'status' => 2));

                    if ($update->code == 200)
                    {
                        redirect($this->config->item('link_member_lists'));
                    }
                }
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
            
            $data = array();
            $data['name'] = ucwords($member->name);
            $data['email'] = $member->email;
            $data['username'] = $member->username;
            $data['idcard_type'] = $code_member_idcard_type[$member->idcard_type];
            $data['idcard_number'] = $member->idcard_number;
            $data['idcard_photo'] = $member->idcard_photo;
            $data['idcard_address'] = $member->idcard_address;
            $data['shipment_address'] = $member->shipment_address;
            $data['postal_code'] = $member->postal_code;
            $data['gender'] = $code_member_gender[$member->gender];
            $data['phone_number'] = $member->phone_number;
            $data['birth_place'] = ucwords($member->birth_place);
            $data['birth_date'] = date('d M Y', strtotime($member->birth_date));
            $data['marital_status'] = $code_member_marital_status[$member->marital_status];
            $data['occupation'] = ucwords($member->occupation);
            $data['religion'] = $code_member_religion[$member->religion];
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
