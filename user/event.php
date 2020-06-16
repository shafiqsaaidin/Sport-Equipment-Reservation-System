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
          <div class="col-md-6">
            <div class="text-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Upload
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
                  <th>Submitted on</th>
                  <th class="text-center">Paperwork</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require '../model/connection.php';
                  $num = "1";

                  $sql = "SELECT * FROM event WHERE user_id = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param('s', $_SESSION['user_id']);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();
                  $conn->close();

                  while ($row = mysqli_fetch_array($result)):
                ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['date']; ?></td>
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
                            <img class="img-fluid" src="<?php echo $row['image']; ?>" alt="">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td><?php echo $row['status']; ?></td>
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
          <h4 class="modal-title">Upload Paperwork</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="include/event.inc.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>Matric/Staff No</label>
              <input type="text" class="form-control" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
            </div>
            <div class="form-group">
              <label>File Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" accept="image/x-png,image/jpg,image/jpeg">
                <label class="custom-file-label">Choose file</label>
              </div>
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
