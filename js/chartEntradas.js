//recuperar la información del localStorage
var Periodos = JSON.parse(localStorage.getItem('Periodos'));

//seleccionar el laboratorio de acuerdo a la clave
var select = document.getElementById("selectLab");
var elementoSelecc = Periodos[0].laboratorio;
for(var i=1; i<select.length; i++)
{
    if(select.options[i].value == elementoSelecc)
    {
        select.selectedIndex = i;
    }
}

// Load google charts
google.charts.load('current', {'packages':['imagebarchart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Mes: ', 'Entradas'],
        ['Enero', Periodos[0].entradas],
        ['Febrero', Periodos[1].entradas],
        ['Marzo', Periodos[2].entradas],
        ['Abril', Periodos[3].entradas],
        ['Mayo', Periodos[4].entradas],
        ['Junio', Periodos[5].entradas],
        ['Julio', Periodos[6].entradas],
        ['Agosto', Periodos[7].entradas],
        ['Septiembre', Periodos[8].entradas],
        ['Octubre', Periodos[9].entradas],
        ['Noviembre', Periodos[10].entradas],
        ['Diciembre', Periodos[11].entradas]
      ]);

    var chart = new google.visualization.ImageBarChart(document.getElementById('divGrafEntrds'));

    chart.draw(data, {width: 800, height: 400, min: 0});
  }

function enviar()
{
  window.open("crearPDFEntrds.php?idL=" + Periodos[0].laboratorio);
}