<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'facebook');
	
	$login = htmlspecialchars($_POST['login']);
	$pwd = sha1($_POST['password']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$nom = htmlspecialchars($_POST['nom']);
	$ddn = htmlspecialchars($_POST['ddn']);
	$sexe = htmlspecialchars($_POST['sexe']);

	$req = "INSERT INTO utilisateur (login, password, nom, prenom, ddn, sexe) VALUES ('$login', '$pwd', '$nom', '$prenom', '$ddn', '$sexe')";

	$res = mysqli_query($con, $req);
	mysqli_close($con);

	header("location: login.php");   


?>