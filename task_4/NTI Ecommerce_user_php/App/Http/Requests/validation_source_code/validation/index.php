<?php

	//set default  values
	$username = "";
	$email = "";
	$password = "";

	if(count($_POST) > 0){

		require "autoload.php";

		$User = new User();
		$errors = $User->signup($_POST);

		if(count($errors) == 0){
			
			header("Location: profile.php");
			die;

		}

		extract($_POST);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<meta charset="utf-8">
</head>
<body>
<style type="text/css">
	
	.textbox{
		padding: 5px;
		border-radius: 5px;
		font-size: 13px;
		width: 95%;
		border: solid thin #aaa;
		margin-top: 10px;
		outline: none;
	}

	.button{
		border-radius: 5px;
		padding: 10px;
		background-color: green;
		color: white;
		float: right;
		border: none;
		cursor: pointer;
	}

	.error{

		background-color: orange;
		color: white;
		padding: 4px;
		text-align: center;
	}
</style>
	<form method="post" style="padding: 10px;border: solid thin #aaa; border-radius: 10px;margin:auto;width: 500px;">
		
		<?php if(isset($errors) && is_array($errors) && count($errors) > 0):?>
			<div class="error">
				<?php foreach($errors as $error):?>
				<?=$error?><br>
				<?php endforeach;?>
			</div>
		<?php endif;?>

		<h2>Signup</h2>
		<input class="textbox" type="text" name="username" placeholder="Username" value="<?=$username?>"><br>
		<input class="textbox" type="text" name="email" placeholder="Email" value="<?=$email?>"><br>
		<input class="textbox" type="text" name="password" placeholder="Password" value="<?=$password?>"><br>
		<br>
		<input class="button" type="submit" value="Signup">
		
		<br style="clear: both;">
	</form>
</body>
</html>