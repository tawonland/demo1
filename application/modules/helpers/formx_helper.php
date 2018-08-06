<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function formx_input($data = '', $value = '', $extra = '', $c_edit = true)
{
    
	if($c_edit)
	{
		return form_input($data = '', $value = '', $extra = '');
	}
	else
	{
		return $value;
	}
	
}