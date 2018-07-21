<div class="col-md-12">

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_open('welcome/signup'); ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_input(['name' => 'user_firstname', 'placeholder' => 'Nama']); ?>
				<?php echo form_error('user_firstname'); ?>
			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_input(['name' => 'user_email', 'placeholder' => 'Email']); ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_password(['name' => 'user_password', 'placeholder' => 'Password']); ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_password(['name' => 'passconf', 'placeholder' => 'Ulangi Password']); ?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<?php echo form_submit(['name' => 'submit', 'value' => 'Daftar']); ?>
			</div>
		</div>
			<?php echo form_close(); ?>
	</div>
</div>