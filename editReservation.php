<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once("head.php");?>
    <!-- Include database connection and utility functions -->
    <?php
    require_once("dB/conn.php");
    require_once("dB/functions.php");
    require_once ("dB/searchValues.php");
    require_once("dB/searchResponse.php");
    ?>
    <!-- Link to the main stylesheet for this page -->
    <link href="styles/reservation.css" rel="stylesheet"/>
  </head>
  <body onload="document.getElementById('viewBooking').scrollIntoView({behavior:'smooth'})">
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
      <!-- Reservation search form -->
      <div class="reserve-container center-all container-fluid d-flex align-items-center justify-content-center">
        <div class="container-fluid formContainer" id="viewBooking">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="container-fluid">
                <div class="card container p-5 my-5 rounded-5 text-dark text-center">
                  <div class="card-body rounded-5 border border-secondary-subtle">
                    <h2 class="card-title p-0 pb-2 m-0 display-5">Reservation Checking</h2><hr>
                    <div class="p-3 m-3">
                      <div class="row g-3">
                        <form class="text-center" action="dB/update.php" method="POST">
                          <span class="font-monospace fst-italic text-secondary-emphasis">*&nbsp;Can be edited.</span><br>
                          <div>
                            <label for="Reservation_ID" class="form-label col-form-label-lg">Reservation ID</label>
                            <input type="number" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_ID" placeholder="Reservation ID" aria-label="Reservation ID" name="Reservation_ID" value="<?php echo $Reservation_ID; ?>" readonly>
                          </div>
                          <div>
                            <label for="Status" class="form-label col-form-label-lg">Status</label>
                            <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Status" placeholder="Status" aria-label="Status" name="Status" value="<?php echo $Status; ?>" readonly>
                          </div>
                          <div>
                            <label for="Customer_First_Name" class="form-label col-form-label-lg">
                              First Name&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_First_Name" placeholder="First Name" aria-label="First Name" name="Customer_First_Name" value="<?php echo $Customer_First_Name; ?>">
                          </div>
                          <div>
                            <label for="Customer_Last_Name" class="form-label col-form-label-lg">
                              Last Name&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Last_Name" placeholder="Last Name" aria-label="Last Name" name="Customer_Last_Name" value="<?php echo $Customer_Last_Name; ?>">
                          </div>
                          <div>
                            <label for="Number_Of_Guests" class="form-label col-form-label-lg">
                              Guest Quantity&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="number" class="form-control form-control-lg border border-secondary-subtle" id="Number_Of_Guests" placeholder="Number of Guests" aria-label="- Number of Guests -" name="Number_Of_Guests" value="<?php echo $Number_Of_Guests; ?>">
                          </div>
                          <div>
                            <label for="Customer_Phone" class="form-label col-form-label-lg">
                              Phone Number&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="tel" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Phone" placeholder="Phone Number" aria-label="Phone Number" name="Customer_Phone" value="<?php echo $Customer_Phone; ?>">
                          </div>
                          <div>
                            <label for="Reservation_Date" class="form-label col-form-label-lg">
                              Date&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="date" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Date" aria-label="Date" name="Reservation_Date" value="<?php echo $Reservation_Date; ?>">
                          </div>
                          <div>
                            <label for="Reservation_Time" class="form-label col-form-label-lg">
                              Time&nbsp;<span class="font-monospace fst-italic small text-secondary-emphasis">*</span></label>
                            <input type="time" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Time" aria-label="Time" name="Reservation_Time" value="<?php echo $Reservation_Time; ?>">
                          </div>
                          <div>
                            <label for="Submitted_Reservation" class="form-label col-form-label-lg">Submitted On</label>
                            <input type="datetime-local" class="form-control form-control-lg border border-secondary-subtle" id="Submitted_Reservation" aria-label="Submitted Reservation Date" name="Submitted_Reservation" value="<?php echo $Submitted_Reservation; ?>">
                          </div>
                          <div>
                            <button type="submit" class="btn btn-lg btn-success bg-gradient mt-3 mb-1" name="submit" id="submit">Submit Edit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <script src="js/loading.js" defer></script>
    <!-- JavaScript for the scroll to top floating button -->
    <script src="js/scrollTop.js" defer></script>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
