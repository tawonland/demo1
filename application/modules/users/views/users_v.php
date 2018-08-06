<?php
// echo '<pre>';
// print_r($row);
// echo '</pre>';
?>

<div class="form-group">
  <label for="user_fullname" class="col-sm-2 control-label">Nama Lengkap</label>

  <div class="col-sm-10">
  <?php echo formx_input(['name' => 'user_fullname', 'class' => 'form-control required', 'placeholder' => 'Nama Lengkap'], isset($row['user_fullname']) ? $row['user_fullname'] : '', '', $c_edit); ?>
	<?php echo form_error('user_fulltname'); ?>
  </div>
</div>

<div class="form-group">
  <label for="user_email" class="col-sm-2 control-label">Email</label>

  <div class="col-sm-10">
  	<?php echo formx_email(['name' => 'user_email', 'class' => 'form-control', 'placeholder' => 'Email'], isset($row['user_email']) ? $row['user_email'] : '', '', $c_edit); ?>
	<?php echo form_error('user_email'); ?>
  </div>
</div>