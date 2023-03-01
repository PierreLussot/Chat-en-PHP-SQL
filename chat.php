<?php
session_start();
if (empty($_SESSION['user'])) {
  header('Location:index.php');
}

$user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> <?= $user ?> | CHAT</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="chat">
    <div class="button_email">
      <span><?= $user ?> </span>
      <a href="deconnexion.php" class="Deconnexiont_btn">Déconnexion</a>
    </div>
    <!--  message -->
    <div class="message_box">
      <?php include 'messages.php'; ?>
    </div>
    <!-- fin message -->
    <?php
    if (isset($_POST['send'])) {

      $message = $_POST['message'];
      include 'connexion_bdd.php';
      if (isset($message) && $message != "") {
        $req =  $bdd->query("INSERT INTO messages(email,msg,dates) VALUES('$user','$message',NOW())");

        header('Location:chat.php');
      } else {
        header('Location:chat.php');
      }
    }
    ?>
    <form action="" class="send_message" method="POST">
      <textarea name="message" cols="30" rows="2" placeholder="Votre message"></textarea>
      <input type="submit" value="Envoyé" name="send" />
    </form>
  </div>
</body>

</html>