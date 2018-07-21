<div class="row">
	<div class="col-md-12">
		<ul class="list-inline pull-right">
		<?php
		
		  ?>
		    <li>
		    	<a class="btn btn-success" data-type="save"><i class="fa fa-save"></i> Simpan</a>
		    </li>
		  <?php
		
		?>
		</ul>
	</div>
</div>


<div class="col-md-12">
	<div class="row">

    <div class="col-md-12">
			<div class="form-group">
				<?php echo form_open_multipart($ctl.'/save', array('id' => 'form_data')); ?>
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
        <?php echo form_close(); ?>
			</div>
		</div>

  </div>
</div>
<script type="text/javascript">

$(document).ready(function () {
	$("[data-type='save']").click(function () {
	    alert('a');
	});
})

</script>
