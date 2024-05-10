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
        <div class="main-banner" id="mainBanner" name="mainBanner"></div>
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
        <form class="col-auto container text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <label for="search" class="h5">Enter your Reservation Number</label>
          <input type="number" class="form-control form-control-lg text-center" id="search" name="search" placeholder=" Reservation Number">
          <button type="submit" class="btn btn-lg btn-success mt-3" name="submit" id="searchBtn">Search</button>
        </form>
      </div>
      <!-- Footer section included from a separate PHP file -->
      <?php require_once("footer.php");?>
    </div>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
