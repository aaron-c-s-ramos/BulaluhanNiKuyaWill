<div class="modal fade" id="foodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="foodModalLabel">
  <!-- Modal dialog with centered alignment and scrollable content -->
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <!-- Modal header with title and close button -->
      <div class="modal-header d-flex justify-content-between">
        <h1 class="modal-title fs-5" id="foodModalLabel">Food Menu</h1>
        <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
      </div>
      <!-- Modal body containing the carousel for the food menu -->
      <div class="modal-body">
        <div id="foodMenu" class="carousel slide carousel-fade">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="0" class="active" aria-current="true" title="Food Menu 1"></button>
            <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="1" title="Food Menu 2"></button>
            <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="2" title="Food Menu 3"></button>
            <button type="button" data-bs-target="#foodMenu" data-bs-slide-to="3" title="Food Menu 4"></button>
          </div>
          <!-- Carousel items with images -->
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
      <!-- Modal footer with navigation buttons -->
      <div class="modal-footer justify-content-evenly">
        <button class="btn btn-lg btn-dark" type="button" data-bs-target="#foodMenu" data-bs-slide="prev">Previous</button>
        <button class="btn btn-lg btn-dark" type="button" data-bs-target="#foodMenu" data-bs-slide="next">Next</button>
      </div>
    </div>
  </div>
</div>
