<h1>Login Form</h1>
<?php if($this->session->userdata('logged_in')): ?>
<h1>Logged In</h1>

<?php echo form_open("users/logout"); ?>

<?php $attr = array(
		"class"=>"btn btn-primary",
		"name"=>"logout",
		"value"=>"Logout"		
); ?>
<?php echo form_submit($attr); ?>

<?php echo form_close(); ?>


<?php else: ?>	
<?php if ($this->session->flashdata("errors")): ?>
<?php echo $this->session->flashdata("errors"); ?>
<?php endif; ?>	

<?php 
 $data = array(
 		"id"=>"login-form",
 		"class"=>"form-horizontal"

 	);
?>
<?php echo  form_open("users/login",$data); ?>

<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"username",
	"placeholder"=>"Enter Your username"

	);
?>

<div class="form-group">
<?php echo form_label("username : "); ?>
<?php echo form_input($data) ?>
</div>

<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"password",
	"placeholder"=>"Enter Your password"

	);
?>

<div class="form-group">
<?php echo form_label("password : "); ?>
<?php echo form_password($data) ?>
</div>

<?php
$data = array(
	"class"=>"form-control",
	"name"=>"confirm_password",
	"placeholder"=>"Enter Your password"

	);
?>

<div class="form-group">
<?php echo form_label("confirm_password : "); ?>
<?php echo form_password($data) ?>
</div>

<?php 
$data = array(
	"class"=>"btn btn-primary",
	"name"=>"login",
	"value"=>"Login"

	);
?>

<div class="form-group">
<?php echo form_submit($data) ?>
</div>

<?php echo form_close(); ?>
<?php endif; ?>