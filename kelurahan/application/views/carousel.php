<div class="carousel">
  <div class="carousel-container" >
    <div class="carousel-slide">
      <img src="<?= base_url('assets/img/pungli.jpg'); ?>" alt="Image 1" style="width:400px;height:500px;">
    </div>
    <div class="carousel-slide">
      <img src="<?= base_url('assets/img/kelurahan.jpeg'); ?>" alt="Image 2"style="width:400px;height:500px;">
    </div>
    <div class="carousel-slide">
      <img src="<?= base_url('assets/img/kelurahan.jpg'); ?>" alt="Image 3" style="width:400px;height:500px;">
    </div>
   
    <!-- Tambahkan slide lainnya sesuai kebutuhan -->
  </div>
  <button class="carousel-prev">Prev</button>
  <button class="carousel-next">Next</button>
</div>


<style>
.carousel {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-container {
  display: flex;
  transition: transform 0.5s ease;
}

.carousel-slide {
  flex: 0 0  auto;
  width: 100%;
}


</style>

<script>const carousel = document.querySelector('.carousel');
const carouselContainer = carousel.querySelector('.carousel-container');
const prevButton = carousel.querySelector('.carousel-prev');
const nextButton = carousel.querySelector('.carousel-next');

let currentIndex = 0;

nextButton.addEventListener('click', () => {
  currentIndex = (currentIndex + 1) % carouselContainer.children.length;
  updateCarousel();
});

prevButton.addEventListener('click', () => {
  currentIndex = (currentIndex - 1 + carouselContainer.children.length) % carouselContainer.children.length;
  updateCarousel();
});

function updateCarousel() {
  const offset = -currentIndex * 100;
  carouselContainer.style.transform = `translateX(${offset}%)`;
}

</script>