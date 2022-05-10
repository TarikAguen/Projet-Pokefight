<?php
// include('index.php');

// Si la session membre existe, alors je redirige vers l'accueil :
if (isset($_SESSION['user'])) {
  header('location:./profil.php');
}

// Si le form est posté :
if ($_POST) {
  // Je vérifie si je récupère bien les infos :
  // var_dump($_POST);

  // Je récupère les infos correspondants à l'email dans la table :
  $r = $pdo->query("SELECT * FROM user WHERE email = '$_POST[email]'");

  // Si le nombre de résultat est plus grand ou égal à 1, alors le compte existe :
  if ($r->rowCount() >= 1) {
    // Je stock toutes les infos sous forme d'array :
    $user = $r->fetch(PDO::FETCH_ASSOC);
    // Je vérifie si j'ai bien toutes les infos dans l'array :
    // print_r($membre);
    // Si le mot de passe posté correspond à celui présent dans $membre :
    if (password_verify($_POST['mdp'], $user['mdp'])) {
      // Je test si le mdp fonctionne :
      $content .= '<p>email + MDP : OK</p>';
      // J'enregistre les infos dans la session :
      $_SESSION['user']['pseudo'] = $user['pseudo'];
      $_SESSION['user']['email'] = $user['email'];
      $_SESSION['user']['mdp'] = $user['mdp'];
      $_SESSION['user']['id_user'] = $user['id_user'];

      // Je redirige l'utilisateur vers la page d'accueil :
      header('location:../profil/test.php');
    } else {
      // Le mot de passe est incorrect :
      $content .= '<p>Mot de passe incorrect.</p>';
    }
  } else {
    $content .= '<p>Compte inexistant</p>';
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Connexion</title>
  <link href="./styleco.css" rel="stylesheet">
</head>

<body>


  <div class="boardConnexion">
    <div class="returnArrow"><a href="./inscription.php"><img src="../images/return.svg" alt=""></a></div>
    <div class=boardConnexion2>
      <form method="post">
        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" required>
        <br><br>
        <input type="submit" class="seconnecter" value="Se connecter">
    </div>
    </form>
  </div>

</body>

</html>