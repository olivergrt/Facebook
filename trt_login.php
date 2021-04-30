<?php
session_start(); 

	$con = mysqli_connect("127.0.0.1", "root", "", "facebook");
	mysqli_set_charset($con, "utf8");

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
?>