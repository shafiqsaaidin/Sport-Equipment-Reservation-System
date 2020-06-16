<!-- main content -->
<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-lg pt-3 px-4">
      <!-- table -->
      <div class="row">
        <div class="col-md-6">
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
                <th>Username</th>
                <th>Eqipment Name</th>
                <th>Quantity</th>
                <th>Booking Date</th>
                <th>Due Date</th>
                <th>Booking Time</th>
                <th>Return Time</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require '../model/connection.php';
                $num = "1";

                $sql = "SELECT c.username, b.equip_name, a.quantity, a.booking_date, a.deadline_date, a.booking_time, a.deadline_time
                        FROM bookingequipment a LEFT JOIN equipment b ON a.equip_id = b.id LEFT JOIN user c ON a.user_id = c.user_id ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                $stmt->close();
                $conn->close();

                while ($row = mysqli_fetch_array($result)):
              ?>
              <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['equip_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['booking_date']; ?></td>
                <td><?php echo $row['deadline_date']; ?></td>
                <td><?php echo $row['booking_time']; ?></td>
                <td><?php echo $row['deadline_time']; ?></td>
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
        <form method="post" action="include/booking.inc.php">
          <div class="form-group">
            <label>Matric/Staff No</label>
            <input type="text" class="form-control" name="user_id">
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
          <button type="submit" class="btn btn-primary" name="booking_equipment">Submit</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
