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

