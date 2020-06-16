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
            <h2>Equipment</h2>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
              New Equipment
            </button>
          </div>
        </div><br>
          <div class="table-responsive">
            <table id="myTable" class="table table-bordered table-hover table-sm">
              <thead class="bg-secondary text-white">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th class="text-center">Action</th>
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
                  <td class="text-center">
                    <form method="post" action="include/equipment.inc.php">
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
                          <h4 class="modal-title">Edit Equipment</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form method="post" action="include/equipment.inc.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                              <label>Equipment Name</label>
                              <input type="text" class="form-control" name="name" required value="<?php echo $row['equip_name']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Quantity</label>
                              <input type="number" class="form-control" name="quantity" required value="<?php echo $row['equip_quantity']; ?>">
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
          <h4 class="modal-title">Book Facilities</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="include/equipment.inc.php">
            <div class="form-group">
              <label>Equipment Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" class="form-control" name="quantity" required>
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
