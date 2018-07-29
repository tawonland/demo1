<?php

$err_msg = $this->session->flashdata('error');

if(isset($err_msg)){
	echo '<div class="row">';
		echo '<div class="col-md-12">';
	    	echo '<div class="alert alert-danger">'.$err_msg.'</div>';
	    echo '</div>';
    echo '</div>';
}

// if(isset($row)){
// 	echo '<pre>';
// 	print_r($row);
// }

?>
<div class="row">
	<div class="col-md-12">
		
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
			  <h3 class="box-title"></h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open_multipart($form_action, array('id' => 'form_data', 'class' => 'form-horizontal')); ?>
			<div class="box-body">
				<?php
					$this->load->view($form_data);
				?>
			</div>
			<div class="box-footer">
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-info pull-right">Simpan</button>
			</div>
			<!-- /.box-footer -->

			  <!-- /.box-footer -->
			<?php echo form_close(); ?>
		</div>
		<!-- /.box -->
	</div>
<div class="row">

