<div class="bg-success">
<?php if($this->session->flashdata("login-success")): ?>
<?php echo $this->session->flashdata("login-success"); ?>	
<?php endif; ?>
</div>

<div class="bg-danger">
<?php if($this->session->flashdata("login-failed")): ?>
<?php echo $this->session->flashdata("login-failed"); ?>	
<?php endif; ?>
</div>
<div class="jumbotron">
<h2>Welcome To my CI APP</h2>
</div>
<div class="bg-success">
<?php if ($this->session->flashdata("message")): ?>
<?php echo $this->session->flashdata("message"); ?>
<?php endif; ?>	
</div>

<div class="bg-danger">
	<?php  
		if($this->session->flashdata("no access")){
			echo $this->session->flashdata("no access");
		}
	?>
</div>



    <?php if ($this->session->userdata('logged_in') == TRUE && isset($projects) ): ?>

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
      <td>
        <a href="projects/delete/<?php echo $project->project_id; ?>">
        <span class="glyphicon glyphicon-remove"></span>
        </a>
      </td>
    </tr>
      <?php endforeach;?>
    
    
  </tbody>
</table>
      
    <?php endif;?>