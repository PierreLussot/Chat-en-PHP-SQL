<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription | chat</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include 'connexion_bdd.php';

    if (isset($_POST['button_inscription'])) {
        extract($_POST);


        if (isset($email) && isset($mdp1) && isset($mdp2) && !empty($email) && !empty($mdp1) && !empty($mdp2)) {



            if ($mdp2 != $mdp1) {
                $error = "Mot de passe different de la confirmation";
            } else {
                $check =  $bdd->prepare("SELECT email FROM utilisateurs WHERE email = '$email'");
                $check->execute([$email]);
                $data = $check->fetch();
                $row = $check->rowCount();
                if ($row == 0) {
                    $req = $bdd->query("INSERT INTO utilisateurs(email,mdp) VALUES('$email','$mdp1')");
                    if ($req) {
                        $_SESSION['message'] = "<p class='message_inscription'>Votre compte a été créer avec succès !</p>";
                        header('Location:index.php');
                    } else {
                        $error = "Inscription echouée";
                    }
                } else {
                    $error = "Cet email existe deja !";
                }
            }
        } else {
            $error = "Veuillez remplir tous les champs"; 
        }
    }
    ?>

    <form action="" method="POST" class="form_connexion_inscription">
        <h1>INSCRIPTION</h1>
        <p class="message_error">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
        </p>
        <label>Adresse mail</label>
        <input type="email" name="email" />
        <label>Mots de passe</label>
        <input type="password" name="mdp1" class="mdp1" />
        <label>Confirmation mot de passe</label>
        <input type="password" name="mdp2" class="mdp2" />
        <input type="submit" value="Inscription" name="button_inscription" />
        <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
    </form>
</body>
<script src="script.js"></script>

</html>