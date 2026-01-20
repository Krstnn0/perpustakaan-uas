<?php
include '../koneksi.php';

$aksi = $_GET['aksi'] ?? '';

if($aksi == 'tambah') {
    $stmt = $pdo->prepare("INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $_POST['id_anggota'], 
        $_POST['id_buku'], 
        $_POST['tgl_pinjam'], 
        $_POST['status']
    ]);
    // Kurangi stok buku
    $pdo->prepare("UPDATE buku SET stok = stok - 1 WHERE id_buku = ?")->execute([$_POST['id_buku']]);
    header('Location: index.php?msg=berhasil_tambah');
}

elseif($aksi == 'edit') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("UPDATE peminjaman SET id_anggota=?, id_buku=?, tgl_pinjam=?, status=? WHERE id_peminjaman=?");
    $stmt->execute([
        $_POST['id_anggota'], 
        $_POST['id_buku'], 
        $_POST['tgl_pinjam'], 
        $_POST['status'], 
        $id
    ]);
    header('Location: index.php?msg=berhasil_edit');
}

elseif($aksi == 'hapus') {
    $id = $_GET['id'];
    // Ambil id_buku untuk restore stok
    $stmt = $pdo->prepare("SELECT id_buku FROM peminjaman WHERE id_peminjaman=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    if($row) {
        $pdo->prepare("UPDATE buku SET stok = stok + 1 WHERE id_buku = ?")->execute([$row['id_buku']]);
    }
    $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman=?")->execute([$id]);
    header('Location: index.php?msg=berhasil_hapus');
}
?>
