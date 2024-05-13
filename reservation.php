<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once("head.php");?>
    <!-- Include database connection and utility functions -->
    <?php
    require_once("conn.php");
    require_once("functions.php");
    $Reservation_ID = 0;
    require_once("searchResponse.php");
    ?>
    <!-- Link to the main stylesheet for this page -->
    <link href="reservation.css" rel="stylesheet"/>
  </head>
  <body>
    <div>
      <!-- Navigation bar included from a separate PHP file -->
      <?php require_once("navBar.php");?>
      <div class="home-container">
        <!-- Main banner section -->
        <div class="mainBanner" id="mainBanner" name="mainBanner">
          <div class="spinner-grow text-secondary position-absolute top-50 start-50 translate-middle" id="spinner" role="status"></div>
          <div id="bgImage" class="bgImage visually-hidden"></div>
        </div>
        <!-- Food menu modal included from a separate PHP file -->
        <?php require_once("foodMenuModal.php");?>
      </div>
      <!-- Conditional display alert message based on Reservation_ID -->
      <?php
        // Display success message if Reservation_ID is greater than 0
        if ($Reservation_ID > 0)
        {
          echo '<div class="reserve-container-alert pb-1 pt-5 pt-0 mt-0 center-all">
                  <div class="col-6 mx-auto">
                    <div class="alert alert-success fade show h2" role="alert">
                      <strong>Match found!</strong>
                      <br/>Reservation ID: '. $Reservation_ID.'
                    </div>
                  </div>
                </div>';
        }
        // Display error message if Reservation_ID is -1
        if ($Reservation_ID === -1)
        {
          $Reservation_ID = 0;
          echo '<div class="reserve-container-alert pb-1 pt-5 pt-0 mt-0 center-all">
                  <div class="col-6 mx-auto">
                    <div class="alert alert-danger fade show h2" role="alert">
                      <strong>No match found!</strong>
                      <br/>You do not have a reservation.
                    </div>
                  </div>
                </div>';
        }
      ?>
      <!-- Reservation search form -->
      <div class="reserve-container center-all container-fluid d-flex align-items-center justify-content-center">
        <form class="col-auto container text-center" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" method="POST">
          <label for="search" class="h5">Enter your Reservation Number</label>
          <input type="number" class="form-control form-control-lg text-center" id="search" name="search" placeholder=" Reservation Number">
          <button type="submit" class="btn btn-lg btn-success mt-3" name="submit" id="searchBtn">Search</button>
        </form>
      </div>
      <button type="button" onclick="scrollToTop()" id="scrollToTopBtn" title="Return to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 19V5M5 12l7-7 7 7"/>
        </svg>
      </button>
      <!-- Footer section included from a separate PHP file -->
      <?php require_once("footer.php");?>
    </div>
    <!-- JavaScript for loading placeholder for cover banner -->
    <script src="loading.js" defer></script>
    <!-- JavaScript for the scroll to top floating button -->
    <script src="scrollTop.js" defer></script>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
