<h1>Create Task</h1>
<p class="bg-danger">
<?php if ($this->session->flashdata("message_not") ) {

	echo $this->session->flashdata("message_not") ;
} ?>
</p>
<?php $task_info = array_shift($task_info); ?>
<?php 
$data= array(
	"id"=>"Task-form",
	"class"=>"form-horizontal"
	);
?>
<?php echo $errors_task; ?>
<?php echo form_open("tasks/edit/".$this->uri->segment(3),$data); ?>

<?php  
$data = array(
	"name"=>"task_name",
	"class"=>"form-control",
	"value"=>$task_info->task_name
	);

?>
<div class="form-group">
<?php echo form_input($data); ?>
</div>

<?php 
$data = array(
	"name"=>"task_body",
	"class"=>"form-control",
	"value"=>$task_info->task_body
	);
?>
<div class="form-group">
<?php echo form_textarea($data); ?>
</div>
<?php
$data = array(
	"name"=>"submit",
	"class"=>"btn btn-primary",
	"value"=>"Edit"
	);

?>
<div class="form-group">
<?php echo form_submit($data); ?>
</div>
