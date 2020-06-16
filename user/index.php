<?php include '_partial/header.php'; ?>
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
          <img src="../img/bg_img.jpg" class="img-fluid" alt="Responsive image">
          <br><br>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <div id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Facilities Booking Status
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover table-sm">
                      <thead class="bg-secondary text-white">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../model/connection.php';
                          $num = "1";

                          $sql = "Select b.id, f.name, b.start_date, b.end_date, b.start_time, b.end_time From bookingfacilities b JOIN facilities f on b.faci_id = f.id WHERE b.user_id = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("s", $_SESSION['user_id']);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          $conn->close();

                          while ($row = mysqli_fetch_array($result)):
                        ?>
                        <tr>
                          <td><?php echo $num++; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo date('d/m/Y', strtotime($row['start_date'])); ?></td>
                          <td><?php echo date('d/m/Y', strtotime($row['end_date'])); ?></td>
                          <td><?php echo $row['start_time']; ?></td>
                          <td><?php echo $row['end_time']; ?></td>
                          <td class="text-center">
                            <form method="post" action="include/index.inc.php">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger" name="delete_faci">
                                  <span data-feather="trash-2"></span>
                                </button>
                              </div>
                            </form>
                          </td>
                        </tr>
                        <?php endwhile ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Equipment Booking Status
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable2" class="table table-bordered table-hover table-sm">
                      <thead class="bg-secondary text-white">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Quantity</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Start Time</th>
                          <th>End Time</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../model/connection.php';
                          $num = "1";

                          $sql = "SELECT * FROM bookingequipment INNER JOIN equipment ON equip_id = equipment.id WHERE bookingequipment.user_id = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("s", $_SESSION['user_id']);
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
                          <td><?php echo date('d/m/Y', strtotime($row['booking_date'])); ?></td>
                          <td><?php echo date('d/m/Y', strtotime($row['deadline_date'])); ?></td>
                          <td><?php echo $row['booking_time']; ?></td>
                          <td><?php echo $row['deadline_time']; ?></td>
                          <td class="text-center">
                            <form method="post" action="include/index.inc.php">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger" name="delete_equip">
                                  <span data-feather="trash-2"></span>
                                </button>
                              </div>
                            </form>
                          </td>
                        </tr>
                        <?php endwhile ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Event Booking Status
                  </button>
                </h5>
              </div>
              <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover table-sm">
                      <thead class="bg-secondary text-white">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th class="text-center">Submitted on</th>
                          <th class="text-center">Paperwork</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../model/connection.php';
                          $num = "1";

                          $sql = "SELECT * FROM event WHERE user_id = ?";
                          $stmt = $conn->prepare($sql);
                          $stmt->bind_param("s", $_SESSION['user_id']);
                          $stmt->execute();
                          $result = $stmt->get_result();
                          $stmt->close();
                          $conn->close();

                          while ($row = mysqli_fetch_array($result)):
                        ?>
                        <tr>
                          <td><?php echo $num++; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td class="text-center"><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                          <td class="text-center">
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">
                              View
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Paperwork</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <img class="img-fluid" src="<?php echo "../user/".$row['image']; ?>" alt="">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="text-center"><?php echo $row['status']; ?></td>
                          <td class="text-center">
                            <form method="post" action="include/index.inc.php">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger" name="delete_event">
                                  <span data-feather="trash-2"></span>
                                </button>
                              </div>
                            </form>
                          </td>
                        </tr>
                        <?php endwhile ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </main>
      </div>
    </div>
<?php include '_partial/footer.php'; ?>
