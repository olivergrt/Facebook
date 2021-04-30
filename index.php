<?php
session_start(); 

	if (!isset($_SESSION['idutilisateur'])) {
		header("location: login.php"); 
	}
	else{
		$con = mysqli_connect('127.0.0.1', 'root', '', 'facebook'); 
		mysqli_set_charset($con,'utf8'); 

		$req = "SELECT id FROM utilisateur WHERE id = ".$_SESSION['idutilisateur']; 
		$res = mysqli_query($con, $req);
		mysqli_close($con); 

		if (mysqli_num_rows($res) == 0) {
		   	header("Location : login.php"); 
		   }   

		else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Facebook</title>
</head>
<body>
	<header>
			<div class="logo">
				<img class="logo" src="img/logo.jpg">
				<input  class="forward" placeholder="Rechercher des amis"  type="text" name="forward">
				<button class="forwardre" type="submit" value="rechercher" name="rechercher"><i class="fa fa-search fa-2x"></i></button>

				<div class="menu" >
					<div class="Mur"><a class="mur" href="index.php?action=Mur">Mur</a></div>
					<div class="Profil"><a a class="mur"href="index.php?action=profil">Profil</a></div>
					<div class="Deconnexion"><a class="Deconnexion"href="deconnexion.php">Déconnexion</a></div>
				</div>
			</div>
			<br>
	</header>

<div class="conteneur">		
		
	
	<?php 
	include('amis.html');
	?>

	<?php
	if (isset($_GET['action'])) 
	{
	
		switch ($_GET['action'])
		{

			case 'Mur':
				include('actu.php');
				break;
			
			
			case 'profil':
				include('profil.php');
				break;

			case 'deconnexion':
				include('deconnexion.html');
				header('Location: inscription.html');
				break;

		}

	}

	?>

</div>
</body>
</html>

<?php
		}   
	}

?>