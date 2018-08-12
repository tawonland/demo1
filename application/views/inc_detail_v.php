<?php

$err_msg = $this->session->flashdata('error');

if(isset($err_msg)){
	echo '<div class="row">';
		echo '<div class="col-md-12">';
	    	echo '<div class="alert alert-danger">'.$err_msg.'</div>';
	    echo '</div>';
    echo '</div>';
}

// var_dump($c_update);

// die();

?>
<div class="row">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
			  	<ul class="list-inline text-center">
				    <li>
				    	<a class="btn btn-info" href="<?php echo base_url().$ctl; ?>"><i class="fa fa-list"></i> Kembali ke Daftar</a>
				    </li>
				    <?php
						if($c_update)
						{
						?>
					    <li>
					    	<a class="btn btn-warning" href="<?php echo base_url().$ctl.'/edit/'.$id; ?>"><i class="fa fa-pencil"></i> Edit</a>
					    </li>
					    <?php
					    }
					    if($c_delete)
						{
						?>
					    <li>
					    	<button type="button" class="btn btn-danger" data-type="delete">
							<i class="fa fa-trash"></i> Hapus</button>
					    </li>
					    <?php
					    }
				    ?>
				</ul>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open_multipart($form_action, array('id' => 'form_data', 'class' => 'form-horizontal')); ?>
			<div class="box-body">
				<?php
					echo formx_hidden(['id' => 'key', 'name' => 'key', 'value' => $id]);
					$this->load->view($form_data);
				?>
			</div>
			<div class="box-footer">

			</div>
			<!-- /.box-footer -->

			  <!-- /.box-footer -->
			<?php echo form_close(); ?>
		</div>
		<!-- /.box -->
	</div>
</div>

<script type="text/javascript">
	var formdata;
	var base_url = '<?=base_url($ctl)?>';

	$(document).ready(function () {
	    formdata = $("#form_data");
	});

	$("[data-type='delete']").click(function () {
	    bootbox.confirm("Apakah anda yakin akan menghapus data ini?", function (result) {
	        if (result) {
	            formdata.attr("action", base_url + "/delete");
		        goSubmit(formdata, "delete");
	        }
	    });
	});

</script>