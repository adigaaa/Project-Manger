<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- 
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bootstrap-3/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bootstrap-3/css/bootstrap.min.css">
<script type="text/javascript"  src="<?php echo base_url()?>bootstrap-3/jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>bootstrap-3/js/bootstrap.min.js"></script> -->
<!-- //mia malkova  -->
<!-- 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --><script type="text/javascript">
   // setInterval('someFunc()', 1000)

//}
</script>

	<title></title>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url()?>">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a></li>
         <?php if (!$this->session->userdata('logged_in')): ?>
            <li><a href="<?php echo base_url()?>/index.php/home/register">Register</a></li>
          <?php endif ?> 
        <li><a href="<?php echo base_url()?>index.php/projects">Projects</a></li>
        <li><a href="<?php echo base_url()?>index.php/tasks/">tasks</a></li>
          </ul>
        </li>
      </ul>
  
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="containar">
	<div class="col-xs-8">
		<?php $this->load->view($main_view); ?>
	</div>
  <div class="col-xs-4">
  <?php if ($this->session->userdata('id')): ?>

    <?php $this->load->view("chat/chat"); ?>

<?php else:  $this->load->view("forms/login_form");  ?>
  <?php endif ?>
</div> 
 </div> 
 <?php 
echo $this->session->userdata('message_db')."<br>";
echo $this->session->userdata('message_id');

  ?>


</body>
</html>










