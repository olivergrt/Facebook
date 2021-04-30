<?php

$con = mysqli_connect('127.0.0.1', 'root', '', 'facebook'); 

$req = "SELECT nom, prenom, ddn, sexe FROM utilisateur WHERE id = ".$_SESSION['idutilisateur'];

$res = mysqli_query($con, $req);
$ligne = mysqli_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<head>
<title>Profil</title>
</head>
<body>

		<div class="profil-contenu-right">
			
					<h1 style="margin-left: 100px;">Profil</h1>
					<label style="margin-left: 15px;">Nom : <?= $ligne['nom'] ?></label><br>
					<label style="margin-left: 15px;">Prénom : <?= $ligne['prenom'] ?></label><br>
					<label style="margin-left: 15px;">Sexe : <?= $ligne['sexe'] ?></label><br>
					<label style="margin-left: 15px;">Date de naissance : <?= $ligne['ddn'] ?></label>
				</div>

			</body>
			</html>

	</div>
</body>
</html>

<?php 
mysqli_close($con);
?>