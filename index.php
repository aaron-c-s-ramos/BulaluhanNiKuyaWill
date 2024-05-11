<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Include common head elements from a separate PHP file -->
    <?php require_once("head.php");?>
    <!-- Link to the main stylesheet for this page -->
    <link href="index.css" rel="stylesheet"/>
  </head>
  <body>
    <!-- Main container for the page content -->
    <div>
      <!-- Navigation bar included from a separate PHP file -->
      <?php require_once("navBar.php");?>
      <div class="home-container">
        <!-- Main banner section -->
        <div class="main-banner" id="mainBanner" name="mainBanner"></div>
        <!-- Food menu modal included from a separate PHP file -->
        <?php require_once("foodMenuModal.php");?>
        <!-- Features section included from a separate PHP file -->
        <?php require_once("features.php");?>
        <div class="home-reserve-your-table-now-section heroContainer">
          <div class="home-container3">
            <!-- Big button to reserve a table -->
            <button type="button" class="reserve-button reserveTableButton Button">
              <span class="home-reserve-your-table-now">&nbsp;Reserve Your Table Now&nbsp;</span>
            </button>
          </div>
        </div>
        <!-- Google Maps and Facebook links included from a separate PHP file -->
        <?php require_once("mapsFB.php");?>
      </div>
      <!-- FAQ section included from a separate PHP file -->
      <?php require_once("faq.php");?>
      <!-- Footer section included from a separate PHP file -->
      <?php require_once("footer.php");?>
    </div>
    <!-- Bootstrap JavaScript bundle for handling UI components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
