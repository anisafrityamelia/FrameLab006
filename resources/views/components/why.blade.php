<section class="py-16">
  <h2 class="text-3xl font-bold text-center text-primary mb-10 drop-shadow-md">WHY SHOULD FRAMELAB?</h2>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
      <?php
      $reasons = [
        ["laptop", "Convenient Online Ordering"],
        ["store", "Various Ready-to-Use Studios"],
        ["star", "Complete & Professional Facilities"],
        ["clock", "Check Availability in Real-Time"],
        ["tags", "Transparent & Comparable Pricing"],
        ["user-astronaut", "Perfect for Digital Content Creators"],
      ];
      foreach ($reasons as [$icon, $text]) {
        echo "
        <div>
          <i class='fas fa-{$icon} text-4xl text-primary'></i>
          <p class='mt-3'>{$text}</p>
        </div>";
      }
      ?>
    </div>
  </div>
</section>

<section class="py-16 bg-cover bg-center" style="background-image: url('/images/lpbg-0.png');">
  <h2 class="text-3xl font-bold text-center text-primary mb-6 drop-shadow-md">
    WANT TO PROMOTE YOUR ROOM?
  </h2>
  <div class="container mx-auto px-4">
    <div class="max-w-2xl mx-auto text-center bg-primary shadow-lg rounded-xl p-6 hover:shadow-2xl transition duration-300" style="animation: fadeInUp 1s ease-out;">
      <p class="text-lg text-secondary">
        <span class="text-secondary font-semibold">Framelab</span> gives studio space owners the opportunity to promote their studios to <span class="text-secondary font-semibold">thousands of digital creators</span> through our platform.
      </p>
      <p class="text-lg mt-4 text-secondary">
        <span class="text-secondary font-semibold">Register</span>, log in as a renter, and then <span class="text-secondary font-semibold">contact the admin</span> through the dashboard to start promoting your studio space.
      </p>
    </div>
  </div>
</section>

<style>
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
