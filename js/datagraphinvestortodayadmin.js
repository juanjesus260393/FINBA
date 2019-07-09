$(document).ready(function () {
    $.ajax({
        url: "../views/solarpanels/graph/datagraphinvestortodayadmin.php",
        method: "GET",
        success: function (data) {
            console.log(data);
            var score = [];
            var school = [];

            for (var i in data) {
                score.push(data[i].total);
                school.push(data[i].school);
            }

            var chartdata = {
                labels: school,
                datasets: [
                    {
                        label: 'Total kWh Generado el dia de hoy',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: score
                    }
                ]
            };

            var ctx = $("#mycanvastodayadmin");

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