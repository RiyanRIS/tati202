# Aplikasi Sistem Pendukung Keputusan Pemilihan Siswa Berprestasi di SD Negri 1 Liang

### Minimal Kebutuhan
- php ^7.4
- webserver
- database mysql

### Instalasi
- Download Repo ini
- Pindahkan ke folder htdocs
- buat database
- import database
- sesuaikan pengaturan database di file ./configuration.php
- jalankan di browser

### Template & Library
- AdminLTE
- Bootstrap
- jquery

### Struktur Table & Relasi
- <img src="./assets/images/relasi_struktur_db.png" alt="image" width="720" border="5">

### Alur Sistem
- Pertama isi data master terlebih dahulu
  - Master Data Kelas, berelasi dengan halaman Master Data Siswa.
  - Master Data Siswa, berelasi dengan halaman Transaksi Data Alternatif Nilai
  - Master Data Kriteria, berelasi dengan halaman Transaksi Data Alternatif Nilai & Subkriteria
  - Master Data SubKriteria, Jika kamu menambahkan nilai Kriteria disini, maka di halaman Transaksi akan muncul menu select option, bukan input text. 
- Data Alternatif Nilai
  - Cara Menambahkan Data
    - Klik Tambah Alternatif Nilai
    - Pilih Kelas (Pada Select siswa akan muncul siswa sesuai dengan kelas yang dipilih)
    - Pilih Siswa (Halaman Tabel akan muncul data alternatif nilai siswa tersebut dan Select Kriteria akan muncul *Hanya* kriteria yang **belum ada**)
    - Pilih Kriteria (Akan muncul text/select box untuk mengisi nilai)
    - Isi nilai, lalu simpan.
- Hasil Perhitungan 
  - Sistem akan secara otomatis menghitung data yang sudah diisi pada Alternatif nilai tadi, jika ada kriteria yang kosong/belum terisi maka akan di*default*kan menjadi 0.

## Srenshoot
- <img src="./assets/images/login.png" alt="image" width="500" border="3">
- <img src="./assets/images/data_kelas.png" alt="image" width="500" border="3">
- <img src="./assets/images/detail_siswa.png" alt="image" width="500" border="3">
- <img src="./assets/images/data_kriteria.png" alt="image" width="500" border="3">
- <img src="./assets/images/data_subkriteria.png" alt="image" width="500" border="3">
- <img src="./assets/images/alternatif_nilai.png" alt="image" width="500" border="3">
- <img src="./assets/images/tambah_alternatif_nilai.png" alt="image" width="500" border="3">
- <img src="./assets/images/hasil.png" alt="image" width="500" border="3">