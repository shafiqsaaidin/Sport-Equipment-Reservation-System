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
        <div class="row">
          <div class="col-md-6">
            <h2>Facilities</h2>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
              New Facilities
            </button>
          </div>
        </div><br>
        <!-- table -->
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-hover table-sm">
              <thead class="bg-secondary text-white">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require '../model/connection.php';
                  $num = "1";

                  $sql = "SELECT * FROM facilities";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();
                  $conn->close();

                  while ($row = mysqli_fetch_array($result)):
                ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td class="<?php echo ($row['status'] == 'Booked') ? 'text-primary' : 'text-success'; ?>"><?php echo $row['status']; ?></td>
                  <td class="text-center">
                    <form method="post" action="include/facilities.inc.php">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">
                          <span data-feather="edit"></span>
                        </button>
                        <button type="submit" class="btn btn-danger" name="delete">
                          <span data-feather="trash-2"></span>
                        </button>
                      </div>
                    </form>
                  </td>

                  <!-- The Modal -->
                  <div class="modal fade" id="myModal<?php echo $row['id']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Facilities</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form method="post" action="include/facilities.inc.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                              <label>Facilities Name</label>
                              <input type="text" class="form-control" name="name" required value="<?php echo $row['name'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" name="status" required>
                                <option hidden>Select Status</option>
                                <option value="Available" <?php echo ($row['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                <option value="Booked" <?php echo ($row['status'] == 'Booked') ? 'selected' : ''; ?>>Booked</option>
                                <option value="Maintenance" <?php echo ($row['status'] == 'Maintenance') ? 'selected' : ''; ?>>Maintenance</option>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
                          </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

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
          <h4 class="modal-title">New Facilities</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="include/facilities.inc.php">
            <div class="form-group">
              <label>Facilities Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status" required>
                <option hidden>Select Status</option>
                <option value="Available">Available</option>
                <option value="Booked">Booked</option>
                <option value="Maintenance">Maintenance</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="new">Submit</button>
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
