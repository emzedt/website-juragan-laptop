# JuraganLaptop – Website E-Commerce

## 🛒 Tentang Proyek

**JuraganLaptop** adalah website e-commerce yang dinamis dan terpercaya untuk penjualan laptop bermerek. Proyek ini dikembangkan sebagai bagian dari tugas mata kuliah **Desain Pemrograman Web**.

Platform ini dirancang untuk memberikan pengalaman belanja yang nyaman, dengan antarmuka yang ramah pengguna, informasi produk yang lengkap, dan proses transaksi yang aman. Untuk admin, disediakan dashboard untuk mengelola produk, pengguna, dan konten website secara efisien.

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP  
- **Database**: MySQL  
- **Frontend**: HTML, CSS, Bootstrap  

## 🔑 Fitur

### 👥 Fitur Pelanggan

- **Autentikasi Pengguna**: Registrasi dan login yang aman untuk pelanggan  
- **Katalog Produk**: Menampilkan laptop dalam kategori seperti Gaming dan Work  
- **Detail Produk**: Informasi lengkap produk dan gambar pendukung  
- **Keranjang Belanja**: Tambah, ubah jumlah, dan hapus item dari keranjang  
- **Checkout**: Proses checkout yang aman dan sederhana  
- **Formulir Kontak**: Kirim masukan dan pertanyaan langsung ke admin  
- **Halaman Tentang Kami**: Info perusahaan & video testimoni pelanggan  
- **Halaman FAQ**: Daftar pertanyaan yang sering diajukan  

### 🛠️ Fitur Admin Panel

- **Login Aman**: Login terpisah untuk admin dengan catatan waktu login terakhir  
- **Dashboard**: Ringkasan total produk dan kategori  
- **Manajemen Konten**:  
  - CRUD penuh untuk daftar produk  
  - Manajemen kategori produk  
  - Manajemen gambar slide show halaman utama  
  - Manajemen video testimoni  
- **Manajemen Pengguna**:  
  - Kelola akun pelanggan  
  - Kelola akun administrator  

## ⚙️ Cara Instalasi

### 📋 Prasyarat

Untuk menjalankan proyek ini secara lokal, Anda memerlukan server lokal yang mendukung PHP dan MySQL. Disarankan menggunakan:

- [XAMPP](https://www.apachefriends.org/index.html)

### 🧩 Langkah-Langkah Instalasi

1. **Clone Repositori**  
   ```bash
      git clone https://github.com/emzedt/website-e-ktp.git
   ```

2. **Siapkan Database**  
   - Jalankan Apache dan MySQL dari XAMPP Control Panel  
   - Buka `http://localhost/phpmyadmin` di browser  
   - Buat database baru dengan nama: `juragan_laptop`  
   - Import file `juragan_laptop.sql` ke database tersebut  

3. **Konfigurasi Proyek**  
   - Pindahkan semua file PHP ke folder `htdocs`, contoh:  
     `C:/xampp/htdocs/JuraganLaptop`

4. **Jalankan Aplikasi**  
   - Buka browser dan akses:  
     `http://localhost/JuraganLaptop`  
   - Untuk admin, login melalui halaman login khusus admin  

## 🧱 Struktur Database

Database menggunakan model relasional dengan tabel utama berikut:

| Tabel         | Deskripsi                                                   |
|---------------|-------------------------------------------------------------|
| `admin`       | Menyimpan akun dan data login administrator                 |
| `pelanggan`   | Menyimpan data registrasi dan login pelanggan               |
| `produk`      | Detail produk: nama, harga, deskripsi, gambar, kategori     |
| `kategori`    | Menyimpan kategori produk (misal: Gaming, Work)             |
| `keranjang`   | Menyimpan item yang ditambahkan ke keranjang belanja        |
| `checkout`    | Menyimpan informasi transaksi dan pesanan pelanggan         |
| `slide_show`  | Gambar untuk slide show di halaman utama                    |
| `video`       | Menyimpan video testimoni pelanggan                         |

Semua tabel saling terhubung untuk menjaga integritas data dan mendukung seluruh fungsi website.
