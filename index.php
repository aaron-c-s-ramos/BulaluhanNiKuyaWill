<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Bulaluhan ni Kuya Will</title>
    <meta name="description" content="This is a table reservation website used for Bulaluhan ni Kuya Will restaurant. Reserving a table is as easy as clicking a button and inputting a few information. Comes with real-time updates of table availability."/>
    <meta property="og:title" content="Table Reservation for Bulaluhan ni Kuya Will"/>
    <meta property="og:description" content="This is a table reservation website used for Bulaluhan ni Kuya Will restaurant with real-time updates of table availability."/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0"/>
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
      <link href="index.css" rel="stylesheet"/>
      <div class="home-container">
        <?php require_once("navBar.php"); ?>
        <div class="home-main-banner-section">
          <div id="MainBanner" class="home-banner bannerContainer"></div>
        </div>
        <div class="modal fade" id="foodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="foodModalLabel">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
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
        <div class="home-features-section">
          <div class="home-features-container featuresContainer">
            <div class="home-features">
              <div class="home-container1">
                <h2 class="home-features-heading">FEATURES</h2>
              </div>
              <div class="home-container2">
                <div class="featuresCard feature-card-feature-card">
                  <img class="featuresIcon" src="public/features_icon_box.png" alt="Features Icon Bullet" height="32px">
                  <div class="feature-card-container">
                    <h3 class="feature-card-text">
                      <span>Easy Reservation</span>
                    </h3>
                    <span class="bodySmall feature-card-text1">
                      <span>Book a table in just a few clicks</span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <img class="featuresIcon" src="public/features_icon_box.png" alt="Features Icon Bullet" height="32px">
                  <div class="feature-card-container">
                    <h3 class="feature-card-text">
                      <span>Extensive Menu Selection</span>
                    </h3>
                    <span class="bodySmall feature-card-text1">
                      <span>Explore a diverse array of culinary delights</span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <img class="featuresIcon" src="public/features_icon_box.png" alt="Features Icon Bullet" height="32px">
                  <div class="feature-card-container">
                    <h3 class="feature-card-text">
                      <span>Real-Time Availability</span>
                    </h3>
                    <span class="bodySmall feature-card-text1">
                      <span>Check live availability and choose your desired time slot</span>
                    </span>
                  </div>
                </div>
                <div class="featuresCard feature-card-feature-card">
                  <img class="featuresIcon" src="public/features_icon_box.png" alt="Features Icon Bullet" height="32px">
                  <div class="feature-card-container">
                    <h3 class="feature-card-text">
                      <span>Confirmation Notifications</span>
                    </h3>
                    <span class="bodySmall feature-card-text1">
                      <span>Receive instant confirmation for your reservation</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="home-reserve-your-table-now-section heroContainer">
          <div class="home-container3">
            <button type="button" class="reserve-button reserveTableButton Button">
              <span class="home-reserve-your-table-now">&nbsp;Reserve Your Table Now&nbsp;</span>
            </button>
          </div>
        </div>
        <div class="home-banner1">
          <div class="home-hero">
            <div class="home-container4">
              <h1 class="home-text04">Location</h1>
                <span class="home-text05">
                  We are located at&nbsp;<i>Emilio Aguinaldo Highway, Salitran, Dasmarinas, Cavite.</i><br/>
                  <hr>
                  Close landmarks are Shell and Caltex Gas Stations.
                </span>
                <a href="https://maps.app.goo.gl/hA5gLrBCk2EKRzFA8" target="_blank" rel="noreferrer noopener" class="home-link1 button">
                  <span>
                    <span class="home-text07 Button">Open Google Maps</span><br/>
                  </span>
                </a>
            </div>
            <div class="home-container4">
              <h1 class="home-text04">Facebook</h1>
                <span class="home-text05">
                  You can message us at our Facebook Page for any inquiries and updates.<br/>
                  <hr>
                  Please check out our Facebook Page below.
                </span>
                <a href="https://www.facebook.com/bulaluhannikuyawill" target="_blank" rel="noreferrer noopener" class="home-link1 button">
                  <span>
                    <span class="home-text07 Button">Open Facebook</span><br/>
                  </span>
                </a>
            </div>
          </div>
        </div>
      </div>
      <div class="home-faq">
        <div class="home-faq-container faqContainer">
          <div class="home-faq1">
            <div class="home-container5">
              <span class="overline">
                <span>FAQ</span><br/>
              </span>
              <h2 class="home-text12">Common questions</h2>
              <span class="home-text13 bodyLarge">
                <span>Here are some of the most common questions that we get.</span><br/>
              </span>
            </div>
            <div class="home-container6">
              <div class="question1-container">
                <span class="question1-text">
                  <span>How can I make a reservation?</span>
                </span>
                <span class="bodySmall">
                  <span>You can make a reservation by filling out the reservation form on our website or by calling us directly.</span>
                </span>
              </div>
              <div class="question1-container">
                <span class="question1-text">
                  <span>Is there a maximum number of guests for a reservation?</span>
                </span>
                <span class="bodySmall">
                  <span>We can accommodate groups of up to 6 guests for a reservation. For larger groups, please contact us directly.</span>
                </span>
              </div>
              <div class="question1-container">
                <span class="question1-text">
                  <span>Can I modify or cancel my reservation?</span>
                </span>
                <span class="bodySmall">
                  <span>Yes, you can modify or cancel your reservation by contacting us at least 24 hours in advance.</span>
                </span>
              </div>
              <div class="question1-container">
                <span class="question1-text">
                  <span>Do you accept walk-in customers?</span>
                </span>
                <span class="bodySmall">
                  <span>Yes, we welcome walk-in customers. However, we recommend making a reservation to ensure availability.</span>
                </span>
              </div>
              <div class="question1-container">
                <span class="question1-text">
                  <span>Is there a dress code for dining at your restaurant?</span>
                </span>
                <span class="bodySmall">
                  <span>There is no strict dress code, but we recommend casual attire for a pleasant dining experience.</span>
                </span>
              </div>
            </div>
          </div>
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
