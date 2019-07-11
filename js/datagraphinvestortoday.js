$(document).ready(function(){
  $.ajax({
    url: "http://localhost:100/finbaproject/FINBA/views/solarpanels/graph/datagraphinvestortoday.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var score = [];

      for(var i in data) {
        score.push(data[i].total);
      }

      var chartdata = {
        labels: ['hoy'],
        datasets : [
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

      var ctx = $("#mycanvastoday");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});