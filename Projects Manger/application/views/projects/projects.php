<h1>projects Here </h1>


<a class="btn btn-primary pull-right" href="<?php echo base_url();?>index.php/projects/create">Create</a>
<?php if ($this->session->flashdata('message_update')): ?>
	<h1 class="text-danger"><?php echo $this->session->flashdata('message_update'); ?></h1>
<?php endif ?>
<?php if ($this->session->flashdata('deleted')): ?>
	<h1 class="text-success"><?php echo $this->session->flashdata('deleted'); ?></h1>
<?php endif ?>
<table class="table table-hover">
	<thead>
		<th>Project Name</th>
	</thead>
	<tbody>
	<?php if ($this->session->flashdata("message_create")): ?>
		<h1 class="text-success">
		<?php echo $this->session->flashdata("message_create"); ?>
		</h1>
	<?php endif ?>
		  
		<?php
		//var_dump($projects);
		 foreach ($projects as $project):?>
		<tr>	
			<td>
				<a href="<?php echo base_url();?>index.php/projects/view/<?php echo $project->project_id; ?>">
				<?php echo $project->project_name;?>
					
				</a>
			</td>
			<td><?php if ($project->user_id == $this->session->userdata('id')): ?>
				
			
				<a href="projects/delete/<?php echo $project->project_id; ?>">
				<span class="glyphicon glyphicon-remove"></span>
				</a>
				<?php endif ?>
			</td>
		</tr>
			<?php endforeach;?>
		
		
	</tbody>
</table>