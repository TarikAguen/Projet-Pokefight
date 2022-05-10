<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./style.css" rel="stylsheet">
  <script src="./main.js"></script>
  <title>PokeFight</title>
</head>
<body>
  
</body>
</html>


<?php
include('index.php');
// var_dump($_POST);
// Si la session membre existe, alors je redirige vers l'accueil :
if (isset($_SESSION['user'])) {
	header('location:../profil/test.php');
}

// Si le form a été posté :
if ($_POST) {
	// Je vérifie si je récupère bien les valeurs des champs :
	// print_r($_POST);

	// Je défini une variable pour afficher les erreurs :
	$erreur = '';

	// Si le prenom n'est pas trop court ou trop long :
	if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20) {
		$erreur .= '<p>Taille de prénom invalide.</p>';
	}

	// Si les caractères utilisées dans le champs prénoms sont valides :
	if (!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])) {
		$erreur .= '<p>Format de pseudo invalide.</p>';
	}

	// Je vérifie si l'email n'est pas déjà présent dans la base :
	$r = $pdo->query("SELECT * FROM membre WHERE email = '$_POST[email]'");
	// S'il y a un ou plusieurs résultats :
	if ($r->rowCount() >= 1) {
		$erreur .= '<p>Email déjà utilisé.</p>';
	}

	// Je gère les problèmes d'apostrophes pour chaque champs grâce à une boucle :
	foreach ($_POST as $indice => $valeur) {
		$_POST[$indice] = addslashes($valeur);
	}

	// Je hash le mot de passe :
	$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

	// Si $erreur est vide (fonction empty() vérifie si une variable est vide) :
	if (empty($erreur)) {
		// J'envois les infos dans la table en BDD :
		$pdo->exec("INSERT INTO membre (pseudo, email, mdp) VALUES ('$_POST[pseudo]', '$_POST[email]', '$_POST[mdp]')");
		// J'ajoute un message de validation :
		$content .= '<p>Inscription validée !</p>';
	}



	header('location:connexion.php');
	// J'ajoute le contenu de $erreur à l'interieur de $content :
	$content .= $erreur;
}
