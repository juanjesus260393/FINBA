$(document).ready(function () {
    $.ajax({
        url: "http://localhost:100/finbaproject/FINBA/views/solarpanels/graph/datagraphinvestormonth.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var score = [];
            var mes = [];
            
            for (var i in data) {
                mes.push(i);
                score.push(data[i].total);
            }

            var chartdata = {
                labels: mes,
                datasets: [
                    {
                        label: 'Total kWh Generado durante el mes',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: score
                    }
                ]
            };

            var ctx = $("#mycanvasmonth");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
});