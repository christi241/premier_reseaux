<?php 
include "db.php";
if (isset($_POST['envoyer'])) {	
	
	if(!empty($_POST['email']) and !empty($_POST['motp'])){
	$email=$_POST['email'];
	$motp=$_POST['motp'];
	
	$sql= "SELECT * FROM users";
	$req=mysqli_query($conn,$sql);
	$row= mysqli_fetch_assoc($req);
	while ($row= mysqli_fetch_assoc($req)) {
		
			if ($row['email'] == $email and  $row['password']== $motp) {
			 $_SESSION['utilisateur'] = ["email"=>$_POST['email']];
			 	header('location: index.php');
			}else{
				echo "email ou mot de passe incorrect";
			}
	}
	}
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style1.css">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<div class="login-box">
  <h2>connexion</h2> 
  <form action="conexion.php" method="POST">
   
	<div class="user-box">
      <input type="text" name="email"  >
      <label>e-mail</label>
    </div>
    <div class="user-box">
      <input type="password" name="motp" >
      <label>mot de passe</label>
    </div>
    <input type="submit" class="btn btn-success" name="envoyer">
  </form>
</div>
</body>
</html>