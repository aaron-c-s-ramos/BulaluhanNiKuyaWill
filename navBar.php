<header>
  <!-- Navigation bar with responsive design and fixed top position -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <!-- Container for navigation items, aligned to both ends -->
    <div class="container-fluid d-flex justify-content-between">
      <!-- Branding section with textual logo -->
      <div>
          <h3 class="navbar-brand fs-3 text-uppercase fw-bold">Bulaluhan ni Kuya Will</h3>
      </div>
      <!-- Toggle button for smaller screens -->
      <div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Off-canvas navigation menu -->
        <div class="offcanvas offcanvas-start float-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Bulaluhan Ni Kuya Will</h5>
            <button type="button" class="btn btn-lg btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <!-- Navigation links within the off-canvas menu -->
            <div class="navbar-nav justify-content-center flex-grow-1">
              <a href="/" type="button" class="btn btn-lg btn-success me-1 mt-3 mb-3">Home</a>
              <button type="button" class="btn btn-lg btn-success me-1 text-nowrap mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#foodModal">Explore Menu</button>
              <a href="reservation.php" type="button" class="btn btn-lg btn-success me-1 text-nowrap mt-3 mb-3">View Reservations</a>
              <a href="bookTable.php#bookingForm" type="button" class="btn btn-lg btn-success me-1 text-nowrap mt-3 mb-3">Book A Table</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
