<!DOCTYPE html>
<html>
<head>
	<title>Welcome to my project</title>
</head>
<body>

<?php
	foreach ($users_data as $obj) {
	echo 	"id :  ".  $obj->id." password : ". $obj->password ." username :  ". $obj->username. "<br>";
	}
?>
</body>
</html>