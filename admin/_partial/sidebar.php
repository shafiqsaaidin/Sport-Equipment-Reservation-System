<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'booking') ? 'active':''; ?>" href="booking.php">
          <span data-feather="book-open"></span>
          Booking
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'facilities') ? 'active':''; ?>" href="facilities.php">
          <span data-feather="map"></span>
          Facilities
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'equipment') ? 'active':''; ?>" href="equipment.php">
          <span data-feather="box"></span>
          Equipment
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'event') ? 'active':''; ?>" href="event.php">
          <span data-feather="calendar"></span>
          Event
        </a>
      </li>
    </ul>
  </div>
</nav>
