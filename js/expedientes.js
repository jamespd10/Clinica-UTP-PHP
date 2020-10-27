/*para buscar por nombre o cédula*/
$(document).ready(function () {
  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#pacientes-filter #pacientes-body").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

let modificarExpediente = document.getElementById("modificarExpediente");

modificarExpediente.onclick = function (e) {
  const url = '../php/models/modificarExpediente.php';
  let form = new FormData();

  let pacienteId = document.querySelector('#pacienteID');
  let peso = document.querySelector('#inPeso');
  let presion = document.querySelector('#inPresion');
  let temperatura = document.querySelector('#inTemperatura');
  let nuevaAlergia = document.querySelector('#inNuevaAlergia');
  let sintoma = document.querySelector('#inSintoma');
  let diagnostico = document.querySelector('#inDiagnostico');
  let medicamento = document.querySelector('#inMedicamento');
  let enfermedadPresentada = document.querySelector('#inEnfermedades').value;
  let nuevaEnfermedad = document.querySelector('#inNuevaEnfermedad');

  /*Inputs para Expediente*/
  if (peso.value !== '')
    form.append('peso', peso.value);
  else
    form.append('peso', peso.placeholder);

  if (sintoma.value !== '')
    form.append('sintoma', sintoma.value);
  else
    form.append('sintoma', sintoma.placeholder);

  if (presion.value !== '')
    form.append('presion', presion.value);
  else
    form.append('presion', presion.placeholder);

  if (temperatura.value !== '')
    form.append('temperatura', temperatura.value);
  else
    form.append('temperatura', temperatura.placeholder);

  if (diagnostico.value !== '')
    form.append('diagnostico', diagnostico.value);
  else
    form.append('diagnostico', diagnostico.placeholder);

  if (medicamento.value !== '')
    form.append('medicamento', medicamento.value);
  else
    form.append('medicamento', medicamento.placeholder);

  /*Inputs para Nuevas Alergias*/
  if (nuevaAlergia.value !== '')
    form.append('nuevaAlergia', nuevaAlergia.value);

  /*Inputs para Enfermedad Presentada*/
  if (enfermedadPresentada !== '')
    form.append('enfermedadPresentada', enfermedadPresentada);

  /*Inputs para Nuevas Enfermedad*/
  if (nuevaEnfermedad.value !== '')
    form.append('nuevaEnfermedad', nuevaEnfermedad.value);

  form.append('pacienteID', pacienteId.value);

  fetch(url, { method: 'POST', body: form })
    .then(function (response) {
      Swal.fire({
        title: 'Good job!',
        text: "¡Datos del paciente han sido actualizados!",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
      }).then((result) => {
        if (result.value) {
          location.reload();
        }
        else {
           location.reload();
         }
      })
    })
    .then(function (body) {
      Swal.fire({
        title: 'Good job!',
        text: "¡Datos del paciente han sido actualizados!",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
      }).then((result) => {
        if (result.value) {
          location.reload();
        }
        else {
           location.reload();
         }
      })
    });
  //alert('¡Datos del paciente han sido actualizados!')
    //sweetalert
    /*Swal.fire(
      'Good job!',
      '¡Datos del paciente han sido actualizados!',
      'success'
    )*/
    //fin sweetalert
}

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false; }
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function (e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
          /*close the list of autocompleted values,
          (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
      increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) { //up
      /*If the arrow UP key is pressed,
      decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = [];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);

/*funcion para mostrar el input text*/
var mostrarAlg, mostrarEnf = false;
function mostrarInput() {
  if (!mostrarAlg) {
    document.getElementById("inNuevaAlergia").style.display = "block";
    mostrarAlg = true;
  }
  else {
    document.getElementById("inNuevaAlergia").style.display = "none";
    mostrarAlg = false;
  }
}
function mostrarInputEnfermedad() {
  if (!mostrarEnf) {
    document.getElementById("inNuevaEnfermedad").style.display = "block";
    mostrarEnf = true;
  }
  else {
    document.getElementById("inNuevaEnfermedad").style.display = "none";
    mostrarEnf = false;
  }
}