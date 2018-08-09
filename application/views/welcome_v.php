<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
  	.loginbox {
  		margin: 180px auto;
  		width : 450px;
  		position: relative;
  		border-radius: 15px;
  		background: #ffffff;
  	}
  	body{
  		background-color: rgb(209,209,209);
  	}
  </style>
</head>
<body>

<div id="container">
	<div class="box box-info loginbox">
	    <div class="box-header with-border">
	      <h3 class="box-title">Login Form</h3>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <?php echo form_open('welcome/login', array('class' => 'form-horizontal')); ?>
	      <div class="box-body">
	        <div class="form-group">
	          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

	          <div class="col-sm-10">
	          	<?php echo form_input(['name' => 'user_name'], '', ['id' => 'inputEmail3', 'class' => 'form-control', 'placeholder' => 'Email']); ?>
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

	          <div class="col-sm-10">
	            <?php echo form_password(['name' => 'user_password'],'',['class' => 'form-control', 'id' => 'inputPassword3', 'placeholder' => 'Password']); ?>
	          </div>
	        </div>
	        <!-- <div class="form-group">
	          <div class="col-sm-offset-2 col-sm-10">
	            <div class="checkbox">
	              <label>
	                <?php //echo form_checkbox(); ?> Remember me
	              </label>
	            </div>
	          </div>
	        </div> -->
	      </div>
	      <!-- /.box-body -->
	      <div class="box-footer">
	        <button type="submit" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-info pull-right">Sign in</button>
	      </div>
	      <!-- /.box-footer -->
	    <?php echo form_close(); ?>
	</div>

	
		</div>
	</div>
</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
</html>