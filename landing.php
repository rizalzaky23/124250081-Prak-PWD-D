<?php
require_once 'components/icons.php';
session_start();

$order = $_SESSION['order'] ?? null;

if ($order) {
    unset($_SESSION['order']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan Berhasil – AstraDrive Systems</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/landing.css">
</head>
<body>

<?php include 'components/navbar.php'; ?>

<main>
  <div class="content">

    <?php if ($order): ?>

      <div class="success-icon mb-3">
        <?= icon('check-circle-filled', 56, '#10b981') ?>
      </div>
      <h2>Pesanan Berhasil Dikirim!</h2>
      <p class="text-muted">Tim kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.</p>

      <div class="order-summary">
        <div class="summary-row">
          <span><?= icon('hash', 14) ?> ID Pesanan</span>
          <strong><?= htmlspecialchars($order['order_id']) ?></strong>
        </div>
        <div class="summary-row">
          <span><?= icon('user', 14) ?> Nama</span>
          <strong><?= htmlspecialchars($order['name']) ?></strong>
        </div>
        <div class="summary-row">
          <span><?= icon('mail', 14) ?> Email</span>
          <strong><?= htmlspecialchars($order['email']) ?></strong>
        </div>
        <div class="summary-row">
          <span><?= icon('package', 14) ?> Jumlah Barang</span>
          <strong><?= $order['jumlah'] ?> item</strong>
        </div>
        <div class="summary-row">
          <span><?= icon('truck', 14) ?> Layanan</span>
          <strong><?= htmlspecialchars($order['label']) ?> (<?= htmlspecialchars($order['desc']) ?>)</strong>
        </div>
        <div class="summary-row">
          <span><?= icon('user-check', 14) ?> Status</span>
          <strong><?= $order['member'] === 'yes' ? 'Member ✓' : 'Non-Member' ?></strong>
        </div>
        <div class="summary-row total-row">
          <span><?= icon('dollar-sign', 14) ?> Estimasi Biaya</span>
          <strong>Rp <?= number_format($order['estimasi'], 0, ',', '.') ?></strong>
        </div>
        <div class="summary-row">
          <span><?= icon('clock', 14) ?> Waktu Pesan</span>
          <strong><?= htmlspecialchars($order['timestamp']) ?></strong>
        </div>
      </div>


    <?php else: ?>

      <div class="mb-3" style="display:flex;justify-content:center;">
        <?= icon('truck', 48, '#0d6efd') ?>
      </div>
      <h2>Belum Ada Pesanan.</h2>
      <p class="text-muted">Silakan isi form pemesanan terlebih dahulu.</p>

    <?php endif; ?>

    <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
      <a href="index.php" class="btn btn-primary d-flex align-items-center gap-2">
        <?= icon('home', 15, '#fff') ?> Kembali ke Home
      </a>
      <a href="form.php" class="btn btn-outline-primary d-flex align-items-center gap-2">
        <?= icon('plus-circle', 15) ?> Pesan Lagi
      </a>
    </div>

  </div>
</main>

<?php include 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>lucide.createIcons();</script>
</body>
</html>
