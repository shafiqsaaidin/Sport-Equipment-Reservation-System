<?php include '_partial/header.php'; ?>
</head>
<body>
<?php include '_partial/navbar.php'; ?>
  <!-- main content -->
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
        <!-- table -->
        <div class="row">
          <div class="col-md-6">
            <h2>Equipment List</h2>
          </div>
          <div class="col-md-6">
            <div class="text-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Book Now
              </button>
            </div>
          </div>
        </div><br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-hover table-sm">
              <thead class="bg-secondary text-white">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require '../model/connection.php';
                  $num = "1";

                  $sql = "SELECT * FROM equipment";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();
                  $conn->close();

                  while ($row = mysqli_fetch_array($result)):
                ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row['equip_name']; ?></td>
                  <td><?php echo $row['equip_quantity']; ?></td>
                </tr>
                <?php endwhile ?>
              </tbody>
            </table>
          </div>
      </main>
    </div>
  </div>


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Book Equipment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="include/equipment.inc.php">
            <div class="form-group">
              <label>Matric/Staff No</label>
              <input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            </div>
            <div class="form-group">
              <label>Equipment</label>
              <select class="form-control" name="equipment_id" required>
                <option hidden>Select Equipment</option>
                <?php
                  require '../model/connection.php';

                  $sql = "SELECT * FROM equipment";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();

                  while ($row = mysqli_fetch_array($result)):
                ?>
                  <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['equip_name']; ?>
                  </option>
                <?php endwhile ?>
              </select>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" class="form-control" name="quantity" required>
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
</body>
</html>
