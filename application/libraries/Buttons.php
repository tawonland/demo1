<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Buttons {
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function add($ctl)
	{
      return array('action' => $ctl . '/add', 'class' => 'success', 'icon' => 'fa fa-plus', 'value' => 'Tambah');
  }

	public function back($ctl)
	{
		return array('action' => $ctl, 'class' => 'default', 'icon' => 'fa fa-list', 'value' => 'Daftar');
	}

	public function save($ctl)
	{
		return array('action' => $ctl . '/save', 'class' => 'success', 'icon' => 'fa fa-save', 'value' => 'Simpan');
	}

}

?>
