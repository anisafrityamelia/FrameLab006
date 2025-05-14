<section id="services">
  <h2 class="text-3xl font-bold text-center text-primary mt-16 mb-8 drop-shadow-md">OUR SERVICE</h2>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
      <?php
      $services = [
        ["images/gambar14.jpeg", "LoopBox", "detail_studio_video"],
        ["images/gambar1.jpg", "Photobooth", "detail_studio_photo"],
        ["images/gambar10.jpeg", "Aqualoom", "detail_studio_space"],
        ["images/gambar2.jpeg", "Studio Pro Regular", "detail_studio_photo"],
        ["images/gambar11.jpeg", "Terrena", "detail_studio_space"],
        ["images/gambar5.jpeg", "Studio Pro Large", "detail_studio_photo"],
        ["images/gambar15.jfif", "PodSpace", "detail_studio_video"],
        ["images/gambar3.jpeg", "High Angle", "detail_studio_photo"]
      ];

      foreach ($services as [$img, $name, $link]) {
        echo '
        <div class="rounded-2xl overflow-hidden shadow-md transition-transform duration-300 hover:-translate-y-1">
          <div class="h-48 overflow-hidden">
            <img src="/' . $img . '" class="w-full h-full object-cover" alt="' . $name . '" />
          </div>
          <div class="bg-primary text-white p-4">
            <h5 class="text-lg font-bold">' . $name . '</h5>
            <p class="my-2">Rp. 100.000</p>
            <a href="' . $link . '">
              <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Check</button>
            </a>
          </div>
        </div>';
      }
      ?>
    </div>
    <div class="text-center mt-8">
      <a href="tampilan_studiogabungan" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition-all duration-300 hover:shadow-lg">View More</a>
    </div>
  </div>
</section>
