<h1>Create Project</h1>
<?php if ($this->session->flashdata("errors")): ?>
<?php echo $this->session->flashdata("errors"); ?>
<?php endif; ?>	


<?php 
 $data = array(
 		"id"=>"Project-form",
 		"class"=>"form-horizontal"

 	);
?>
<?php echo  form_open("projects/create",$data); ?>

<?php 
$data = array(
	"class"=>"form-control",
	"name"=>"project_name",
	"placeholder"=>"Project name"

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
	"placeholder"=>"Project body"

	);
?>

<div class="form-group">
<?php echo form_label("Project body: "); ?>
<?php echo form_textarea($data) ?>
	
</div>

<?php 
$data = array(
	"class"=>"btn btn-primary",
	"name"=>"create",
	"value"=>"Create"

	);

?>

<div class="form-group">
<?php echo form_submit($data) ?>
	
</div>

<?php echo form_close(); ?>
