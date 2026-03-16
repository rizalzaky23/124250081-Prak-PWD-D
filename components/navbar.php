<?php
$page = basename($_SERVER['PHP_SELF']);
require_once __DIR__ . '/icons.php';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <div style="width:32px;height:32px;background:#0d6efd;border-radius:8px;display:flex;align-items:center;justify-content:center;">
        <?= icon('truck', 16, '#fff') ?>
      </div>
      AstraDrive Systems
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <?= icon('menu', 20, '#555') ?>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-1 <?= $page === 'index.php' ? 'active fw-semibold' : '' ?>" href="index.php">
            <?= icon('home', 15) ?> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-1" href="index.php#about">
            <?= icon('info', 15) ?> About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex align-items-center gap-1" href="index.php#contact">
            <?= icon('mail', 15) ?> Contact
          </a>
        </li>
      </ul>
      <a href="form.php" class="btn btn-primary d-flex align-items-center gap-2 <?= $page === 'form.php' ? 'active' : '' ?>">
        <?= icon('package', 15, '#fff') ?> Pesan
      </a>
    </div>
  </div>
</nav>