# UAS Basis Data - Sistem Informasi Perpustakaan 📚

## Fitur
- **CRUD BUKU** (Create, Read, Update, Delete)
  - Judul, pengarang, penerbit, kategori, stok
  - Auto-update stok saat peminjaman
- **CRUD ANGGOTA** (Create, Read, Update, Delete)
  - Nama lengkap, alamat, no.telp, jenis kelamin
  - Tanggal daftar otomatis
- **CRUD PEMINJAMAN** (Create, Read, Update, Delete)  
  - Relasi JOIN anggota + buku real-time
  - Status: dipinjam / dikembalikan
  - Dropdown pilih anggota & buku tersedia
- **Database Relasional** dengan relasi 1:N dan N:M
- **Bootstrap UI** responsive mobile-friendly

## Tech Stack
- **PHP Native + PDO**
- **MySQL 8+**
- **Bootstrap 5**
- **XAMPP** (Apache + MySQL)

## Cara Install
1. **XAMPP** Apache + MySQL ON
2. **Import database** `perpustakaan` (phpMyAdmin → SQL)
3. Copy project ke `htdocs/perpustakaan_uas`
4. Buka [**http://localhost/perpustakaan_uas/**](http://localhost/perpustakaan_uas/)
5. **Test CRUD** ketiga tabel

## SQL Dump
Database lengkap + sample data ada di screenshot laporan UAS.

## Struktur Database
