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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
            <h1 class="h2">Booking List</h1>
          </div>
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="equipment-tab" data-toggle="tab" href="#equipment" role="tab" aria-controls="equipment" aria-selected="true">Equipment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="facilities-tab" data-toggle="tab" href="#facilities" role="tab" aria-controls="facilities" aria-selected="false">Facilities</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="equipment" role="tabpanel" aria-labelledby="equipment-tab">
              <?php include 'booking_equipment.php'; ?>
            </div>
            <div class="tab-pane fade" id="facilities" role="tabpanel" aria-labelledby="facilities-tab">
              <?php include 'booking_facilities.php'; ?>
            </div>
          </div>


          <!-- Pie cart -->
        </main>
      </div>
    </div>
<?php include '_partial/footer.php'; ?>
