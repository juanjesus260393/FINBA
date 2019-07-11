$(document).ready(function(){
  $.ajax({
    url: "../views/solarpanels/graph/datagraphinvestoryearadmin.php",
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
            label: 'Total kWh Generado al año',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvasyearadmin");

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
