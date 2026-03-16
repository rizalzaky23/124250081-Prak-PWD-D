# Autonomous Logistics Delivery System

## Identitas Mahasiswa

| | |
|---|---|
| **Nama** | Rizal Zaky Firmansyah |
| **NIM** | 124250081 |

---

## Deskripsi Studi Kasus

**AstraDrive Systems** adalah platform simulasi layanan pengiriman logistik berbasis kendaraan otonom. Sistem ini dirancang sebagai prototype frontend untuk mata kuliah Pemrograman Web Dinamis.

### Latar Belakang

Industri logistik modern menghadapi tantangan efisiensi, kecepatan, dan akurasi pengiriman. AstraDrive Systems hadir sebagai solusi konseptual yang memanfaatkan teknologi kendaraan otonom (autonomous vehicle) berbasis kecerdasan buatan untuk mengelola proses pengiriman barang secara mandiri — mulai dari penjemputan paket hingga penyerahan ke penerima.

### Fitur Utama

- **AI-Powered Routing** — Penentuan rute terpendek dan teraman secara real-time
- **Autonomous Vehicle** — Armada kendaraan otonom dengan sensor LiDAR dan kamera 360°
- **Real-time Tracking** — Pemantauan posisi pengiriman secara langsung
- **Keamanan Berlapis** — Sistem verifikasi dan asuransi paket otomatis

### Alur Layanan

1. Pengguna mengisi form pemesanan pengiriman
2. Sistem memvalidasi data dan menyimpan pesanan
3. Pengguna diarahkan ke halaman konfirmasi dengan ringkasan pesanan
4. Kendaraan otonom dijadwalkan untuk menjemput dan mengantar paket

### Teknologi yang Digunakan

- PHP (server-side, validasi form, session)
- HTML5 & CSS3
- Bootstrap 5
- Lucide Icons
- JavaScript (vanilla)

### Struktur Folder

```
tugas-2_pwd/
├── index.php          # Halaman utama
├── form.php           # Form pemesanan
├── landing.php        # Halaman konfirmasi pesanan
├── components/
│   ├── navbar.php     # Komponen navigasi
│   ├── footer.php     # Komponen footer
│   └── icons.php      # Helper fungsi icon Lucide
├── css/
│   ├── style.css      # Stylesheet utama
│   ├── form.css       # Stylesheet form
│   └── landing.css    # Stylesheet landing page
└── asset/             # Gambar dan aset statis
```

---

*Tugas Pemrograman Web Dasar — 2025/2026*
