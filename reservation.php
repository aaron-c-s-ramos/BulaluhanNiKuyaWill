<?php
require_once("conn.php");
require_once("functions.php");
$Reservation_ID = 0;
require_once("searchResponse.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Bulaluhan ni Kuya Will</title>
    <meta name="description" content="This is a table reservation website used for Bulaluhan ni Kuya Will restaurant. Reserving a table is as easy as clicking a button and inputting a few information. Comes with real-time updates of table availability."/>
    <meta property="og:title" content="Table Reservation for Bulaluhan ni Kuya Will"/>
    <meta property="og:description" content="This is a table reservation website used for Bulaluhan ni Kuya Will restaurant with real-time updates of table availability."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta property="twitter:card" content="summary_large_image"/>
    <?php include_once("resetDefaultStyle.php"); ?>
    <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css"/>
    <link rel="shortcut icon" href="public/favicon.ico" type="icon/png" sizes="32x32"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap" data-tag="font"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <link rel="stylesheet" href="style.css"/>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v19.0" nonce="p8H4x64l"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div>
      <link href="reservation.css" rel="stylesheet"/>
      <div class="home-container">
        <?php require_once("navBar.php"); ?>
        <div class="home-main-banner-section">
          <div id="MainBanner" class="home-banner bannerContainer"></div>
        </div>
        <div class="modal fade" id="foodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="foodModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full-screen">
            <div class="modal-content">
              <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="foodModalLabel">Food Menu</h1>
                <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
              </div>
              <div class="modal-body">
                <div id="foodMenu" class="carousel slide carousel-fade">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="0" class="active" aria-current="true" title="Food Menu 1"></button>
                    <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="1" title="Food Menu 2"></button>
                    <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="2" title="Food Menu 3"></button>
                    <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="3" title="Food Menu 4"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="public/menu_01.webp" class="d-block w-100" alt="Menu 1">
                    </div>
                    <div class="carousel-item">
                      <img src="public/menu_02.webp" class="d-block w-100" alt="Menu 2">
                    </div>
                    <div class="carousel-item">
                      <img src="public/menu_03.webp" class="d-block w-100" alt="Menu 3">
                    </div>
                    <div class="carousel-item">
                      <img src="public/menu_04.webp" class="d-block w-100" alt="Menu 4">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-evenly">
                <button class="btn btn-lg btn-dark" type="button" data-bs-target="#foodMenu" data-bs-slide="prev">Previous</button>
                <button class="btn btn-lg btn-dark" type="button" data-bs-target="#foodMenu" data-bs-slide="next">Next</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        if ($Reservation_ID > 0)
        {
          echo '<div class="reserve-container-alert pb-1 pt-5 pt-0 mt-0 center-all">
                  <div class="col-6 mx-auto">
                    <div class="alert alert-success fade show h2" role="alert">
                      <strong>Match found!</strong>
                      <br/>Reservation ID: '. $Reservation_ID .'
                    </div>
                  </div>
                </div>';
        }
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
      <div class="reserve-container center-all container-fluid p-5 d-flex align-items-center justify-content-center">
        <form class="col-auto container text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div class="row-1">
            <label for="search" class="h5">Enter your Reservation Number</label>
            <input type="number" class="form-control form-control-lg text-center" id="search" name="search" placeholder=" Reservation Number"><br>
          </div>
          <button type="submit" class="btn btn-lg btn-success" name="submit" id="searchBtn">Search</button>
        </form>
      </div>
      </div>
      <div class="home-footer">
        <footer class="footerContainer home-footer1">
          <div class="home-container7">
            <span class="bodySmall home-text16">© 2024 Bulaluhan Ni Kuya Will, All Rights Reserved.</span>
            <div class="home-icon-group">
              <a href="https://www.facebook.com/bulaluhannikuyawill" target="_blank" rel="noreferrer noopener" class="home-link2">
                <img src="public/fb_icon_dark.png" alt="Facebook Page" width="23px" height="39px" loading="lazy">
              </a>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
