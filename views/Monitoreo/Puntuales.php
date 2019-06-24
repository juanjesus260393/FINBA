<?php

require_once("../models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<?php
include('../views/template1.php');

?>
<script> 
   $(document).ready(function(){
  // Show the Modal on load
  $("#modalmonitoreo").modal("show");
});
    
    
    
    
    //Se declaran las variables necesarias para poder aplicar los filtros de busqueda y organizacion
    var med = [{fecha: "2019-01-01 00:00:00", medidas: "0"}];
    var fecha2= ['2019-01-01 00:00:00'];
    var medidadia=[0];
    var diames=[0];
    var medidames=[0];
    var mesaño=[0];
    fecha2.push('<?php echo $diaact ?>'+' 00:00:00', '<?php echo $diaact ?>'+' 01:00:00', '<?php echo $diaact ?>'+' 02:00:00'
            , '<?php echo $diaact ?>'+' 03:00:00', '<?php echo $diaact ?>'+' 04:00:00', '<?php echo $diaact ?>'+' 05:00:00'
            , '<?php echo $diaact ?>'+' 06:00:00', '<?php echo $diaact ?>'+' 08:00:00', '<?php echo $diaact ?>'+' 09:00:00'
            , '<?php echo $diaact ?>'+' 10:00:00', '<?php echo $diaact ?>'+' 11:00:00', '<?php echo $diaact ?>'+' 12:00:00'
            , '<?php echo $diaact ?>'+' 13:00:00', '<?php echo $diaact ?>'+' 14:00:00', '<?php echo $diaact ?>'+' 15:00:00'
            , '<?php echo $diaact ?>'+' 16:00:00', '<?php echo $diaact ?>'+' 17:00:00', '<?php echo $diaact ?>'+' 18:00:00'
            , '<?php echo $diaact ?>'+' 19:00:00', '<?php echo $diaact ?>'+' 20:00:00', '<?php echo $diaact ?>'+' 21:00:00'
            , '<?php echo $diaact ?>'+' 22:00:00', '<?php echo $diaact ?>'+' 23:00:00', '<?php echo $diaact ?>'+' 23:59:59');
    var medidas=[0];   
</script>  
<?php
 
for($i=0; $i<=24; $i++){
    ?>
<script>
    medidas.push('<?php echo $measuresDia[$i] ?>');
</script>
 <?php   
}

foreach( $prommes as $promxdia){
    
    ?>
<script>
    diames.push('<?php echo $promxdia[0] ?>');
    medidadia.push('<?php echo $promxdia[1] ?>');
</script>

<?php
}
foreach ($promaño as $promxmes){
    ?>
    <script>
    mesaño.push('<?php echo $promxmes[0] ?>');
    medidames.push('<?php echo $promxmes[1] ?>');
</script>
<?php
}
?> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
    
     <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#Diahoy">Hoy</a>
    </li>
     
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Mensual">Por Mes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Anual">Por Año</a>
    </li>
  </ul>
<div class="tab-content">
    <div id="Diahoy" class="container tab-pane active"><br>
  
  
    <div>
        <h3>Graficas Tablero General</h3>
        <canvas id="myChart2"></canvas>

<script>
  Chart.plugins.unregister(ChartDataLabels);  
var ctx2 = document.getElementById('myChart2').getContext('2d');

var chart2 = new Chart(ctx2, {
   
    // The type of chart we want to create
    
    type: 'bar',

    // The data for our dataset
    data: {
        labels: fecha2,
        datasets: [{
            label: 'Consumos Hoy',
             backgroundColor: 'rgb(120, 199, 150)',
            borderColor: 'rgb(255, 99, 132)',
            data: medidas
        },{
            label: 'Hoy linea',
          labels: fecha2,
          type: "line",
          borderColor: "#3e95cd",
          data: medidas,
          fill: true
        }]
    
    },
 
    // Configuration options go here
    options: {
        title: {
        display: true,
        text: 'Consumos del dia de Hoy, Promedios por hora'
      },
      legend: { display: true }
    }
    
});
</script>
    </div> 
          </div>
    <div id="Mensual" class="container tab-pane fade"><br> 
            <div>
        <h3>Graficas Tablero General x Mes</h3>
        <div class="row">
        <label for="example-month-input" class="col-2 col-form-label">MES</label>
         <form method="POST" action="">
             <input class="" id="mestoquery" name="mestoquery" type="month" value="2019-06" id="example-month-input">
            <input class="btn btn-primary" type="submit">
  
             </form></div>
        <canvas id="myChart3"></canvas>

        
<script>
var ctx3 = document.getElementById('myChart3').getContext('2d');

var chart3 = new Chart(ctx3, {
   
    // The type of chart we want to create
    
    type: 'bar',

    // The data for our dataset
    data: {
        labels: diames,
        datasets: [{
            
            label: 'Consumos Hoy',
             backgroundColor: 'rgb(120, 199, 150)',
            borderColor: 'rgb(255, 99, 132)',
            data: medidadia
        },{
            label: 'Hoy linea',
          labels: diames,
          type: "line",
          borderColor: "#3e95cd",
          data: medidadia,
          fill: true
        }]
    },
    plugins: [ChartDataLabels],
    // Configuration options go here
    options: {
        title: {
        display: true,
        text: 'Consumos del dia de Hoy, Promedios por hora'
      }, scales: {
        
        yAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "KwH"
          }
        }],
        xAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "Dias de mes"
          }
        }]
      }, legend: { display: true } 
  }   
});
</script>
    </div> 
    </div>
    <div id="Anual" class="container tab-pane fade"><br> 
            <div>

        <h3>Graficas Tablero General x Año</h3>
        <div class="row">
        
         <form method="POST" action="">
             <label for="exampleSelect1">AÑO</label>
     <select name="añotoquery"id="añotoquery">
      <option value="2019">2019</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
      <option value="2030">2030</option>
      <option value="2031">2031</option>
      <option value="2032">2032</option>
      <option value="2033">2033</option>
      <option value="2034">2034</option>
      <option value="2035">2035</option>
    </select>
            <input class="btn btn-primary" type="submit">
  
             </form></div>
        <canvas id="myChart4"></canvas>

        
<script>
var ctx4 = document.getElementById('myChart4').getContext('2d');

var chart4 = new Chart(ctx4, {
   
    // The type of chart we want to create
    
    type: 'bar',

    // The data for our dataset
    data: {
        labels: mesaño,
        datasets: [{
            
            label: 'Consumos Hoy',
             backgroundColor: 'rgb(120, 199, 150)',
            borderColor: 'rgb(255, 99, 132)',
            data: medidames
        },{
            label: 'Hoy linea',
          labels: mesaño,
          type: "line",
          borderColor: "#3e95cd",
          data: medidames,
          fill: true
        }]
    
    },
    plugins: [ChartDataLabels],
    // Configuration options go here
    options: {
        title: {
        display: true,
        text: 'Consumos del dia de Hoy, Promedios por hora'
      }, scales: {
        
        yAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "KwH"
          }
        }],
        xAxes: [{ 
          scaleLabel: {
            display: true,
            labelString: "Dias de mes"
          }
        }]
      }, legend: { display: true } 
  }   
});
</script>
    </div> 
    </div>      
</div> </div>
<?php
require('../views/Monitoreo/vwplanomonitoreo.php');
include('../views/template2.php');