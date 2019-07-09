$(document).ready(function(){
  $.ajax({
    url: "../views/solarpanels/graph/datagraphinvestortoday.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var score = [];
      var hora = [];

      for(var i in data) {
        score.push(data[i].total);
         hora.push(data[i].hora);
      }

      var chartdata = {
        labels: hora,
        datasets : [
          {
            label: 'kWh Generados por hora',
            //backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgb(255, 99, 132)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvastoday");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});