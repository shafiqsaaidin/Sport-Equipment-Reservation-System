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
            <h2>Event List</h2>
          </div>
        </div><br>
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

                  $sql = "SELECT * FROM event";
                  $stmt = $conn->prepare($sql);
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
                    <form method="post" action="include/event.inc.php">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="btn <?php echo ($row['status'] == "approved") ? 'btn-success' : 'btn-info'; ?>" name="approve" <?php echo ($row['status'] == 'approved') ? 'disabled' : ''; ?>>
                          <span data-feather="check"></span>
                        </button>
                        <button type="submit" class="btn <?php echo ($row['status'] == "approved") ? 'btn-danger' : 'btn-info'; ?>" name="pending" <?php echo ($row['status'] == 'pending') ? 'disabled' : ''; ?>>
                          <span data-feather="x"></span>
                        </button>
                      </div>
                      <button type="submit" class="btn btn-danger" name="delete">
                        <span data-feather="trash-2"></span>
                      </button>
                    </form>
                  </td>
                </tr>

                <?php endwhile ?>
              </tbody>
            </table>
          </div>
      </main>
    </div>
  </div>

<?php include '_partial/footer.php'; ?>
</body>
</html>
