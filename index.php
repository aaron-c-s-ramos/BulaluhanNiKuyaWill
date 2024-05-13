<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once("head.php");?>
    <!-- Link to the main stylesheet for this page -->
    <link href="styles/index.css" rel="stylesheet"/>
  </head>
  <body id="body">
    <!-- Main container for the page content -->
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
        <!-- Features section included from a separate PHP file -->
        <?php require_once("features.php");?>
        <div class="home-reserve-your-table-now-section heroContainer">
          <div class="home-container3">
            <!-- Big button to reserve a table -->
            <button type="button" class="reserve-button reserveTableButton Button" id="reserveBtn">
              <span class="home-reserve-your-table-now">&nbsp;Reserve Your Table Now&nbsp;</span>
            </button>
          </div>
        </div>
        <!-- Google Maps and Facebook links included from a separate PHP file -->
        <?php require_once("mapsFB.php");?>
      </div>
      <!-- FAQ section included from a separate PHP file -->
      <?php require_once("faq.php");?>
      <button type="button" onclick="scrollToTop()" id="scrollToTopBtn" title="Return to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 19V5M5 12l7-7 7 7"/>
        </svg>
      </button>
      <!-- Footer section included from a separate PHP file -->
      <?php require_once("footer.php");?>
    </div>
    <!-- JavaScript for loading placeholder for cover banner -->
    <script src="../js/loading.js" defer></script>
    <!-- JavaScript for the scroll to top floating button -->
    <script src="../js/scrollTop.js" defer></script>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  </body>
</html>
