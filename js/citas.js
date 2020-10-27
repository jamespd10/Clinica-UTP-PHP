// let doctorContainer = document.querySelector("#doctorInput");
// doctorContainer.addEventListener("load", getAllDoctors());

function getAllCitas(date) {
    const url = "../php/models/getAllCitas.php?date=" + date;

    fetch(url).then((res) => res.json())
        .then(response => {
            showCitas(response);
        }).catch(error => console.log(error));
}

function getMyCita(id, date) {
    const userType = sessionStorage.getItem('userType');
    const url = "../php/models/getMyCita.php?date=" + date + "&id=" + id + "&type=" + userType;

    fetch(url).then((res) => res.json())
        .then(response => {
            showCitas(response);
        }).catch(error => console.log(error));
}

function getCitasDates(currentDate, side) {
    let url = '';
    console.log(side);
    const userID = sessionStorage.getItem('userID');
    const userType = sessionStorage.getItem('userType');

    if (parseInt(userType) !== 2)
        url = "../php/models/getCitasDates.php?id=" + userID + "&type=" + userType;
    else
        url = "../php/models/getCitasDates.php?type=" + userType;

    fetch(url).then((res) => res.json())
        .then(response => {
            createCalendar(currentDate, side, response);
        }).catch(error => console.log(error));
}

function showCitas(citas) {
    let sidebarEvents = document.getElementById("sidebarEvents");
    sidebarEvents.innerHTML = "";

    for (let i in citas) {
        let citaContainer = document.createElement("div");
        citaContainer.className = "citaCard";

        let citaContent = document.createElement("div");
        citaContent.className = "citaCard-description";

        const cancelContainer = document.createElement("div");
        let cancelBtn = document.createElement("button");
        cancelBtn.innerHTML = "Cancelar cita";
        cancelBtn.addEventListener("click", function () { cancelarCita(citas[i]); });
        cancelContainer.appendChild(cancelBtn);

        citaContent.appendChild(document.createTextNode("Paciente: " + citas[i].Nombre + " " + citas[i].Apellido));
        citaContent.appendChild(document.createElement("br"));
        citaContent.appendChild(document.createTextNode("Motivo: " + citas[i].Motivo));
        citaContent.appendChild(document.createElement("br"));
        citaContent.appendChild(document.createTextNode("Fecha: " + citas[i].Fecha + " Hora: " + citas[i].Hora));
        citaContent.appendChild(cancelContainer);

        citaContainer.appendChild(citaContent);

        sidebarEvents.appendChild(citaContainer);
    }
}

function cancelarCita(cita) {
    //let cancel = confirm("¿Está seguro que desea cancelar la cita con motivo de " + cita.Motivo + " agendada para " + cita.Fecha + " a las " + cita.Hora + "?");

    Swal.fire({
        title: "No podrá revertir esto!",
        text: "¿Está seguro que desea cancelar la cita con motivo de " + cita.Motivo + " agendada para " + cita.Fecha + " a las " + cita.Hora + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, quiero cancelarla!'
      }).then((result) => {
        if (result.value) {
            const url = "../php/models/deleteCita.php?id=" + cita.Num_Cita;
            fetch(url)
                .then(
                        Swal.fire({
                            title: 'Cita Cancelada!',
                            text: "La cita se ha cancelado correctamente.",
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
                    )
                .catch(error => console.log(error));
            //location.reload();
        }
      })
    
    /*if (cancel) {
        const url = "../php/models/deleteCita.php?id=" + cita.Num_Cita;

        fetch(url).then(location.reload()).catch(error => console.log(error));
    }*/
}