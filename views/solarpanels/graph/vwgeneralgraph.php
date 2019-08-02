<!-- javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/Chart/Chart.min.js"></script>
<script type="text/javascript" src="../js/datagraphinvestor.js"></script>
<script type="text/javascript" src="../js/datagraphinvestoryear.js"></script>
<script type="text/javascript" src="../js/datagraphinvestormonth.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<style type="text/css">
    #chart-container {
        position: absolute;
        width: 640px;
        height: auto;
    }
</style>
<script>
    var total = [0];
    var fecha = [0];
</script>  

<?php
foreach ($dateinvestorgraphtoday as $datagraph) {
    ?>
    <script>

        total.push('<?php echo $datagraph[0] ?>');
        fecha.push('<?php echo $datagraph[1] ?>');
    </script>

    <?php
}
foreach ($promaño as $promxmes) {
    ?>
    <script>
        mesaño.push('<?php echo $promxmes[0] ?>');
        medidames.push('<?php echo $promxmes[1] ?>');
    </script>
    <?php
}
?> 
<div> 
    <div class="tabbal">
        <div class="container">
            <div id="content">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li>
                        <a class="nav-link active" href="#day" data-toggle="tab">DIA</a>
                    </li>
                    <li><a class="nav-link active" href="#month" data-toggle="tab">MES</a>
                    </li>
                    <li><a class="nav-link active" href="#year" data-toggle="tab">AÑO</a>
                    </li>
                    <li><a class="nav-link active" href="#total" data-toggle="tab">TOTAL</a>
                    </li>
                </ul>
            </div>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane" id="day"><br> 
                    <canvas id="myChart3"></canvas>
                    <form action="" method="post">  
                        <input type="date" id = "searchfordayusr" name="searchfordayusr" value="<?php echo date("Y-m-d"); ?>"> 
                        <a href="javascript:;" onclick="parentNode.submit();">Buscar Informacion</a>
                        <input type="hidden" name="mess" value= "">
                    </form>
                    <script>
                        var ctx3 = document.getElementById('myChart3').getContext('2d');
                        var chart3 = new Chart(ctx3, {

                            // The type of chart we want to create

                            type: 'bar',

                            // The data for our dataset
                            data: {
                                labels: fecha,
                                datasets: [{

                                        label: 'Consumos Hoy',
                                        backgroundColor: 'rgb(120, 199, 150)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: total
                                    }, {
                                        label: 'Hoy linea',
                                        labels: fecha,
                                        type: "line",
                                        borderColor: "#3e95cd",
                                        data: total,
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
                                }, legend: {display: true}
                            }
                        });
                    </script>
                </div>
                <div class="tab-pane" id="month">
                    <?php
                    include('../views/solarpanels/graph/includegraphmonth.php');
                    ?>
                </div>
                <div class="tab-pane" id="year">
                    <?php
                    include('../views/solarpanels/graph/includegraphyear.php');
                    ?>
                </div>
                <div class="tab-pane" id="total">
                    <?php
                    include('../views/solarpanels/graph/includegraphtotal.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>