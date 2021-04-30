<?php
session_start(); 

	$con = mysqli_connect("127.0.0.1", "root", "", "facebook");
	mysqli_set_charset($con, "utf8");
	
	if (isset($_POST['connexion'])) {
	
		$login = htmlspecialchars($_POST['login']);
		$pwd = sha1($_POST['mdp']);

		$req = "SELECT 	id FROM utilisateur WHERE login = '".$login."' AND password = '".$pwd."'";
		$res = mysqli_query($con, $req); 
		mysqli_close($con); 

		if (mysqli_num_rows($res) == 1) {
		 	$ligne = mysqli_fetch_array($res, MYSQLI_ASSOC); 
		 	$_SESSION['idutilisateur'] = $ligne['id']; 
		 	header("Location: index.php?action=profil"); 
		 } 
		else{
			// header("Location: login.html"); 
			$erreur = "Login ou mot de passe incorrect !";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/inscription.css">
	<title>Login</title>
</head>
<body>
	<div class="logo"><img class="logo" src="img/logo.jpg"></div>
	<table align="center">
		<h1 class="connexion">Connexion</h1>

        <?php if(isset($erreur)){?>
        <center><p class="erreur" ><?php echo $erreur; ?></p></center>
        <?php } ?>

		<form action="" method="POST">
			<tr>			
				<td><input class="log" type="text" name="login" placeholder="Login" required=""></td>
			</tr>
			<tr>
				<td><input class="log" type="password" name="mdp" placeholder="Mot de passe" required=""></td>
			</tr>
			<tr>
				<td><center><input class="connexion" type="submit" name="connexion" value="connexion"></center></td> 
			</tr>
			<tr>
				<td><center><a class="sinscrire" href="inscription.html">S'inscire ici</a></center></td>
			</tr>
			<tr>
				<td><center><a class="sinscrire" href="inscription.html">Mot de passe oublié</a></center></td>
			</tr>
		</form>
	</table>
</body>
</html>