
<?php


include('../Projet-Pokefight/index.php');

    $host = 'localhost';
    $dbname = 'pokefight';
    $username = 'root';
    $password = '';
    // $membre['profil_ami'] = 0;
    
 
  try {
  
    //$conn = new PDO($host;$dbname, $username, $password);
    $pdo = new PDO('mysql:host=localhost;dbname=pokefight', 'root', '', array(PDO::ATTR_ERRMODE =>
PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


    //echo "Connecté à $dbname sur $host avec succès.";

    
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
  }

?>
		<a href="?action=deconnexion">Déconnexion</a>

<?php



$content = "";
?>









































<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>bvn</h1>
  <?php   echo $_SESSION['user']['pseudo']?> 
</body>
</html>
