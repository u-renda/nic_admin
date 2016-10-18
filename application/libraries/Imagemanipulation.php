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
	
	function resize($param, $image, $watermark, $small = FALSE)
	{
		$CI =& get_instance();
		$CI->load->library('image_lib');
		
		$fpath = UPLOAD_FOLDER;
		$resize = $param['resize'];
		
		$config['image_library'] = 'gd2';
		$config['new_image'] = $fpath.$param['type'].'/'.$param['rename_files'].$resize['extra'].".".$param['extension'];
		$config['maintain_ratio'] = FALSE;
		
		if ($small == FALSE)
		{
			$config['source_image'] = $image['tmp_name'];
		}
		else
		{
			$get_image = '_640x640';
			$config['source_image'] = $fpath.$param['type'].'/'.$param['rename_files'].$get_image.".".$param['extension'];
		}
		
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
			if ($small == FALSE)
			{
				// crop
				list($image_width, $image_height) = getimagesize($image['tmp_name']);
					
				$config['width'] = $resize['width'];
				$config['height'] = $resize['height'];
				$config['x_axis'] = ($image_width - $config['width']) / 2;
				$config['y_axis'] = ($image_height - $config['height']) / 2;
				
				$CI->image_lib->initialize($config);
				
				if ( ! $CI->image_lib->crop())
				{
					return $CI->image_lib->display_errors();
				}
				else
				{
					if ($watermark == 'true')
					{
						// Watermark Image
						$config['wm_type'] = 'overlay';
						$config['source_image'] = $fpath.$param['type'].'/'.$param['rename_files'].$resize['extra'].".".$param['extension'];
						$config['wm_overlay_path'] = 'assets/images/watermark_white_128.png';
						$config['wm_vrt_alignment'] = 'middle';
						
						$CI->image_lib->initialize($config);
						
						if ( ! $CI->image_lib->watermark())
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
			}
			else
			{
				return TRUE;
			}
		}
	}
	
	function save($image, $param)
	{
		$CI =& get_instance();
		$CI->load->library('image_lib');
		
		$fpath = UPLOAD_FOLDER;
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image['tmp_name'];
		$config['new_image'] = $fpath.$param['type'].'/'.$param['rename_files'].".".$param['extension'];
		
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