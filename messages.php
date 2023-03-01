<?php
if (isset($_SESSION['user'])) {
    include 'connexion_bdd.php';
    $req = $bdd->prepare("SELECT * FROM messages ORDER BY id_m DESC");
    $req->execute();
    if ($req->rowCount() == 0) {
        echo "Messagerie vide";
    } else {
        while ($data = $req->fetch()) {
            if ($data['email'] == $_SESSION['user']) {

?>
                <div class="message your_message">
                    <span>Vous</span>
                    <p><?= $data['msg'] ?></p>
                    <p class="date"><?= $data['dates'] ?></p>
                </div>
            <?php

            } else {

            ?>
                <div class="message others_message">
                    <span><?= $data['email'] ?></span>
                    <p><?= $data['msg'] ?></p>
                    <p class="date"><?= $data['dates'] ?></p>
                </div>
<?php
            }
        }
    }
}

?>