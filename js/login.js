function verPassword() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function mostrarAlert(){
    document.getElementById("alertCredenciales").style.display = "block";
  }