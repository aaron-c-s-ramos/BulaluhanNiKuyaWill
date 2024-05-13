<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once ("head.php"); ?>
    <!-- Include database connection and utility functions -->
    <?php
    // require_once("dB/conn.php");
    require_once ("dB/functions.php");
    ?>
    <!-- Link to the main stylesheet for this page -->
    <link href="styles/bookTable.css" rel="stylesheet"/>
  </head>
  <body>
    <div>
      <!-- Navigation bar included from a separate PHP file -->
      <?php require_once ("navBar.php"); ?>
      <div class="home-container">
        <!-- Main banner section -->
        <div class="mainBanner" id="mainBanner" name="mainBanner">
          <div class="spinner-grow text-secondary position-absolute top-50 start-50 translate-middle" id="spinner" role="status"></div>
          <div id="bgImage" class="bgImage visually-hidden"></div>
        </div>
        <!-- Food menu modal included from a separate PHP file -->
        <?php require_once ("foodMenuModal.php"); ?>
      </div>
      <div class="container-fluid formContainer" id="bookingForm">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card container p-5 my-5 rounded-5 text-dark text-center">
                <div class="card-body rounded-5 border border-secondary-subtle">
                  <h2 class="card-title p-0 pb-2 m-0 display-5">Table Booking</h2><hr>
                  <div class="p-3 m-3">
                    <form class="row g-3" novalidate method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>">
                      <span class="font-monospace fst-italic text-danger">*&nbsp;required field</span><br>
                      <input type="hidden" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_ID " name="Reservation_ID " autocomplete="off" value="">
                      <div class="col-md-6">
                        <label for="Customer_First_Name" class="form-label col-form-label-lg" title="ex. John">
                          First Name&nbsp;<span class="font-monospace fst-italic small text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_First_Name" placeholder="First Name" aria-label="First Name" name="Customer_First_Name" autocomplete="off" maxlength="255" value="" title="ex. John" required>
                        <span class="font-monospace fst-italic small text-danger"></span>
                      </div>
                      <div class="col-md-6">
                        <label for="Customer_Last_Name" class="form-label col-form-label-lg" title="ex. Doe">
                          Last Name&nbsp;<span class="font-monospace fst-italic small text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Last_Name" placeholder="Last Name" aria-label="Last Name" name="Customer_Last_Name" autocomplete="off" maxlength="255" value="" title="ex. Doe" required>
                        <span class="font-monospace fst-italic small text-danger"></span>
                      </div>
                      <div class="col-md-6">
                        <label for="Number_Of_Guests" class="form-label col-form-label-lg">
                          Guest Quantity&nbsp;<span class="font-monospace fst-italic small text-danger">*</span></label>
                        <select class="form-select form-select-lg text-center border border-secondary-subtle" id="Number_Of_Guests" name="Number_Of_Guests" required>
                          <option selected disabled value="">- Number of Guests -</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                        <span class="font-monospace fst-italic small text-danger"></span>
                      </div>
                      <div class="col-md-6">
                        <label for="Customer_Phone" class="form-label col-form-label-lg" title="ex. 09777777777">
                          Phone Number&nbsp;<span class="font-monospace fst-italic small text-danger">*</span></label>
                        <input type="number" class="form-control form-control-lg border border-secondary-subtle" id="Customer_Phone" placeholder="Phone Number" aria-label="Phone Number" name="Customer_Phone" autocomplete="off" title="ex. 09777777777" maxlength="11" value="" required>
                        <span class="font-monospace fst-italic small text-danger">
                        </span>
                      </div>
                      <div class="col-md-6 center-all">
                        <label for="Reservation_Date" class="form-label col-form-label-lg">
                          Date&nbsp;<span class="font-monospace fst-italic small text-danger">*</span></label>
                        <input type="date" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Date" aria-label="Date" name="Reservation_Date" autocomplete="off" min="2024-05-13" max="2024-12-21" value="currentDate" pattern="\d{4}-\d{2}-\d{2}" onclick="getCurrentDate(); this.onclick=null;" required>
                        <span class="font-monospace fst-italic small text-danger" >
                        </span>
                      </div>
                      <div class="col-md-6 center-all">
                        <label for="Reservation_Time" class="form-label col-form-label-lg">
                          Time&nbsp;<span class="font-monospace fst-italic small text-danger">*</span></label>
                        <input type="time" class="form-control form-control-lg border border-secondary-subtle" id="Reservation_Time" aria-label="Time" name="Reservation_Time" autocomplete="off" onclick="getCurrentTime(); this.onclick=null;" step="1800" pattern="[0-9]{2}:[0-9]{2}" required>
                        <span class="font-monospace fst-italic small text-danger">
                        </span>
                      </div>
                      <div class="col-md-6 mt-5">
                        <button type="submit" class="btn btn-success btn-lg" name="submit" id="submit" disabled>Book</button>
                      </div>
                      <div class="col-md-6 mt-5">
                        <button type="reset" class="btn btn-warning btn-lg" name="reset" id="reset">Clear</button>
                      </div>
                    </form>
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
      <?php require_once ("footer.php"); ?>
    </div>
    <!-- JavaScript for loading placeholder for cover banner -->
    <script src="js/loading.js" defer></script>
    <!-- JavaScript for the scroll to top floating button -->
    <script src="js/scrollTop.js" defer></script>
    <!-- JavaScript for the current date and time for the form -->
    <script src="js/dateTime.js" defer></script>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
