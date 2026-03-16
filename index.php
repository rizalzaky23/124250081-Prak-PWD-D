<?php
require_once 'components/icons.php';
$features = [
    ['icon' => 'cpu',          'title' => 'AI-Powered Routing',  'desc' => 'Algoritma cerdas menentukan rute terpendek dan teraman secara real-time berdasarkan kondisi lalu lintas.'],
    ['icon' => 'truck',        'title' => 'Autonomous Vehicle',  'desc' => 'Armada kendaraan otonom dengan sensor LiDAR dan kamera 360° untuk navigasi mandiri yang presisi.'],
    ['icon' => 'radar',        'title' => 'Real-time Tracking',  'desc' => 'Pantau posisi pengiriman Anda kapan saja melalui dashboard yang diperbarui setiap beberapa detik.'],
    ['icon' => 'shield-check', 'title' => 'Aman & Terpercaya',   'desc' => 'Sistem keamanan berlapis memastikan paket Anda tiba dengan selamat dan tepat waktu.'],
];

$testimonials = [
    ['name' => 'John Doe',   'role' => 'CEO, LogiCorp',     'text' => 'AstraDrive Systems telah mengubah cara kami mengelola logistik. Layanan mereka yang cepat dan andal membuat bisnis kami berjalan lebih lancar.'],
    ['name' => 'Jane Smith', 'role' => 'Manager, QuickBox', 'text' => 'Saya sangat terkesan dengan teknologi otonom AstraDrive Systems. Pengiriman selalu tepat waktu dan aman.'],
    ['name' => 'Budi S.',    'role' => 'Owner, TokoBesar',  'text' => 'Biaya operasional kami turun signifikan sejak menggunakan AstraDrive. Sangat direkomendasikan!'],
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AstraDrive Systems – Autonomous Logistics</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>
    
    main { background: linear-gradient(135deg, #dbeafe, #eff6ff, #e0f2fe) !important; }

    .nav-link {
        display: inline-block !important;
        transition: transform 0.2s ease, color 0.2s ease !important;
    }
    .nav-link:hover {
        transform: scale(1.12) !important;
        color: #0d6efd !important;
    }
    .navbar-brand {
        transition: transform 0.2s ease !important;
        display: inline-flex !important;
    }
    .navbar-brand:hover {
        transform: scale(1.06) !important;
    }

    .features-section {
        background: #ffffff !important;
        padding: 60px 0 !important;
        border-top: 1px solid #e2e8f0 !important;
        border-bottom: 3px solid #dbeafe !important;
    }

    .feature-card {
        background: #f8faff !important;
        border-radius: 16px !important;
        padding: 28px 22px !important;
        border: 1.5px solid #e8edf5 !important;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease !important;
    }
    .feature-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 16px 40px rgba(13,110,253,0.15) !important;
        border-color: #93c5fd !important;
        background: #fff !important;
    }

    #about {
        background: #f0f7ff !important;
        border-top: 3px solid #dbeafe !important;
        padding: 60px 5% !important;
    }

    .about-content {
        transition: transform 0.25s ease, box-shadow 0.25s ease !important;
        cursor: default !important;
    }
    .about-content:hover {
        transform: translateY(-5px) !important;
        box-shadow: 0 20px 48px rgba(13,110,253,0.12) !important;
    }
  </style>
</head>
<body>

<?php include 'components/navbar.php'; ?>

<main>
  <div>
    <h1>Revolusi Distribusi Berbasis <br>Autonomous System.</h1>
    <p class="lead text-muted mb-4">Optimalkan pengiriman dengan kecerdasan dan efisiensi maksimal.</p>
    <div class="d-flex flex-wrap gap-3">
      <a href="form.php" class="btn btn-primary btn-lg d-flex align-items-center gap-2">
        <?= icon('package', 17, '#fff') ?> Pesan Sekarang
      </a>
      <a href="#about" class="btn btn-outline-secondary btn-lg d-flex align-items-center gap-2">
        <?= icon('arrow-right', 17) ?> Pelajari Lebih
      </a>
    </div>
  </div>
  <div>
    <img src="asset/img.jpg" alt="Autonomous Logistics Vehicle" class="img">
  </div>
</main>

<section class="features-section py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-2">Fitur Unggulan</h2>
    <p class="text-center text-muted mb-5">Teknologi terdepan dalam setiap pengiriman</p>
    <div class="row g-4">
      <?php foreach ($features as $f): ?>
      <div class="col-sm-6 col-lg-3">
        <div class="feature-card h-100">
          <div class="feature-icon mb-3">
            <?= icon($f['icon'], 22, '#0d6efd') ?>
          </div>
          <h5 class="fw-bold"><?= htmlspecialchars($f['title']) ?></h5>
          <p class="text-muted small mb-0"><?= htmlspecialchars($f['desc']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div id="about">
  <div class="about-content">
    <div class="about-icon"><?= icon('info', 20, '#0d6efd') ?></div>
    <h4>Kenapa Memilih AstraDrive Systems?</h4>
    <p>AstraDrive Systems adalah solusi logistik otonom terdepan yang menggabungkan teknologi canggih untuk memberikan layanan pengiriman yang cepat, aman, dan efisien. Dengan armada kendaraan otonom kami, setiap pengiriman dilakukan dengan presisi tinggi, mengurangi biaya operasional dan meningkatkan kepuasan pelanggan.</p>
  </div>
  <div class="about-content">
    <div class="about-icon"><?= icon('trending-up', 20, '#0d6efd') ?></div>
    <h4>Keunggulan AstraDrive Systems</h4>
    <p>Kami menawarkan berbagai keunggulan yang membuat AstraDrive Systems pilihan terbaik untuk kebutuhan logistik Anda.</p>
    <ul class="list-unstyled mt-2">
      <li class="d-flex align-items-center gap-2 mb-2"><?= icon('check-circle', 16, '#0d6efd') ?> Armada kendaraan listrik otonom</li>
      <li class="d-flex align-items-center gap-2 mb-2"><?= icon('check-circle', 16, '#0d6efd') ?> Pelacakan real-time 24/7</li>
      <li class="d-flex align-items-center gap-2 mb-2"><?= icon('check-circle', 16, '#0d6efd') ?> Asuransi paket gratis</li>
      <li class="d-flex align-items-center gap-2 mb-2"><?= icon('check-circle', 16, '#0d6efd') ?> Efisiensi biaya hingga 40%</li>
    </ul>
  </div>
  <div class="about-content">
    <div class="about-icon"><?= icon('quote', 20, '#0d6efd') ?></div>
    <h4>Testimoni Pelanggan</h4>
    <?php foreach ($testimonials as $t): ?>
    <div class="testimonial-item">
      <p class="fst-italic mb-1">"<?= htmlspecialchars($t['text']) ?>"</p>
      <small class="fw-bold"><?= htmlspecialchars($t['name']) ?></small>
      <small class="text-muted"> – <?= htmlspecialchars($t['role']) ?></small>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>
</body>
</html>