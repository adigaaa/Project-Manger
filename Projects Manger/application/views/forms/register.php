<h1>register Form</h1>
<?php if ($this->session->flashdata("errors")): ?>
<?php echo $this->session->flashdata("errors"); ?>
<?php endif; ?>	
<?php if ($this->session->userdata('logged_in')): ?>
<?php redirect('home') ?>
<?php endif; ?>

<?php 
 $data = array(
 		"id"=>"register-form",
 		"class"=>"form-horizontal"

 	);
?>
<?php echo  form_open("users/register",$data); ?>

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
	"name"=>"first_name",
	"placeholder"=>"Enter first_name"

	);
?>

<div class="form-group">
<?php echo form_label("first_name : "); ?>
<?php echo form_input($data) ?>
	
</div>



<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"last_name",
	"placeholder"=>"Enter last_name"

	);
?>

<div class="form-group">
<?php echo form_label("last_name : "); ?>
<?php echo form_input($data) ?>
	
</div>

<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"email",
	"placeholder"=>"Enter email"

	);
?>

<div class="form-group">
<?php echo form_label("email : "); ?>
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
	"name"=>"register",
	"value"=>"register"

	);

?>

<div class="form-group">
<?php echo form_submit($data) ?>
	
</div>




<?php echo form_close(); ?>
