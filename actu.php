<?php

$con = mysqli_connect('localhost', 'root', '', 'facebook'); 

$req = "SELECT nom, prenom, ddn, sexe FROM utilisateur WHERE id = 1";

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

<div class="contenu">
	<div class="search">
		<form method="POST" action="">
			<textarea class="text" type="text" placeholder="Créer une publication" name="publication"></textarea><br>
			<input class="button" type="submit" name="submit" value="publier">
		</form>
		<?php 

		if (isset($_POST['submit'])) {

			$publication = $_POST['publication']; 

		?>
		<div class="backpublication">
			<font  face="tahoma" color="#000" size="3">
				<img src="img/image5.png" width="65px">
				<strong><a class="username" href="index.php?action=profil"><?php echo $ligne['prenom']; ?> <?php echo $ligne['nom']; ?></a></strong> 
				<div class="publication">
					
					<?php
						echo $publication;
					}
					?>

				</div>
			</font>
		</div>


	</div>
</div>
</body>
</html>