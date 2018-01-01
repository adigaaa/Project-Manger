<h1 class="bg-success">
<?php if ($this->session->flashdata("task_aded")) {
  echo $this->session->flashdata("task_aded");
} ?>
</h1>
<h1>by : <?php echo $user;  ?> </h1>
<div class="col-xs-9">
	<?php var_dump($projects); ?>
<h1 class="text-primary">
	Title : 
	<?php echo $projects->project_name ?>
	</h1>
	<h2>description : </h2>
<p class="text-success">
		<?php echo $projects->project_body ?>
</p><br>

<?php if (!empty($tasks)): ?>
<ul>

<?php foreach ($tasks as  $value): ?>
	<li><a href="<?php echo base_url()?>index.php/tasks/display/<?php echo $value->task_id ?>"><?php echo  $value->task_name?></a></li>
<?php endforeach ?>
	
</ul>
<?php endif ?>
</div>

	

<div class="col-xs-3 pull-right">
	<ul class="list-group">
		<li class="list-group-item"><a href="<?php echo base_url();?>index.php/tasks/create/<?php echo $projects->project_id ?>">Create Task</a></li>
		<?php if ($this->session->userdata('id') == $projects->user_id ): ?>
		<li class="list-group-item"><a href="<?php echo base_url();?>index.php/projects/update/<?php echo $projects->project_id ?>">Edit Project</a></li>
		<li class="list-group-item"><a href="<?php echo base_url();?>index.php/projects/delete/<?php echo $projects->project_id ?>">Delete Project</a></li>
			<?php endif ?>
	</ul>

</div>

