<h1>Update Project</h1>
<?php if ($this->session->flashdata("errors")): ?>
<?php echo $this->session->flashdata("errors"); ?>
<?php endif; ?>	

<?php if ($this->session->userdata('id') != $project_info->user_id): ?>
	<?php redirect('home') ?>
<?php endif ?>
<?php 
 $data = array(
 		"id"=>"Project-form",
 		"class"=>"form-horizontal"

 	);
?>
<?php echo  form_open("projects/update/".$project_info->project_id,$data); ?>

<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"project_name",
	"value" => $project_info->project_name

	);
?>

<div class="form-group">
<?php echo form_label("Project name : "); ?>
<?php echo form_input($data) ?>
	
</div>



<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"project_body",
	"value" => $project_info->project_body

	);
?>

<div class="form-group">
<?php echo form_label("Project body: "); ?>
<?php echo form_textarea($data) ?>
	
</div>

<?php 
$data = array(
	"class"=>"btn btn-primary",
	"name"=>"update",
	"value"=>"Update"

	);

?>

<div class="form-group">
<?php echo form_submit($data) ?>
	
</div>

<?php echo form_close(); ?>
