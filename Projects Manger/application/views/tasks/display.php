<h1 class="text-center">Tasks</h1>
<!-- <?php echo  $tasks->task_body ?> -->
<div class="bg-success">
<h1>
<?php if ($this->session->flashdata("task_update")): ?>
<?php echo $this->session->flashdata("task_update"); ?>
<?php endif; ?> 
<?php if ($this->session->flashdata("task_delete")): ?>
<?php echo $this->session->flashdata("task_delete"); ?>
<?php endif; ?> 
</h1>
</div>
<?php if (!empty($project)): ?>
<h1>
	Project Name : <a href="<?php echo base_url() ?>index.php/projects/view/<?php echo $project->project_id ?>"> <?php echo $project->project_name; ?></a> &nbsp by : <?php echo $user; ?> 
</h1>
<?php endif ?>

<table class="table table-hover" border="1">
	<thead>
		<th>Task Name</th>
		<th>Task Body</th>
		<th>Date</th>	
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php foreach ($tasks as  $value): ?>
				<tr>
				<td>
					<div class="task-name">
						<a href="<?php echo base_url() ?>index.php/tasks/display/<?php echo $value->id ?>"><?php echo $value->task_name ; ?> </a>
					</div>
						
				</td>
			
			<td><?php echo $value->task_body ; ?> </td>

			<td><?php echo $value->date ; ?> </td>
		<!-- 	<?php $id =  array_shift($user_id) ; ?>
			<?php var_dump($id); ?> -->
			<?php if ($value->user_id == $this->session->userdata('id')): ?>
				
			
			<td>
				<div class="task-actions">
						<a href="<?php echo base_url() ?>index.php/tasks/Edit/<?php echo $value->id ?>">Edit</a>
			</td>			
			<td>
						<a href="<?php echo base_url() ?>index.php/tasks/Delete/<?php echo $value->id ?>">Delete</a>
					</div>
			</td>
			<?php endif ?>
			</tr>
		<?php endforeach ?>
		
	</tbody>
</table>