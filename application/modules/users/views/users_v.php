<div class="form-group">
  <label for="user_firstname" class="col-sm-2 control-label">Nama</label>

  <div class="col-sm-10">
  	<?php echo form_input(['name' => 'user_firstname', 'class' => 'form-control required', 'placeholder' => 'Nama'], isset($row['user_firstname']) ? $row['user_firstname'] : ''); ?>
	<?php echo form_error('user_firstname'); ?>
  </div>
</div>

<div class="form-group">
  <label for="user_email" class="col-sm-2 control-label">Email</label>

  <div class="col-sm-10">
  	<?php echo form_email(['name' => 'user_email', 'class' => 'form-control', 'placeholder' => 'Email'], isset($row['user_email']) ? $row['user_email'] : ''); ?>
	<?php echo form_error('user_email'); ?>
  </div>
</div>