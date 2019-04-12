<?php
session_start();
//echo $_SESSION['token'];
require_once("../models/mdlsecurity.php");
mdlsecurity::validateToken();
?>
<?php
include('../views/template1.php');

?>
 
<div class="container">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <div>    
<!-- Codigo de Vista-->
<h3>Graficas</h3>
<canvas id="myChart"></canvas>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My First dataset',
           // backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }, {
            label: 'My First dataset',
            //backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 35, 60, 2, 12, 30, 45]
        }]
    
    },

    // Configuration options go here
    options: {}
});

</script>
    </div>
    <div>
        <h3>Grafica 2</h3>
        <canvas id="myChart2"></canvas>

<script>
var ctx2 = document.getElementById('myChart2').getContext('2d');
var infrografica2=[1,35,60,2,12,30,45];
var chart2 = new Chart(ctx2, {
   
    // The type of chart we want to create
    
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Año Actual',
             backgroundColor: 'rgb(120, 199, 150)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }, {
            label: 'Año Anterior',
           backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: infrografica2
        }]
    
    },

    // Configuration options go here
    options: {}
});
</script>
        
    </div> 

</div>






<?php
require('../views/vwplanos.php');
include('../views/template2.php');
