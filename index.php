<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connexion | chat</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php if (isset($_POST['button_con'])) {
    include 'connexion_bdd.php';
    extract($_POST);
    if (isset($email) && isset($mdp1) && !empty($email) && !empty($mdp1)) {
      $check =  $bdd->prepare("SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp1'");
      $check->execute([$email, $mdp1]);
      $data = $check->fetch();
      $row = $check->rowCount();
      if ($row > 0) {
        $_SESSION['user'] = $email;
        header('location: chat.php');
      } else {
        $error = "Email ou mot de passe incorrecte";
      }
    } else {
      $error = "Veuillez remplir tous les champs";
    }
  }
  ?>
  <form action="" method="POST" class="form_connexion_inscription">
    <h1>CONNEXION</h1>
    <p class="message_error"><?php
                              if (isset($error)) {
                                echo $error;
                              }
                              ?>
    </p>
    <label>Adresse mail</label>
    <input type="email" name="email" />
    <label>Mots de passe</label>
    <input type="password" name="mdp1" />
    <input type="submit" value="Connexion" name="button_con" />
    <p class="link">
      Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a>
    </p>
  </form>
  <script src="script.js"></script>
</body>

</html>