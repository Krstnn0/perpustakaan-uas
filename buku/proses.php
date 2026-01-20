<?php
include '../koneksi.php';

$aksi = $_GET['aksi'] ?? '';

if($aksi == 'tambah') {
    $stmt = $pdo->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori, stok) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], 
        $_POST['tahun_terbit'], $_POST['kategori'], $_POST['stok']
    ]);
    header('Location: index.php?msg=berhasil_tambah');
}

elseif($aksi == 'edit') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("UPDATE buku SET judul=?, pengarang=?, penerbit=?, tahun_terbit=?, kategori=?, stok=? WHERE id_buku=?");
    $stmt->execute([
        $_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], 
        $_POST['tahun_terbit'], $_POST['kategori'], $_POST['stok'], $id
    ]);
    header('Location: index.php?msg=berhasil_edit');
}

elseif($aksi == 'hapus') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku=?");
    $stmt->execute([$id]);
    header('Location: index.php?msg=berhasil_hapus');
}
?>
