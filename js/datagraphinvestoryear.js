$(document).ready(function(){
  $.ajax({
    url: "http://localhost/finbaproject/FINBA/views/solarpanels/graph/datagraphinvestoryear.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var mes = [];
      var score = [];

      for(var i in data) {
        mes.push(data[i].mes);
        score.push(data[i].total);
      }

      var chartdata = {
        labels: mes,
        datasets : [
          {
            label: 'Total kWh Generado',
            backgroundColor: 'rgba(255,0,0,0.6)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvasyear");

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