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
      <!-- Modal footer with navigation buttons and pagination -->
      <div class="modal-footer justify-content-center">
        <nav aria-label="Food Menu Navigation">
          <ul class="pagination pagination-lg rounded">
            <li>
              <a class="page-link btn rounded-0 rounded-start text-black" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide="prev" title="Previous">Previous</a>
            </li>
            <li class="page-item active">
              <a class="page-link btn rounded-0 text-white" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide-to="0" title="Food Menu 1">1</a>
            </li>
            <li class="page-item">
              <a class="page-link btn rounded-0 text-black" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide-to="1" title="Food Menu 2">2</a>
            </li>
            <li class="page-item">
              <a class="page-link btn rounded-0 text-black" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide-to="2" title="Food Menu 3">3</a>
            </li>
            <li class="page-item">
              <a class="page-link btn rounded-0 text-black" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide-to="3" title="Food Menu 4">4</a>
            </li>
            <li>
              <a class="page-link btn rounded-0 rounded-end text-black" type="button" role="button" data-bs-target="#foodMenu" data-bs-slide="next" title="Next">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- Synchronizes carousel pagination with active slide on slide change -->
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function()
  {
    var foodMenu = document.getElementById('foodMenu');
    foodMenu.addEventListener('slid.bs.carousel', function ()
    {
      var carouselItems = document.querySelectorAll('.carousel-item');
      var pageItems = document.querySelectorAll('.pagination .page-item');
      var pageLinks = document.querySelectorAll('.pagination .page-link');
      for (var i = 0; i < carouselItems.length; i++)
      {
        if (carouselItems[i].classList.contains('active'))
        {
          for (var j = 0; j < pageItems.length; j++)
          {
            pageItems[j].classList.remove('active');
            pageLinks[j+1].classList.remove('text-white');
            pageLinks[j+1].classList.add('text-black');
          }
          pageItems[i].classList.add('active');
          pageLinks[i+1].classList.remove('text-black');
          pageLinks[i+1].classList.add('text-white');
          
        }
      }
      
    });
  });
</script>
