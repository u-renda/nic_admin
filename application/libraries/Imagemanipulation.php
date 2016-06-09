<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagemanipulation
{
	function check_format($param)
	{
		if ($param != "jpg" && $param != "png" && $param != "jpeg" && $param != "gif")
		{
			$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			return $msg;
		}
        else
        {
            return false;
        }
	}
	
	function check_info($param)
	{
		$imageinfo = exif_imagetype($param);
		
		if ($imageinfo != IMAGETYPE_GIF && $imageinfo != IMAGETYPE_JPEG && $imageinfo != IMAGETYPE_PNG)
		{
			$msg = "Sorry, file is invalid.";
			return $msg;
		}
        else
        {
            return false;
        }
	}
	
	function check_size($param)
	{
		if ($param > 2097152) // 2MB
		{
			$msg = "Sorry, your file is too large.";
			return $msg;
		}
        else
        {
            return false;
        }
	}
	
	function resize($param, $resize)
	{
		$CI =& get_instance();
		
		$config['image_library'] = 'gd2';
		$config['new_image'] = $param['fpath'].'29x29/'.$param['rename_files'].".".$param['extension'];
		$config['maintain_ratio'] = FALSE;
		$config['source_image'] = $param['tmp_name'];
		
		if($resize['width'] > $resize['height'])
		{
			$config['width'] = $resize['width'];
			$config['height'] = $resize['height'] * ($resize['width'] / $config['width']);
		}
		else
		{
			$config['height'] = $resize['height'];
			$config['width'] = $resize['width'] * ($resize['height'] / $config['height']);
		}
		
		$CI->image_lib->initialize($config);
		
		if ( ! $CI->image_lib->resize())
		{
			return $CI->image_lib->display_errors();
		}
		else
		{
			return TRUE;
		}
	}
	
	function save($param)
	{
		$CI =& get_instance();
		$CI->load->library('image_lib');
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $param['tmp_name'];
		$config['new_image'] = $param['fpath'].$param['rename_files'].".".$param['extension'];
		
		$CI->image_lib->initialize($config);
		
		if ( ! $CI->image_lib->resize())
		{
			return $CI->image_lib->display_errors();
		}
		else
		{
			return TRUE;
		}
	}
}