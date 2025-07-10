# Toko Online

Proyek ini adalah aplikasi web sederhana untuk toko online yang dibangun menggunakan **PHP** dan **MySQL**. Proyek ini dikembangkan dalam rangka tugas **Web Programming III**.

## Fitur

- Registrasi & login pengguna
- Halaman katalog produk
- Fitur keranjang belanja
- Proses checkout dan transaksi
- Manajemen produk oleh admin
- Dashboard admin dan user
- Autentikasi & validasi form

## Teknologi

- PHP (Native)
- MySQL
- HTML, CSS, JavaScript
- Bootstrap

## Struktur Direktori

```
/assets          -> Gambar, CSS, JS
/config          -> Koneksi database dan konfigurasi
/pages           -> Halaman frontend & backend
/index.php       -> Halaman utama
```

## Setup dan Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/ElYoosa/Web-Toko-Online.git
cd Web-Toko-Online
```

### 2. Setup Database
1. Buat database MySQL baru bernama `tokoonline`
2. Import struktur database (gunakan file `database_template.sql` jika tersedia)
3. Atau buat manual sesuai dengan struktur yang digunakan di `config/koneksi.php`

### 3. Konfigurasi Database
Edit file `config/koneksi.php` dengan informasi database Anda:
```php
<?php
$host = 'localhost';
$dbname = 'tokoonline';
$username = 'root';
$password = '';
// Sesuaikan dengan konfigurasi database lokal Anda
?>
```

### 4. Setup Server Lokal
1. Gunakan XAMPP, Laragon, atau server lokal lainnya
2. Arahkan `htdocs` ke folder proyek ini
3. Pastikan Apache dan MySQL sudah running

### 5. Akses Aplikasi
```
http://localhost/tokoonline
```

## Keamanan

> **Penting:** File `dbtokoonline.sql` telah **dihapus dari histori Git** karena mengandung informasi sensitif (OAuth tokens).

### Catatan Keamanan:
- Jangan pernah commit file yang mengandung credential atau API keys
- Gunakan environment variables untuk data sensitif
- Pastikan file `.env` (jika ada) sudah ada di `.gitignore`

## Troubleshooting

### Database Connection Error
- Pastikan MySQL sudah running
- Cek konfigurasi di `config/koneksi.php`
- Pastikan database `tokoonline` sudah dibuat

### File Not Found
- Pastikan struktur direktori sesuai dengan yang ada di repository
- Cek path relatif di file PHP

### Permission Error
- Pastikan folder memiliki permission yang tepat untuk web server
- Pada Linux/Mac: `chmod -R 755 folder_proyek`

## Kontribusi

Proyek ini dibuat untuk tujuan pembelajaran. Jika ingin berkontribusi:
1. Fork repository ini
2. Buat branch untuk fitur baru
3. Commit perubahan Anda
4. Submit pull request

## Lisensi

Proyek ini dibuat untuk tujuan pembelajaran di mata kuliah Web Programming III.

---

**Developed by:** ElYoosa  
**Course:** Web Programming III  
**Semester:** 4