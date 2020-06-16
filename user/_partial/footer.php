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

<!-- Graphs -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> -->
<!-- <script>
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      datasets: [{
        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });
</script> -->
