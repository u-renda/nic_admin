<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cached_admin')) {
    function cached_admin($param)
    {
		$CI =& get_instance();
		
		$code_admin_role = $CI->config->item('code_admin_role');
		
		$cached = array(
			'id_admin'=> $param->id_admin,
			'username'=> $param->username,
			'email'=> $param->email,
			'admin_initial'=> $param->admin_initial,
			'name'=> $param->name,
			'photo'=> $param->photo,
			'position'=> $param->position,
			'role'=> $code_admin_role[$param->admin_role],
			'is_login' => TRUE
		);
		
		return $cached;
	}
}

if ( ! function_exists('check_image')) {
    function check_image($param)
    {
        $CI =& get_instance();

        // Check if image file is a actual image or fake image
        $check = @getimagesize($param["tmp_name"]);

        if($check === FALSE)
        {
            $msg = "File is not an image.";
            return $msg;
        }
        else
        {
            // Check if file already exists
            if (file_exists($param['tmp_file']))
            {
                $msg = "Sorry, file already exists.";
                return $msg;
            }
            else
            {
                // Check file size
                if ($param["size"] > 2097152) // 2MB
                {
                    $msg = "Sorry, your file is too large.";
                    return $msg;
                }
                else
                {
                    // Allow certain file formats
                    if($param['imageFileType'] != "jpg" && $param['imageFileType'] != "png" && $param['imageFileType'] != "jpeg" && $param['imageFileType'] != "gif" )
                    {
                        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $msg;
                    }
                    else
                    {
                        $param['image_width'] = $check[0];

                        // Save & resize image berdasarkan width-nya
                        $save_resize = save_resize($param, 500);

                        if ($save_resize == TRUE)
                        {
                            $msg = 'true';
                            return $msg;
                        }
                        else
                        {
                            $msg = "Sorry, there was an error uploading your file.";
                            return $msg;
                        }
                    }
                }
            }
        }
    }
}

/*
+-------------------------------------+
    Name: color_event_status
    Purpose: memberikan warna label untuk status yang berbeda
    @param return : colored label
+-------------------------------------+
*/
if ( ! function_exists('color_event_status')) {
	function color_event_status($status)
	{ 
		$CI =& get_instance();
		$code_event_status = $CI->config->item('code_event_status');
		$status_template = $code_event_status[$status];
		
		if ($status == 1)
		{
			$status_template = '<span class="label label-success">'.$code_event_status[$status].'</span>';
		}
		
		return $status_template;
	}
}

/*
+-------------------------------------+
    Name: color_member_status
    Purpose: memberikan warna label untuk status yang berbeda
    @param return : colored label
+-------------------------------------+
*/
if ( ! function_exists('color_member_status')) {
	function color_member_status($status)
	{ 
		$CI =& get_instance();
		$code_member_status = $CI->config->item('code_member_status');
		$status_template = $code_member_status[$status];
		
		if ($status == 1)
		{
			$status_template = '<span class="label label-warning">'.$code_member_status[$status].'</span>';
		}
		elseif ($status == 3)
		{
			$status_template = '<span class="label label-primary">'.$code_member_status[$status].'</span>';
		}
		elseif ($status == 4)
		{
			$status_template = '<span class="label label-success">'.$code_member_status[$status].'</span>';
		}
		
		return $status_template;
	}
}

/*
+-------------------------------------+
    Name: color_order_status
    Purpose: memberikan warna label untuk status yang berbeda
    @param return : colored label
+-------------------------------------+
*/
if ( ! function_exists('color_order_status')) {
	function color_order_status($status)
	{ 
		$CI =& get_instance();
		$code_order_status = $CI->config->item('code_order_status');
		$status_template = '<span class="label label-dark">'.$code_order_status[$status].'</span>';
		
		if ($status == 1)
		{
			$status_template = '<span class="label label-success">'.$code_order_status[$status].'</span>';
		}
		elseif ($status == 2)
		{
			$status_template = '<span class="label label-danger">'.$code_order_status[$status].'</span>';
		}
		elseif ($status == 3)
		{
			$status_template = '<span class="label label-primary">'.$code_order_status[$status].'</span>';
		}
		elseif ($status == 4)
		{
			$status_template = '<span class="label label-dark">'.$code_order_status[$status].'</span>';
		}
		
		return $status_template;
	}
}

/*
+-------------------------------------+
    Name: color_product_status
    Purpose: memberikan warna label untuk status yang berbeda
    @param return : colored label
+-------------------------------------+
*/
if ( ! function_exists('color_product_status')) {
	function color_product_status($status)
	{ 
		$CI =& get_instance();
		$code_product_status = $CI->config->item('code_product_status');
		$status_template = '<span class="label label-default">Normal</span>';
		
		if ($status == 1)
		{
			$status_template = '<span class="label label-success">'.$code_product_status[$status].'</span>';
		}
		elseif ($status == 2)
		{
			$status_template = '<span class="label label-danger">'.$code_product_status[$status].'</span>';
		}
		elseif ($status == 3)
		{
			$status_template = '<span class="label label-primary">'.$code_product_status[$status].'</span>';
		}
		elseif ($status == 4)
		{
			$status_template = '<span class="label label-dark">'.$code_product_status[$status].'</span>';
		}
		
		return $status_template;
	}
}

/*
+-------------------------------------+
    Name: decode
    Purpose: ungenerate value
    @param return : ungenerated value
+-------------------------------------+
*/
if ( ! function_exists('decode')) {
	function decode($value, $key)
	{ 
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($value), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
	}
}

/*
+-------------------------------------+
    Name: encode
    Purpose: generate value
    @param return : generated value
+-------------------------------------+
*/
if ( ! function_exists('encode')) {
	function encode($value, $key)
	{ 
		return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $value, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}
}

/*
+-------------------------------------+
    Name: get_admin
    Purpose: mendapatkan data admin
    @param return : data admin atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('generate_username'))
{
	function generate_username($param)
	{
		$CI =& get_instance();
		
		$username = str_replace(" ", "", ucwords($param->name));
		$username = substr($username, 0, 8);
		$username .= date('md', strtotime($param->birth_date));
		return $username;
	}
}

/*
+-------------------------------------+
    Name: get_admin
    Purpose: mendapatkan data admin
    @param return : data admin atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_admin')) {
    function get_admin($param)
    {
        $CI =& get_instance();
        $CI->load->model('admin_model');

        $query = $CI->admin_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_cached
    Purpose: mendapatkan data cached berdasarkan cookie
    @param return : data cached atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_cached')) {
    function get_cached()
    {
        $CI =& get_instance();

        $cookie = hex2bin($CI->input->cookie('nic_admin', TRUE));

        if(is_array($cookie))
        {
            return $cookie;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_email_template_info
    Purpose: memasukkan data ke email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_email_template_info')) {
    function get_email_template_info($param, $member, $get_member_card = '', $generate_username = '')
    {
        $CI =& get_instance();
        $CI->load->model('member_model');
        $CI->load->model('member_transfer_model');
        $CI->load->model('preferences_model');

        $query = $CI->preferences_model->info($param);
		
        if ($query->code == 200)
        {
            $email_content = $query->result->value;
			
            if ($param['key'] == 'email_req_transfer')
            {
                $query3 = $CI->kota_model->info(array('id_kota' => $member->kota->id_kota));
                $query4 = $CI->preferences_model->info(array('key' => 'unique_trf_id'));
                $registration_fee = $CI->config->item('registration_fee');
                $delivery_cost = '';
                $unique_code = '';

                if ($query3->code == 200)
                {
                    $delivery_cost = $query3->result->price;
                }

                if ($query4->code == 200)
                {
					$query2 = $CI->member_transfer_model->lists(array('id_member' => $member->id_member, 'type' => 1));
					
					if ($query2->count > 0)
					{
						foreach ($query2->result as $row)
						{
							$total = $row->total;
							$unique_code = ltrim(substr($total, -3), 0);
						}
					}
					elseif ($param['from'] == 'create')
					{
						$unique_code = $query4->result->value - 1;
					}
					else
					{
						$unique_code = $query4->result->value;
					}
                }
				
                $content = array();
                $content['member_name'] = ucwords($member->name);
                $content['registration_fee'] = number_format($registration_fee, 0, '', '.');
                $content['delivery_cost'] = number_format($delivery_cost, 0, '', '.');
                $content['unique_code'] = $unique_code;
                $content['total_transfer'] = number_format($registration_fee + $delivery_cost + $unique_code, 0, '', '.');
                $content['link_web_transfer'] = $CI->config->item('link_web_transfer');
            }
			elseif ($param['key'] == 'email_approve_member')
			{
				$content = array();
                $content['member_name'] = ucwords($member->name);
                $content['member_card'] = $get_member_card;
                $content['username'] = $generate_username;
                $content['link_web_nic'] = WEB_HOST;
				
			}
			elseif ($param['key'] == 'email_invalid_data')
			{
				$content = array();
                $content['member_name'] = ucwords($member->name);
                $content['link_reg_invalid'] = $CI->config->item('link_reg_invalid').'?c='.$param['short_code'];
                $content['link_logo_nic'] = $CI->config->item('link_logo_nic');
			}
			
			$content['logo_nic'] = $CI->config->item('logo_nic');
			
			foreach ($content as $key => $value)
			{
				$k = "{" . $key . "}";
				$email_content = str_replace($k, $value, $email_content);
			}

            return $email_content;
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: get_event
    Purpose: mendapatkan data event
    @param return : data event atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_event')) {
    function get_event($param)
    {
        $CI =& get_instance();
        $CI->load->model('event_model');
		
        $query = $CI->event_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_faq
    Purpose: mendapatkan data FAQ
    @param return : data FAQ atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_faq')) {
    function get_faq($param)
    {
        $CI =& get_instance();
        $CI->load->model('faq_model');

        $query = $CI->faq_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_image
    Purpose: mendapatkan data image
    @param return : data image atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_image')) {
    function get_image($param)
    {
        $CI =& get_instance();
        $CI->load->model('image_model');
		
        $query = $CI->image_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_image_album
    Purpose: mendapatkan data image album
    @param return : data image album atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_image_album')) {
    function get_image_album($param)
    {
        $CI =& get_instance();
        $CI->load->model('image_album_model');
		
        $query = $CI->image_album_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_kota
    Purpose: mendapatkan data kota dan ongkir
    @param return : data kota dan ongkir atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_kota')) {
    function get_kota($param)
    {
        $CI =& get_instance();
        $CI->load->model('kota_model');
		
        $query = $CI->kota_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_member
    Purpose: mendapatkan data member
    @param return : data member atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_member')) {
    function get_member($param)
    {
        $CI =& get_instance();
        $CI->load->model('member_model');
		
        $query = $CI->member_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_member_card
    Purpose: mendapatkan data member card
    @param return : data member card
    
    * Format member card
	* 2 digit = bulan lahir
	* 2 digit = tahun lahir
	* 1 digit = jenis kelamin
	* 1 digit = inisial pakai apa daftarnya
	* 1 digit = admin inisial
	* 2 digit = tahun sekarang
	* 5 digit = member number
	*
+-------------------------------------+
*/
if ( ! function_exists('get_member_card'))
{
	function get_member_card($param, $id_admin)
	{
		$CI =& get_instance();
		$CI->load->model('admin_model');
		$CI->load->model('member_model');
		$code_member_gender_initial = $CI->config->item('code_member_gender_initial');
		$query = $CI->admin_model->info(array('id_admin' => $id_admin));
		
		if ($query->code == 200)
		{
			$birth_date = date('my', strtotime($param->birth_date));
			$gender = $code_member_gender_initial[$param->gender];
			$initial = $query->result->admin_initial;
			$year = date('y');
			$get_member_number = get_member_number();
			
			$data = $birth_date.$gender.'W'.$initial.$year.$get_member_number;
			return $data;
		}
		else
		{
			return FALSE;
		}
	}
}

/*
+-------------------------------------+
    Name: get_member_number
    Purpose: mendapatkan no member pada saat approved data
    @param return : no member atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_member_number'))
{
	function get_member_number()
	{
		$CI =& get_instance();
		$CI->load->model('member_model');
		
		$param2 = array();
		$param2['order'] = 'member_number';
		$param2['sort'] = 'desc';
		$param2['limit'] = 1;
		$param2['offset'] = 0;
		$query = $CI->member_model->lists($param2);
		
		if ($query->code == 200)
		{
			$member_number = $query->result[0]->member_number + 1;
			$new_number = str_pad($member_number, 5, 0, STR_PAD_LEFT);
			return $new_number;
		}
		else
		{
			return FALSE;
		}
	}
}

/*
+-------------------------------------+
    Name: get_member_username
    Purpose: mendapatkan data username
    @param return : data username
+-------------------------------------+
*/
//if ( ! function_exists('get_member_username')) {
//    function get_member_username($name)
//    {
//        $CI =& get_instance();
//        
//        $date = date('dm');
//        $name = str_replace(" ", "", $name);
//		$name = substr($name, 0, 8);
//		$username = $name.$date;
//		
//		return $username;
//    }
//}

/*
+-------------------------------------+
    Name: get_order
    Purpose: mendapatkan data order
    @param return : data order atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_order')) {
    function get_order($param)
    {
        $CI =& get_instance();
        $CI->load->model('order_model');
		
        $query = $CI->order_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_post
    Purpose: mendapatkan data post (artikel)
    @param return : data post atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_post')) {
    function get_post($param)
    {
        $CI =& get_instance();
        $CI->load->model('post_model');
		
        $query = $CI->post_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_preferences
    Purpose: mendapatkan data email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_preferences')) {
    function get_preferences($param)
    {
        $CI =& get_instance();
        $CI->load->model('preferences_model');

        $query = $CI->preferences_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_product
    Purpose: mendapatkan data product
    @param return : data product atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_product')) {
    function get_product($param)
    {
        $CI =& get_instance();
        $CI->load->model('product_model');
		
        $query = $CI->product_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_provinsi
    Purpose: mendapatkan data provinsi
    @param return : data provinsi atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_provinsi')) {
    function get_provinsi($param)
    {
        $CI =& get_instance();
        $CI->load->model('provinsi_model');

        $query = $CI->provinsi_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: get_secret_santa
    Purpose: mendapatkan data email template
    @param return : data emal template atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('get_secret_santa')) {
    function get_secret_santa($param)
    {
        $CI =& get_instance();
        $CI->load->model('secret_santa_model');

        $query = $CI->secret_santa_model->lists($param);
		
		if ($query->code == 200)
		{
			return $query;
		}
    }
}

/*
+-------------------------------------+
    Name: is_logged_in
    Purpose: melakukan pengecekan apakah ada user yang login
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI =& get_instance();
        $valid = false;

        $cookie = unserialize(hex2bin($CI->input->cookie('nic_admin', TRUE)));

        if(is_array($cookie))
        {
            $results = $CI->memcached_library->get('ik_lifestyle_'.$cookie['id_user']);

            if($results['is_login'] && $results['salt'] == $cookie['salt'])
            {
                $valid = true;
            }
        }

        return $valid;
    }
}

/*
+-------------------------------------+
    Name: replace_new_line
    Purpose: replace \r\n into HTML tag
    @param return : HTML tag
+-------------------------------------+
*/
if ( ! function_exists('replace_new_line'))
{
    function replace_new_line($param)
    {
        $CI =& get_instance();
		return str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $param);
	}
}

if ( ! function_exists('save_resize'))
{
    function save_resize($param, $width)
    {
        $CI =& get_instance();

        // if everything is ok, try to upload file
        if (move_uploaded_file($param["tmp_name"], $param['target_file']))
        {
            if ($param['image_width'] != $width)
            {
                // Resize image
                $config['image_library'] = 'gd2';
                $config['source_image']	= $param['target_file'];
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $width;

                $CI->load->library('image_lib', $config);

                if ( ! $CI->image_lib->resize())
                {
                    return $CI->image_lib->display_errors();
                }
                else
                {
                    return TRUE;
                }
            }
            else
            {
                return TRUE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}

/*
+-------------------------------------+
    Name: send_email
    Purpose: melakukan pengecekan apakah ada user yang login
    @param return : TRUE atau FALSE
+-------------------------------------+
*/
if ( ! function_exists('send_email')) {
    function send_email($param, $email_content)
    {
        $CI =& get_instance();
		$CI->load->library('email');
		
        $config['useragent'] = 'nezindaclub.com';
        $config['wordwrap'] = FALSE;
        $config['mailtype'] = 'html';
        $CI->email->initialize($config);

        $CI->email->from($CI->config->item('email_admin'), $CI->config->item('title'));
        $CI->email->to($param['email']);
        $CI->email->subject($param['subject']);
        $CI->email->message('<html><head></head><body>'.$email_content.'</body></html>');
		
        $send = $CI->email->send();
		//print_r($CI->email->print_debugger(array('headers')));die();
        return $send;
    }
}
