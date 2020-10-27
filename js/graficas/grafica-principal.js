//variable para el boton de mostrar graficas
let enviarBtn = document.getElementById("enviarBtn");
//variable del primer chart
var ctxL = document.getElementById("lineChart").getContext('2d');
var graf, year, report, tipo; 
//variable del segundo chart
var ct = document.getElementById("barChart").getContext('2d');
//variable del tercer chart
var ctPie = document.getElementById("pieChart").getContext('2d');
//variable para el tipo de reporte
var url;

var year;

enviarBtn.onclick = function (e) {

  let inputGrafica = document.querySelector('#inputGrafica');
  let inputReporte = document.querySelector('#inputReporte');
  let inputYear = document.querySelector('#inputYear');
  
  if (inputGrafica.value== '0' || inputReporte.value== '0' || inputYear.value== '0'){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Favor de llenar todos los campos!'
    })
  }
  else{
    if(inputReporte.value=='1'){
      url="db/graficas/getTotalCitas.php?q=";
    }
    else if(inputReporte.value=='2'){
      url="db/graficas/getTotalCitasFacultad.php?q=";
    }
    else if(inputReporte.value=='3'){
      url="db/graficas/getTotalCitasSede.php?q=";
    }
    else{
      url="db/graficas/getCantidadPacienteEnfermedad.php?q=";
    }
    year = inputYear.value;
    setGrafica(inputGrafica.value, inputReporte.value)
  }
}



/**********************************************************/
/**********************************************************/
/**********************************************************/
/************************COLORES***************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/

//color 1
var gradient = ct.createLinearGradient(0, 0, 0, 290);
gradient.addColorStop(0, "#000000");
gradient.addColorStop(1, "#000000");
//color 2
var gra = ct.createLinearGradient(0, 0, 0, 290);
gra.addColorStop(0, "#681a5d");
gra.addColorStop(1, "#681a5d");
//color 3
var color3 = ct.createLinearGradient(0, 0, 0, 290);
color3.addColorStop(0, "#FFAE75");
color3.addColorStop(1, "#FFAE75");
//color 4
var color4 = ct.createLinearGradient(0, 0, 0, 290);
color4.addColorStop(0, "#75FFAD");
color4.addColorStop(1, "#75FFAD");
//color 5
var color5 = ct.createLinearGradient(0, 0, 0, 290);
color5.addColorStop(0, "#E8D56B");
color5.addColorStop(1, "#E8D56B");
//color 6
var color6 = ct.createLinearGradient(0, 0, 0, 290);
color6.addColorStop(0, "#816BE8");
color6.addColorStop(1, "#816BE8");
//color 7
var color7 = ct.createLinearGradient(0, 0, 0, 290);
color7.addColorStop(0, "#B2FF35");
color7.addColorStop(1, "#B2FF35");
//color 8
var color8 = ct.createLinearGradient(0, 0, 0, 290);
color8.addColorStop(0, "#2349FF");
color8.addColorStop(1, "#2349FF");
//color 9
var color9 = ct.createLinearGradient(0, 0, 0, 290);
color9.addColorStop(0, "#8F0633");
color9.addColorStop(1, "#8F0633");
//color 10
var color10 = ct.createLinearGradient(0, 0, 0, 290);
color10.addColorStop(0, "#FADE64");
color10.addColorStop(1, "#FADE64");
//color 11
var color11 = ct.createLinearGradient(0, 0, 0, 290);
color11.addColorStop(0, "#20E63C");
color11.addColorStop(1, "#20E63C");
//color12
var color12 = ct.createLinearGradient(0, 0, 0, 290);
color12.addColorStop(0, "#CB000A");
color12.addColorStop(1, "#CB000A");
//colorCivil
var colorCivil = ct.createLinearGradient(0, 0, 0, 290);
colorCivil.addColorStop(0, "#731373");
colorCivil.addColorStop(1, "#731373");
//colorIndustrial
var colorIndustrial = ct.createLinearGradient(0, 0, 0, 290);
colorIndustrial.addColorStop(0, "#FFFF18");
colorIndustrial.addColorStop(1, "#FFFF18");
//colorSistemas
var colorSistemas = ct.createLinearGradient(0, 0, 0, 290);
colorSistemas.addColorStop(0, "#007929");
colorSistemas.addColorStop(1, "#007929");
//colorMecanica
var colorMecanica = ct.createLinearGradient(0, 0, 0, 290);
colorMecanica.addColorStop(0, "#791A35");
colorMecanica.addColorStop(1, "#791A35");
//colorElectrica
var colorElectrica = ct.createLinearGradient(0, 0, 0, 290);
colorElectrica.addColorStop(0, "#0190ED");
colorElectrica.addColorStop(1, "#0190ED");
//colorCienciaTecnologia
var colorCienciaTecnologia = ct.createLinearGradient(0, 0, 0, 290);
colorCienciaTecnologia.addColorStop(0, "#0190ED");
colorCienciaTecnologia.addColorStop(1, "#0190ED");

/**********************************************************/
/**********************************************************/
/**********************************************************/
/********************FIN COLORES***************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/

/* dataSet() trae la respuesta de la consulta getReportes.php */
/*let dataSet = function getEnfermedadesPaciente() {
  const url = "../php/db/getReportes.php";

  fetch(url).then((res) => res.json())
    .then(response => {
      return response
    }).catch(error => console.log(error));
}*/

function setGrafica(g, r){
  graf=g;
  report=r;
  if(graf==1){
    document.getElementById("cardGrafica").style.display = "block";
    document.getElementById("lineChart").style.display = "block";

    document.getElementById("pieChart").style.display = "none";

    document.getElementById("barChart").style.display = "none";
    mostrarLine(report);
  }
  else if(graf==2){
    document.getElementById("cardGrafica").style.display = "block";
    document.getElementById("barChart").style.display = "block";

    document.getElementById("lineChart").style.display = "none";

    document.getElementById("pieChart").style.display = "none";
    mostrarBar(report);
  }
  else if(graf==3){
    document.getElementById("cardGrafica").style.display = "block";
    document.getElementById("pieChart").style.display = "block";

    document.getElementById("barChart").style.display = "none";

    document.getElementById("lineChart").style.display = "none";
    mostrarPie(report);
  }
}
/**********************************************************/
/**********************************************************/
/**********************************************************/
/******************Inicio Funciones************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/


function addLineData(myLineChart, dataSet){
  //para agregar valores en el primer label
  for(var i=0; i<Object.keys(dataSet).length; i++){
    myLineChart.data.labels.push(Object.keys(dataSet)[i]);
    myLineChart.data.datasets.forEach((dataset) => {
        dataset.data.push(Object.entries(dataSet)[i][1]);
    });
  }
  //para agregar un nuevo label
  myLineChart.data.datasets.push({
    label: "Africa",
    data: [133,221,783,2478],
    borderColor: "#000",
    backgroundColor: "#000",
    fill: false
  });
  console.log(myLineChart.data.datasets[1].label);
  myLineChart.update();
}
/**********************************************************/
/**********************************************************/
/**********************************************************/
/********************Primer Reporte************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/
function addTotalCitas(myLineChart, dataSet){
  for(var i=0; i<Object.keys(dataSet).length; i++){
    myLineChart.data.labels.push(Object.keys(dataSet)[i]);
    myLineChart.data.datasets.forEach((dataset) => {
        dataset.data.push(Object.entries(dataSet)[i][1]);
    });
  }
  myLineChart.update();
}
/**********************************************************/
/**********************************************************/
/**********************************************************/
/*******************Segundo Reporte************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/
function addTotalCitasFacultad(myLineChart, dataSet){
  //para agregar valores en el primer label
  myLineChart.data.datasets[0].label="FIC";
  for(var i=0; i<Object.keys(dataSet).length; i++){
    myLineChart.data.labels.push(Object.keys(dataSet)[i]);
    myLineChart.data.datasets.forEach((dataset) => {
        dataset.data.push(Object.entries(dataSet)[i][1]);
    });
  }
  //para agregar un nuevo label
  myLineChart.data.datasets.push({
    label: "FIE",
    data: [0,0,15,0,33,21,0,73,24,0,15,0],
    borderColor: "#0190ED",
    backgroundColor: "#0190ED",
    fill: false
  });
  myLineChart.data.datasets.push({
    label: "FII",
    data: [13,22,0,0,0,15,20,41,83,0,0,27],
    borderColor: "#FFFF18",
    backgroundColor: "#FFFF18",
    fill: false
  });
  myLineChart.data.datasets.push({
    label: "FIM",
    data: [10,0,0,0,0,82,53,0,35,0,15,0],
    borderColor: "#791A35",
    backgroundColor: "#791A35",
    fill: false
  });
  myLineChart.data.datasets.push({
    label: "FISC",
    data: [40,0,0,0,0,0,22,0,0,53,0,47],
    borderColor: "#007929",
    backgroundColor: "#007929",
    fill: false
  });
  myLineChart.data.datasets.push({
    label: "FCT",
    data: [39,40,15,45,0,0,0,0,0,10,15,40],
    borderColor: "#59431E",
    backgroundColor: "#59431E",
    fill: false
  });
  console.log(myLineChart.data.datasets[1].label);
  myLineChart.update();
}

/**********************************************************/
/**********************************************************/
/**********************************************************/
/**********************PRIMER CHART************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/
function mostrarLine(report){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var dataSet = JSON.parse(this.responseText);
          //var dataObject = Object.keys(JSON.parse(this.responseText));
          //console.log(dataObject,dataObject.length, dataObject[1]);
          //dataObject.forEach(element => console.log(element));
              var gradientFill = ctxL.createLinearGradient(0, 0, 0, 290);
              gradientFill.addColorStop(0, "rgba(173, 53, 186, 1)");
              gradientFill.addColorStop(1, "rgba(173, 53, 186, 0.1)");
              var myLineChart = new Chart(ctxL, {
                type: "line",
                data: 
                {
                  datasets: 
                  [
                    {
                      label: "Pacientes Atendidos por Mes",
                      backgroundColor: gradientFill,
                      borderColor: 
                      [
                        '#731373',
                      ],
                      fill: false
                      /*,
                      borderWidth: 2,
                      pointBorderColor: "#000000",
                      pointBackgroundColor: "rgba(173, 53, 186, 0.1)",*/
                    }
                  ]
                },
                options: 
                {
                  responsive: true
                }
              });
              if(report=='1'){
                addTotalCitas(myLineChart, dataSet);
              }
              else if(report=='2'){
                addTotalCitasFacultad(myLineChart, dataSet);
              }
      }
  };
  xmlhttp.open("POST", url + year, true);
  xmlhttp.send();
}



/**********************************************************/
/**********************************************************/
/**********************************************************/
/**********************SEGUNDO CHART***********************/
/**********************************************************/
/**********************************************************/
/**********************************************************/

function mostrarBar(report){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var dataSet = JSON.parse(this.responseText);
            var myBarChart = new Chart(ct, {
              type: 'bar',
              data: 
              {
                labels: ["1900", "1950", "1999", "2050"],
                datasets: 
                [
                  {
                    label: "Africa",
                    backgroundColor: "#3e95cd",
                    data: [133,221,783,2478]
                  }, 
                  {
                    label: "Europe",
                    backgroundColor: "#8e5ea2",
                    data: [408,547,675,734]
                  }
                ]
              },
              options: 
              {
                title: 
                {
                  display: true,
                  text: 'Population growth (millions)'
                }
              }
          });
    }
  };
  xmlhttp.open("POST", url + year, true);
  xmlhttp.send();
}


/**********************************************************/
/**********************************************************/
/**********************************************************/
/**********************TERCER CHART************************/
/**********************************************************/
/**********************************************************/
/**********************************************************/

function mostrarPie(report){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var dataSet = JSON.parse(this.responseText);
              var myPieChart = new Chart(ctPie, {
                type: 'pie',
                data: 
                {
                  labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                  datasets: 
                  [
                    {
                      label: "Population (millions)",
                      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                      data: [2478,5267,734,784,433]
                    }
                  ]
                },
                options: 
                {
                  title: 
                  {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                  }
                }
            });
    }
  };
  xmlhttp.open("POST", url + year, true);
  xmlhttp.send();
}