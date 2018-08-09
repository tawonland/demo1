<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function formx_input($data = '', $value = '', $extra = '', $c_edit = true)
{
    
	if($c_edit)
	{
		return form_input($data, $value , $extra);
	}
	else
	{
		return '<p class="form-control-static">'.$value.'</p>';
	}
	
}

function formx_email($data = '', $value = '', $extra = '', $c_edit = true)
{
    
	if($c_edit)
	{
		return form_email($data, $value , $extra);
	}
	else
	{
		return $value;
	}
	
}


function formx_hidden($data = '', $value = '', $extra = '')
{
	$defaults = array(
		'type' => 'hidden',
		'name' => is_array($data) ? '' : $data,
		'value' => $value
	);

	return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
}