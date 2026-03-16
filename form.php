<?php
require_once 'components/icons.php';
session_start();

$layanan_list = [
    'Express'  => ['label' => 'Express',  'desc' => '1–4 jam',      'icon' => 'zap',      'color' => '#f59e0b'],
    'Standard' => ['label' => 'Standard', 'desc' => '1–2 hari',     'icon' => 'truck',    'color' => '#0d6efd'],
    'Cargo'    => ['label' => 'Cargo',    'desc' => '3–5 hari',     'icon' => 'package',  'color' => '#16a34a'],
    'SameDay'  => ['label' => 'Same Day', 'desc' => 'Hari ini juga','icon' => 'clock',    'color' => '#dc2626'],
];

$tarif = ['Express' => 50000, 'Standard' => 20000, 'Cargo' => 15000, 'SameDay' => 75000];

$errors = [];
$old    = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['name']    = trim($_POST['name']    ?? '');
    $old['email']   = trim($_POST['email']   ?? '');
    $old['jumlah']  = trim($_POST['jumlah']  ?? '');
    $old['layanan'] = trim($_POST['layanan'] ?? '');
    $old['member']  = trim($_POST['member']  ?? '');
    $old['setuju']  = isset($_POST['setuju']) ? '1' : '';

    if (empty($old['name']))
        $errors['name'] = 'Nama lengkap wajib diisi.';
    elseif (strlen($old['name']) < 3)
        $errors['name'] = 'Nama minimal 3 karakter.';

    if (empty($old['email']))
        $errors['email'] = 'Email wajib diisi.';
    elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'Format email tidak valid.';

    if ($old['jumlah'] === '' || !is_numeric($old['jumlah']))
        $errors['jumlah'] = 'Jumlah barang wajib diisi.';
    elseif ((int)$old['jumlah'] < 1)
        $errors['jumlah'] = 'Minimal 1 item.';
    elseif ((int)$old['jumlah'] > 1000)
        $errors['jumlah'] = 'Maksimal 1000 item.';

    if (empty($old['layanan']) || !array_key_exists($old['layanan'], $layanan_list))
        $errors['layanan'] = 'Pilih jenis layanan.';

    if (empty($old['member']))
        $errors['member'] = 'Pilih status member.';

    if (empty($old['setuju']))
        $errors['setuju'] = 'Anda harus menyetujui syarat & ketentuan.';

    if (empty($errors)) {
        $_SESSION['order'] = [
            'order_id'  => 'ASD-' . strtoupper(substr(md5(uniqid()), 0, 8)),
            'name'      => $old['name'],
            'email'     => $old['email'],
            'jumlah'    => (int)$old['jumlah'],
            'layanan'   => $old['layanan'],
            'label'     => $layanan_list[$old['layanan']]['label'],
            'desc'      => $layanan_list[$old['layanan']]['desc'],
            'member'    => $old['member'],
            'estimasi'  => $tarif[$old['layanan']] * (int)$old['jumlah'],
            'timestamp' => date('d F Y, H:i') . ' WIB',
        ];
        header('Location: landing.php');
        exit;
    }
}

function old(string $key, array $old): string {
    return htmlspecialchars($old[$key] ?? '');
}

function fc(string $key, array $errors, array $old): string {
    if (!isset($old[$key])) return '';
    return isset($errors[$key]) ? 'is-invalid' : 'is-valid';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pesan – AstraDrive Systems</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form.css">
  <style>
    /* tombol sejajar */
    div.button {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        gap: 12px !important;
        flex-wrap: wrap !important;
        padding: 0 10px !important;
    }
    /* footer background gelap */
    div.contact {
        background-color: #1a1a2e !important;
        color: white !important;
        display: flex !important;
        flex-wrap: wrap !important;
        justify-content: space-around !important;
        padding: 48px 5% !important;
        gap: 36px !important;
    }
    div.contact h3, div.contact h5, div.contact p,
    div.contact span, div.contact a {
        color: rgba(255,255,255,0.8) !important;
    }
    div.contact h3, div.contact h5 {
        color: #ffffff !important;
        font-weight: 700 !important;
    }
    div.footer {
        background-color: #11111f !important;
        color: rgba(255,255,255,0.4) !important;
        text-align: center !important;
        padding: 18px !important;
    }
    div.footer p {
        color: rgba(255,255,255,0.4) !important;
        margin: 0 !important;
    }
  </style>
</head>
<body>

<?php include 'components/navbar.php'; ?>

<div class="container py-5">
  <div class="form">
    <h2 class="text-center fw-bold mb-1">Form Pemesanan</h2>
    <p class="text-center text-muted small mb-4">Isi data di bawah untuk melakukan pemesanan pengiriman</p>

    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
      <?= icon('alert-triangle', 20, '#842029') ?>
      <div>Terdapat <strong><?= count($errors) ?> kesalahan</strong> pada form. Silakan periksa kembali.</div>
    </div>
    <?php endif; ?>

    <form action="form.php" method="POST" novalidate>
      <div class="form-group">

        <div class="form-section-title"><?= icon('user', 14, '#0d6efd') ?> INFORMASI PENGIRIM</div>

        <div>
          <label for="name" class="form-label fw-semibold d-flex align-items-center gap-1">
            <?= icon('user', 14) ?> Nama Lengkap <span class="text-danger ms-1">*</span>
          </label>
          <input type="text" class="form-control <?= fc('name', $errors, $old) ?>"
            id="name" name="name" placeholder="Masukkan nama lengkap"
            value="<?= old('name', $old) ?>" required>
          <?php if (isset($errors['name'])): ?>
            <div class="invalid-feedback"><?= $errors['name'] ?></div>
          <?php endif; ?>
        </div>

        <div>
          <label for="email" class="form-label fw-semibold d-flex align-items-center gap-1">
            <?= icon('mail', 14) ?> Email <span class="text-danger ms-1">*</span>
          </label>
          <input type="email" class="form-control <?= fc('email', $errors, $old) ?>"
            id="email" name="email" placeholder="contoh@email.com"
            value="<?= old('email', $old) ?>" required>
          <?php if (isset($errors['email'])): ?>
            <div class="invalid-feedback"><?= $errors['email'] ?></div>
          <?php endif; ?>
        </div>

        <div class="form-section-title mt-2"><?= icon('package', 14, '#0d6efd') ?> DETAIL BARANG</div>

        <div>
          <label for="jumlah" class="form-label fw-semibold d-flex align-items-center gap-1">
            <?= icon('package-open', 14) ?> Jumlah Barang <span class="text-danger ms-1">*</span>
          </label>
          <input type="number" class="form-control <?= fc('jumlah', $errors, $old) ?>"
            id="jumlah" name="jumlah" placeholder="Misal: 3" min="1" max="1000"
            value="<?= old('jumlah', $old) ?>" required>
          <?php if (isset($errors['jumlah'])): ?>
            <div class="invalid-feedback"><?= $errors['jumlah'] ?></div>
          <?php endif; ?>
        </div>

        <div>
          <label class="form-label fw-semibold d-flex align-items-center gap-1">
            <?= icon('truck', 14) ?> Layanan <span class="text-danger ms-1">*</span>
          </label>
          <div class="layanan-grid">
            <?php foreach ($layanan_list as $val => $info): ?>
            <label class="layanan-option <?= old('layanan', $old) === $val ? 'selected' : '' ?>">
              <input type="radio" name="layanan" value="<?= $val ?>"
                <?= old('layanan', $old) === $val ? 'checked' : '' ?> required>
              <span class="layanan-icon-wrap" style="color:<?= $info['color'] ?>">
                <?= icon($info['icon'], 22, $info['color']) ?>
              </span>
              <span class="layanan-label"><?= $info['label'] ?></span>
              <span class="layanan-desc"><?= $info['desc'] ?></span>
            </label>
            <?php endforeach; ?>
          </div>
          <?php if (isset($errors['layanan'])): ?>
            <div class="text-danger small mt-1 d-flex align-items-center gap-1">
              <?= icon('alert-triangle', 13, '#dc3545') ?> <?= $errors['layanan'] ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="form-section-title mt-2"><?= icon('user-check', 14, '#0d6efd') ?> STATUS & PERSETUJUAN</div>

        <div>
          <label class="form-label fw-semibold d-flex align-items-center gap-1">
            <?= icon('users', 14) ?> Status Member <span class="text-danger ms-1">*</span>
          </label>
          <div class="d-flex gap-3">
            <div class="form-check d-flex align-items-center gap-2">
              <input class="form-check-input <?= fc('member', $errors, $old) ?>"
                type="radio" id="member" name="member" value="yes"
                <?= old('member', $old) === 'yes' ? 'checked' : '' ?> required>
              <label class="form-check-label d-flex align-items-center gap-1" for="member">
                <?= icon('star-filled', 14, '#f59e0b') ?> Ya, Saya Member
              </label>
            </div>
            <div class="form-check d-flex align-items-center gap-2">
              <input class="form-check-input <?= fc('member', $errors, $old) ?>"
                type="radio" id="non-member" name="member" value="no"
                <?= old('member', $old) === 'no' ? 'checked' : '' ?> required>
              <label class="form-check-label d-flex align-items-center gap-1" for="non-member">
                <?= icon('user', 14) ?> Bukan Member
              </label>
            </div>
          </div>
          <?php if (isset($errors['member'])): ?>
            <div class="text-danger small mt-1 d-flex align-items-center gap-1">
              <?= icon('alert-triangle', 13, '#dc3545') ?> <?= $errors['member'] ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="form-check d-flex align-items-start gap-2">
          <input class="form-check-input mt-1 <?= fc('setuju', $errors, $old) ?>"
            type="checkbox" id="setuju" name="setuju" value="1"
            <?= !empty($old['setuju']) ? 'checked' : '' ?> required>
          <label class="form-check-label" for="setuju">
            Saya menyetujui <a href="#" class="text-primary">syarat dan ketentuan</a> yang berlaku
          </label>
          <?php if (isset($errors['setuju'])): ?>
            <div class="invalid-feedback d-block"><?= $errors['setuju'] ?></div>
          <?php endif; ?>
        </div>

      </div>

      <div class="button">
        <button type="submit" class="btn btn-primary d-flex align-items-center gap-2" id="kirim">
          <?= icon('send', 15, '#fff') ?> Kirim Pesanan
        </button>
        <button type="reset" class="btn btn-secondary d-flex align-items-center gap-2" id="reset">
          <?= icon('refresh', 15, '#fff') ?> Reset
        </button>
      </div>
    </form>
  </div>
</div>

<?php include 'components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
<script>
lucide.createIcons();
document.querySelectorAll('.layanan-option').forEach(opt => {
    opt.addEventListener('click', () => {
        document.querySelectorAll('.layanan-option').forEach(o => o.classList.remove('selected'));
        opt.classList.add('selected');
    });
});
</script>
</body>
</html>