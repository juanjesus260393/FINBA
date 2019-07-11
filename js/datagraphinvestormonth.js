$(document).ready(function () {
    $.ajax({
        url: "../views/solarpanels/graph/datagraphinvestormonth.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var score = [];
            var mes = [];
            
            for (var i in data) {
                mes.push(data[i].dia);
                score.push(data[i].total);
            }

            var chartdata = {
                labels: mes,
                datasets: [
                    {
                        label: 'Total kWh Generado',
                        backgroundColor: 'rgba(241, 90, 34, 1)',
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
