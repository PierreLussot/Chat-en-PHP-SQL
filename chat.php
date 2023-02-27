<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>moi@gmail.com | CHAT</title>

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <div class="chat">
      <div class="button_email">
        <span>moi@gmail.com</span>
        <a href="" class="Deconnexiont_btn">Déconnexion</a>
      </div>
      <!--  message -->
      <div class="message_box">
        <div class="message your_message">
          <span>Vous</span>
          <p>Comment ca vas ?</p>
          <p class="date">26-12-01 00:12:23</p>
        </div>
        <div class="message others_message">
          <span>autre@gmail.com</span>
          <p>Oui ca vas merci</p>
          <p class="date">26-12-01 00:12:23</p>
        </div>
      </div>
      <!-- fin message -->
      <form action="" class="send_message" method="POST">
        <textarea
          name="message"
          cols="30"
          rows="2"
          placeholder="Votre message"
        ></textarea>
        <input type="submit" value="Envoyé" name="send" />
      </form>
    </div>
  </body>
</html>
