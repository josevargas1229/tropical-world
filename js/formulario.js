document.addEventListener("DOMContentLoaded", function () {
  var confpass = document.getElementById("pass2");
  var password = document.getElementById("pass");
  var cantidad = 0;
  confpass.addEventListener("blur", function () {
    var h6 = document.createElement("h6");
    var texto = "";
    h6.id = "confirma";
    if (confpass.value == password.value) {
      texto = "Las contraseñas coinciden";
    } else {
      texto = "Las contraseñas no coinciden";
    }
    if (cantidad == 0) {
      h6.textContent = texto;
      confpass.parentNode.appendChild(h6);
      cantidad++;
    } else {
      var confirma = document.getElementById("confirma");
      confirma.textContent = texto;
      
    }
  });
});
