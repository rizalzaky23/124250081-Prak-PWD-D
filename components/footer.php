<?php
require_once __DIR__ . '/icons.php';
$year = date('Y');
$contact = [
    'email'   => 'astra@astradrive.com',
    'phone'   => '+62 82135966711',
    'address' => 'Jl. Rizal no 1, Yogyakarta',
    'ig'      => 'https://instagram.com/rizal.zalkyf',
    'li'      => 'https://linkedin.com/in/rizalzaky23',
];
?>
<div class="contact" id="contact">
  <div>
    <h3>Revolusi Distribusi Berbasis<br>Autonomous System.</h3>
    <p>Optimalkan pengiriman dengan kecerdasan dan efisiensi maksimal.</p>
  </div>
  <div>
    <h5>Contact Us</h5>
    <p class="d-flex align-items-center gap-2"><?= icon('mail', 14, 'rgba(255,255,255,.5)') ?> <?= $contact['email'] ?></p>
    <p class="d-flex align-items-center gap-2"><?= icon('phone', 14, 'rgba(255,255,255,.5)') ?> <?= $contact['phone'] ?></p>
    <p class="d-flex align-items-center gap-2"><?= icon('map-pin', 14, 'rgba(255,255,255,.5)') ?> <?= $contact['address'] ?></p>
  </div>
  <div class="social d-flex flex-column gap-2">
    <h5>Follow Us</h5>
    <div class="d-flex gap-3">
      <a href="<?= $contact['ig'] ?>" target="_blank" class="text-light" title="Instagram">
        <?= icon('instagram', 20, 'rgba(255,255,255,.75)') ?>
      </a>
      <a href="<?= $contact['li'] ?>" target="_blank" class="text-light" title="LinkedIn">
        <?= icon('linkedin', 20, 'rgba(255,255,255,.75)') ?>
      </a>
    </div>
  </div>
</div>
<div class="footer">
  <p>&copy; <?= $year ?> AstraDrive Systems. All rights reserved.</p>
</div>