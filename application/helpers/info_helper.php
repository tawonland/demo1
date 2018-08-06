<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('info'))
{
    function info($var = '')
    {
        
    	$a_info['not_saved'] 		= 'Data gagal disimpan';
    	$a_info['saved'] 			= 'Data berhasil disimpan';
    	$a_info['deleted'] 			= 'Data berhasil dihapus';
    	$a_info['not_deleted'] 		= 'Data gagal dihapus';
    	$a_info['has_no_access'] 	= 'Anda tidak punya hak akses ke halaman ini';

    	return $a_info[$var];
    }   
}