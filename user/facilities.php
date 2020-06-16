<?php include '_partial/header.php'; ?>
<link href='../vendor/fullcalendar/core/main.min.css' rel='stylesheet' />
<link href='../vendor/fullcalendar/daygrid/main.min.css' rel='stylesheet' />
<link href='../vendor/fullcalendar/timegrid/main.min.css' rel='stylesheet' />
<style>
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

  .fc-content {
    color: #fff;
    text-align: center;
    font-size: 15px;
  }
</style>
</head>
<body>
  <?php include '_partial/navbar.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <?php include '_partial/sidebar.php'; ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <?php if(isset($_SESSION['message'])): ?>
            <div id="msgBox" class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="card bg-info text-white container">
        <div class="card-body">
          <h5 class="card-text">Anda tidak boleh membuat tempahan kurang dari tarikh penggunaan.
          Anda hanya layak membuat tempahan baru selepas tarikh pengguna fasiliti yang diluluskan sebelum ini berakhir.</p>
          <p class="card-text"></h5>
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
            Book Now
          </button>
        </div>
        </div>
        <br><br>
        <div id='calendar'></div>
      </main>
    </div>
  </div>
  <!-- main content -->


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Book Facilities</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="include/facilities.inc.php">
            <div class="form-group">
              <label>Matric/Staff No</label>
              <input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            </div>
            <div class="form-group">
              <label>Facilities</label>
              <select class="form-control" name="facilities" required>
                <option hidden>Select Facilities</option>
                <?php
                  require '../model/connection.php';

                  $sql = "SELECT * FROM facilities";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();

                  while ($row = mysqli_fetch_array($result)):
                ?>
                  <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['name']; ?>
                  </option>
                <?php endwhile ?>
              </select>
            </div>
            <div class="form-group">
              <label>Start Date</label>
              <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="form-group">
              <label>End Date</label>
              <input type="date" class="form-control" name="end_date" required>
            </div>
            <div class="form-group">
              <label>Start Time</label>
              <input type="time" class="form-control" name="start_time" required>
            </div>
            <div class="form-group">
              <label>End Time</label>
              <input type="time" class="form-control" name="end_time" required>
            </div>
            <button type="submit" class="btn btn-primary" name="booking">Submit</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<?php include '_partial/footer.php'; ?>
<script src='../vendor/fullcalendar/core/main.min.js'></script>
<script src='../vendor/fullcalendar/daygrid/main.min.js'></script>
<script src='../vendor/fullcalendar/timegrid/main.min.js'></script>
<script src='../vendor/fullcalendar/resource-common/main.min.js'></script>
<script src='../vendor/fullcalendar/resource-daygrid/main.min.js'></script>
<script src='../vendor/fullcalendar/resource-timegrid/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
    plugins: [ 'resourceTimeGrid' ],
    defaultView: 'resourceTimeGridFourDay',
    minTime: "07:00",
    maxTime: "19:00:00",
    slotDuration: '00:30', // 2 hours
    allDaySlot: false,
    columnHeaderFormat: { weekday: 'long', month: 'numeric', day: 'numeric', omitCommas: true },
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'resourceTimeGridDay,resourceTimeGridFourDay'
    },
    views: {
      resourceTimeGridFourDay: {
        type: 'resourceTimeGrid',
        duration: { days: 7 },
        buttonText: '7 days'
      }
    },
    resources: [
      { id: 'SPERS'
      }
    ],
    events: 'http://localhost/spers/user/include/calendar.inc.php'
  });

  calendar.render();
});
</script>
</body>
</html>
