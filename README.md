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

## Cara Menjalankan

1. Clone repositori ini:
   ```bash
   git clone https://github.com/ElYoosa/Web-Toko-Online.git
   ```

2. Import database (file `.sql` **tidak dibagikan** — silakan buat sendiri berdasarkan struktur `config/koneksi.php`)

3. Jalankan server lokal:
   - Gunakan XAMPP / Laragon
   - Arahkan `htdocs` ke folder proyek ini

4. Akses dari browser:
   ```
   http://localhost/tokoonline
   ```

## Catatan

> File `dbtokoonline.sql` telah **dihapus dari histori Git** karena mengandung informasi sensitif.  
> Pastikan Anda membuat ulang database secara manual jika diperlukan.

## Lisensi

Proyek ini dibuat untuk tujuan pembelajaran.