var calendar = document.getElementById("calendar-table");
var gridTable = document.getElementById("table-body");
var currentDate = new Date();
var selectedDate = currentDate;
var selectedTime = currentDate.getHours();
var selectedDayBlock = null;
var globalEventObj = {};

var openNav = false;
var openCalendar = false;
var sidebar = document.getElementById("sidebar");

function createCalendar(date, side, response) {
   var currentDate = date;/*PARA ARREGLAR EL CALENDARIO SOLO PUSE EL 2 QUE SALE, ANTES ERA UN 1 */
   var startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
   let dates = response;

   var monthTitle = document.getElementById("month-name");
   var monthName = currentDate.toLocaleString("es-PA", {
      month: "long"
   });
   monthName = monthName.charAt(0).toUpperCase() + monthName.slice(1).toLowerCase();//para mostrar primera letra en mayuscula
   var yearNum = currentDate.toLocaleString("es-PA", {
      year: "numeric"
   });
   monthTitle.innerHTML = `${monthName} ${yearNum}`;

   if (side == "left") {
      gridTable.className = "animated fadeOutRight";
   } else {
      gridTable.className = "animated fadeOutLeft";
   }

   setTimeout(() => {
      gridTable.innerHTML = "";

      var newTr = document.createElement("div");
      newTr.className = "row";
      var currentTr = gridTable.appendChild(newTr);
      /*para arreglar el calendario cambie el valor de i por 0*/
      for (let i = 0; i < startDate.getDay(); i++) {
         let emptyDivCol = document.createElement("div");
         emptyDivCol.className = "col empty-day";
         currentTr.appendChild(emptyDivCol);
      }

      var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
      lastDay = lastDay.getDate();

      for (let i = 1; i <= lastDay; i++) {
         if (currentTr.children.length >= 7) {
            currentTr = gridTable.appendChild(addNewRow());
         }
         let currentDay = document.createElement("div");
         currentDay.className = "col";
         if (selectedDayBlock == null && i == currentDate.getDate() || selectedDate.toDateString() == new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toDateString()) {
            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
            document.getElementById("eventDayName").innerHTML = selectedDate.toLocaleString("es-PA", {
               month: "long",
               day: "numeric",
               year: "numeric"
            });

            selectedDayBlock = currentDay;
            setTimeout(() => {
               currentDay.classList.add("blue");
               currentDay.classList.add("lighten-3");
            }, 900);
         }
         currentDay.innerHTML = i;

         for (let j in dates) {
            if (new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toISOString().slice(0, 10) === dates[j].Fecha) {
               currentDay.appendChild(document.createElement("div")).className = "day-mark";
            }
         }

         currentTr.appendChild(currentDay);
      }

      for (let i = currentTr.getElementsByTagName("div").length; i < 7; i++) {
         let emptyDivCol = document.createElement("div");
         emptyDivCol.className = "col empty-day";
         currentTr.appendChild(emptyDivCol);
      }

      if (side == "left") {
         gridTable.className = "animated fadeInLeft";
      } else {
         gridTable.className = "animated fadeInRight";
      }

      function addNewRow() {
         let node = document.createElement("div");
         node.className = "row";
         return node;
      }

   }, !side ? 0 : 270);
}

getCitasDates(currentDate);

var todayDayName = document.getElementById("todayDayName");
todayDayName.innerHTML = "Hoy es " + currentDate.toLocaleString("es-PA", {
   weekday: "long",
   day: "numeric",
   month: "short"
});

var prevButton = document.getElementById("prev");
var nextButton = document.getElementById("next");

prevButton.onclick = function changeMonthPrev() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
   getCitasDates(currentDate, "left");
}
nextButton.onclick = function changeMonthNext() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
   getCitasDates(currentDate, "right");
}

function addEvent(title, desc) {
   if (!globalEventObj[selectedDate.toDateString()]) {
      globalEventObj[selectedDate.toDateString()] = {};
      globalEventObj[selectedTime.toString()] = {};
   }
   globalEventObj[selectedDate.toDateString()][title] = desc;

   var url = '../php/models/addCita.php';
   var formData = new FormData();
   var form = document.forms[0];
   var pacienteId = 0;
   var secretariaId = 0;
   let now = new Date();

   if (selectedDate < now) {
      //sweetalert
      Swal.fire({
         title: 'No se puede agendar la cita',
         text: "La fecha escogida no es válida!",
         icon: 'error',
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
       //fin sweetalert
   } else {
      if (document.body.contains(document.querySelector('#secretariaID'))) {
         secretariaId = document.querySelector('#secretariaID').value;
         formData.append('secretariaID', secretariaId);
      }

      pacienteId = document.querySelector('#pacienteID').value;
      formData.append('pacienteID', pacienteId);

      var hora = document.querySelector('#hora').value;
      var motivo = document.querySelector('#eventTitleInput').value;
      var descripcion = document.querySelector('#eventDescInput').value;
      console.log(hora);
      if (hora.slice(0, 2) >= 8 && hora.slice(0, 2) <= 12) {
         formData.append('medicoID', 6);
      } else {
         formData.append('medicoID', 8);
      }

      formData.append('hora', hora);
      formData.append('motivo', motivo);
      formData.append('descripcion', descripcion);
      formData.append('fecha', selectedDate.toISOString().slice(0, 10));

      fetch(url, { method: 'POST', body: formData })
         /*.then(function (response) {
            location.reload()
         })
         .then(function (body) {
            location.reload()
         });*/
         .then(function(response) {
            return response.text();
         })
         .then(function(data) {
               if(data=="nada"){
                  console.log("ya tiene una cita, no puede agendar otra");
                  //sweetalert
                  Swal.fire({
                     title: 'No se puede agendar la cita',
                     text: "Ya tiene una cita, no puede agendar otra!",
                     icon: 'error',
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
                   //fin sweetalert
               }
               else if(data=="bien"){
                  console.log("cita agendada correctamente");
                  //sweetalert
                  Swal.fire({
                     title: 'Cita agendada',
                     text: "Cita agendada correctamente!",
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
                   //fin sweetalert
               }
               else{
                  console.log("error al agendar una cita");
                  //sweetalert
                  Swal.fire({
                     title: 'Oops...',
                     text: "Algo salió mal... :c",
                     icon: 'error',
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
                   //fin sweetalert
               }
         })
         .catch(function(err) {
               console.error(err);
         });
   }
}

gridTable.onclick = function (e) {

   if (!e.target.classList.contains("col") || e.target.classList.contains("empty-day")) {
      return;
   }

   if (selectedDayBlock) {
      if (selectedDayBlock.classList.contains("blue") && selectedDayBlock.classList.contains("lighten-3")) {
         selectedDayBlock.classList.remove("blue");
         selectedDayBlock.classList.remove("lighten-3");
      }
   }
   selectedDayBlock = e.target;
   selectedDayBlock.classList.add("blue");
   selectedDayBlock.classList.add("lighten-3");

   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));

   // showEvents();
   if (parseInt(sessionStorage.getItem('userType')) !== 2)
      getMyCita(sessionStorage.getItem('userID'), selectedDate.toISOString().slice(0, 10));
   else
      getAllCitas(selectedDate.toISOString().slice(0, 10));

   document.getElementById("eventDayName").innerHTML = selectedDate.toLocaleString("es-PA", {
      month: "long",
      day: "numeric",
      year: "numeric"
   });

}

var changeFormButton = document.getElementById("changeFormButton");
var addForm = document.getElementById("addForm");

changeFormButton.onclick = function (e) {
   addForm.style.top = 0;
}

var cancelAdd = document.getElementById("cancelAdd");

cancelAdd.onclick = function (e) {
   addForm.style.top = "100%";
   let inputs = addForm.getElementsByTagName("input");
   for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = "";
   }
   let labels = addForm.getElementsByTagName("label");
   for (let i = 0; i < labels.length; i++) {
      labels[i].className = "";
   }
}

var addEventButton = document.getElementById("addEventButton");

addEventButton.onclick = function (e) {
   let title = document.getElementById("eventTitleInput").value.trim();
   let desc = document.getElementById("eventDescInput").value.trim();

   if (!title || !desc) {
      document.getElementById("eventTitleInput").value = "";
      document.getElementById("eventDescInput").value = "";

      let labels = addForm.getElementsByTagName("label");
      for (let i = 0; i < labels.length; i++) {
         labels[i].className = "";
      }
      return;
   }

   addEvent(title, desc);

   if (!selectedDayBlock.querySelector(".day-mark")) {
      selectedDayBlock.appendChild(document.createElement("div")).className = "day-mark";
   }

   let inputs = addForm.getElementsByTagName("input");
   for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = "";
   }
   let labels = addForm.getElementsByTagName("label");
   for (let i = 0; i < labels.length; i++) {
      labels[i].className = "";
   }

}

function mostrar() {
   var x = document.getElementById("sidebar");
   if (x.style.display === "none") {
      x.style.display = "block";
   }
   else {
      x.style.display = "none";
   }
}
//funcion para mostrar el side-bar del calendario en versión móvil
function openMostrar() {
   document.getElementById("sidebar").style.width = "250px";
   document.getElementById("sidebar").style.marginLeft = "250px";
   document.getElementById("closebtn").style.display = "block";
   openNav = true;
   openCalendario();
}
//funcion para ocultar el side-bar del calendario en versión móvil
function closeMostrar() {
   if (openNav) {
      document.getElementById("sidebar").style.width = "0";
      document.getElementById("sidebar").style.marginLeft = "0";
      document.getElementById("closebtn").style.display = "none";
      openNav = false;
      openCalendario();
   }
}
//funcion para mostrar el menu del calendario
function openCalendario() {
   if (!openCalendar) {
      document.getElementById("menuDesplegado").style.display = "block";
      openCalendar = true;
   }
   else {
      document.getElementById("menuDesplegado").style.display = "none";
      openCalendar = false;
   }
}