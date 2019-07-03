$(document).ready(function () {
    $.ajax({
        url: "http://localhost/finbaproject/FINBA/views/solarpanels/graph/datagraphinvestor.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var player = [];
            var score = [];

            for (var i in data) {
                player.push(data[i].name_investor);
                score.push(data[i].total);
            }

            var chartdata = {
                labels: player,
                datasets: [
                    {
                        label: 'Total kWh Generado',
                        backgroundColor: 'rgba(0, 181, 204, 1)',
                        borderColor: 'rgb(255, 99, 132)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: score
                    }
                ]
            };

            var ctx = $("#mycanvas");

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