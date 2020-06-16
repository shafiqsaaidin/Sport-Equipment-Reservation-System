<?php include '_partial/header.php'; ?>
</head>
  <body>
    <?php include '_partial/navbar.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include '_partial/sidebar.php'; ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <p class="text-white">Total User</p>
                  <div class="row">
                    <div class="col-md-6">
                      <?php
                        require '../model/connection.php';

                        $sql = "SELECT COUNT(user_id) as total from user WHERE user_type = 'user'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();

                        while ($row = mysqli_fetch_array($result)):
                      ?>
                        <h1><?php echo $row['total']; ?></h1>
                      <?php endwhile ?>
                    </div>
                    <div class="col-md-6">
                      <span class="icon" data-feather="users"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <p class="text-white">Total Admin</p>
                  <div class="row">
                    <div class="col-md-6">
                      <?php

                        $sql = "SELECT COUNT(user_id) as total from user WHERE user_type = 'admin'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();

                        while ($row = mysqli_fetch_array($result)):
                      ?>
                        <h1><?php echo $row['total']; ?></h1>
                      <?php endwhile ?>
                    </div>
                    <div class="col-md-6">
                      <span class="icon" data-feather="user"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <p class="text-white">Total Facilities</p>
                  <div class="row">
                    <div class="col-md-6">
                      <?php

                        $sql = "SELECT COUNT(id) as total from facilities";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();

                        while ($row = mysqli_fetch_array($result)):
                      ?>
                        <h1><?php echo $row['total']; ?></h1>
                      <?php endwhile ?>
                    </div>
                    <div class="col-md-6">
                      <span class="icon" data-feather="home"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card bg-info text-white">
                <div class="card-body">
                  <p class="text-white">Total Equipment</p>
                  <div class="row">
                    <div class="col-md-6">
                      <?php

                        $sql = "SELECT COUNT(id) as total from equipment";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();

                        while ($row = mysqli_fetch_array($result)):
                      ?>
                        <h1><?php echo $row['total']; ?></h1>
                      <?php endwhile ?>
                    </div>
                    <div class="col-md-6">
                      <span class="icon" data-feather="package"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Cart -->
          <div class="row mt-4">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="col"><h4 class="text-secondary">Facilities</h4></div>
                  <div class="col">
                    <select class="custom-select mr-sm-2" name="month" id="month">
                      <option disabled>Month...</option>
                      <option value="1">January</option>
                      <option value="2">Fabruary</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">Novermber</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                </div>
                <div class="card-body">
                  <canvas class="chart-container" id="chart-area"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-secondary">Facilities Booking Status</h4>
                </div>
                <div class="card-body">
                  <canvas class="chart-container" id="chart-area2"></canvas>
                </div>
              </div>

            </div>
          </div>


          <!-- Pie cart -->
        </main>
      </div>
    </div>
<?php include '_partial/footer.php'; ?>
