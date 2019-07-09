$(document).ready(function(){
  $.ajax({
    url: "../views/solarpanels/graph/datagraphinvestoradmin.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var school = [];
      var score = [];

      for(var i in data) {
        school.push(data[i].school);
        score.push(data[i].total);
      }

      var chartdata = {
        labels: school,
        datasets : [
          {
            label: 'Total kWh Generado',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvasadmin");

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