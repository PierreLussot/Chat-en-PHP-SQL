let mdp1 = document.querySelector(".mdp1");
let mdp2 = document.querySelector(".mdp2");

mdp2.onkeyup = function () {
  message_error = document.querySelector(".message_error");
  if (mdp1.value != mdp2.value) {
    message_error.innerText = "Les mots de passe ne sont pas conformes";
  } else {
    message_error = "";
  }
};
