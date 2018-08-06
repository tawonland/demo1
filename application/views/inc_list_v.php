

<div class="row">
	<div class="col-md-12">
		
	</div>
</div>		
<div class="row">
	<div class="col-md-12">
		
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border">
				<ul class="list-inline ">
				<?php
					
				  ?>
				    <li>
				    	<a class="btn btn-success" href="<?php echo base_url().$ctl; ?>/add"><i class="fa fa-plus"></i> Tambah</a>
				    </li>
				  <?php
				
				?>
				</ul>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control " placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>             

			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php 
				echo form_open('', array('id' => 'form_list')); 
				echo formx_hidden(['id' => 'key', 'name' => 'key']);
			?>

			<div class="box-body table-responsive no-padding">
				<?php

				$msg = $this->session->flashdata('success');

				if(isset($msg)){
					echo '<div class="row">';
						echo '<div class="col-md-12">';
					    	echo '<div class="alert alert-success">'.$msg.'</div>';
					    echo '</div>';
				    echo '</div>';
				}

				$err = $this->session->flashdata('danger');

				if(isset($err)){
					echo '<div class="row">';
						echo '<div class="col-md-12">';
					    	echo '<div class="alert alert-danger">'.$err.'</div>';
					    echo '</div>';
				    echo '</div>';
				}

				echo $table_generate;

				?>
			</div>
			<!-- /.box-body -->
			<?php echo form_close(); ?>

			<div class="box-footer clearfix">
              	<?php
				// echo '<pre>';
				// print_r($pagination);
				// echo '</pre>';

				echo $pagination;
				?>
            </div>
			<!-- /.box-footer -->
		</div>
		<!-- /.box -->
	</div>
<div class="row">

<script type="text/javascript">

var formlist;
var base_url = '<?=base_url($ctl)?>';

$(document).ready(function () {
    formlist = $("#form_list");

});

$("[data-type='detail']").click(function () {
    if (typeof (list) != "undefined")
        sessionStorage.setItem(detpage + ".list", list);

    location.href = base_url + "/detail/" + $(this).attr("data-id");
});

$("[data-type='edit']").click(function () {
    if (typeof (list) != "undefined")
        sessionStorage.setItem(detpage + ".list", list);

    location.href = base_url + "/edit/" + $(this).attr("data-id");
});

$("[data-type='delete']").click(function () {
    id = $(this).attr("data-id");
    thisdata = this;
    bootbox.confirm("Apakah anda yakin akan menghapus data ini?", function (result) {
        if (result) {
            formlist.find("#key").val(id);
            formlist.attr("action", base_url + "/delete");
	        goSubmit(thisdata, "delete");
        }
    });
});

</script>