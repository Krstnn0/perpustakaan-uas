<?php
include '../koneksi.php';

$aksi = $_GET['aksi'] ?? '';

if($aksi == 'tambah') {
    $stmt = $pdo->prepare("INSERT INTO anggota (nama, alamat, no_telp, jenis_kelamin, tanggal_daftar) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['nama'], $_POST['alamat'], $_POST['no_telp'], 
        $_POST['jenis_kelamin'], $_POST['tanggal_daftar']
    ]);
    header('Location: index.php?msg=berhasil_tambah');
}

elseif($aksi == 'edit') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("UPDATE anggota SET nama=?, alamat=?, no_telp=?, jenis_kelamin=?, tanggal_daftar=? WHERE id_anggota=?");
    $stmt->execute([
        $_POST['nama'], $_POST['alamat'], $_POST['no_telp'], 
        $_POST['jenis_kelamin'], $_POST['tanggal_daftar'], $id
    ]);
    header('Location: index.php?msg=berhasil_edit');
}

elseif($aksi == 'hapus') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM anggota WHERE id_anggota=?");
    $stmt->execute([$id]);
    header('Location: index.php?msg=berhasil_hapus');
}
?>
