<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='../js/jquery-3.4.1.min.js'></script>
<script src='../js/bootstrap.bundle.min.js'></script>

<!-- Datatables -->
<script src='../vendor/datatables/jquery.dataTables.min.js'></script>
<script src='../vendor/datatables/dataTables.bootstrap4.min.js'></script>

<!-- Icons -->
<script src="../js/feather.min.js"></script>

<!-- Graph -->
<script src="../js/Chart.bundle.min.js"></script>

<script>
  feather.replace()
</script>
<script>
$(document).ready( function () {
  $('#myTable').DataTable();
  $('#myTable2').DataTable();

  feather.replace()
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
  }, 2000);
});


</script>

<script>
var myChart;

var bulan = $('#month').on("change", function() {

  // alert(this.value);
  $.get("data.php?month="+this.value, function (data) {
    // console.log(data);
    var fname = [];
    var ftotal = [];

    for (var i in data) {
      fname.push(data[i].name);
      ftotal.push(data[i].total);
    }

    var chartdata = {
      labels: fname,
      datasets: [
        {
          data: ftotal,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }
      ]
    }

    if (myChart) {
      myChart.destroy();
    }

    var ctx = document.getElementById('chart-area').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: chartdata,
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
    });
  });
});


$.post("data.php?pie", function (data) {
  // console.log(data);
  var booked = [];
  var availble = [];

  for (var i in data) {
    booked.push(data[i].booked);
    availble.push(data[i].availble);
  }

  var chartdata2 = {
    labels: ['Booked', 'Availble'],
    datasets: [
      {
        // label: fname,
        data: [
          booked, availble
        ],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(85, 239, 196, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(85, 239, 196, 1)'
        ],
        borderWidth: 1
      }
    ]
  }

  var ctx = document.getElementById('chart-area2').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: chartdata2,
  });
});


</script>
