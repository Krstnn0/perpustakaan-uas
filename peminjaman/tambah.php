<?php 
include '../koneksi.php'; 
$anggota = $pdo->query("SELECT id_anggota, nama FROM anggota")->fetchAll();
$buku = $pdo->query("SELECT id_buku, judul FROM buku WHERE stok > 0")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">➕ Transaksi Peminjaman Baru</h2>
    <form action="proses.php?aksi=tambah" method="POST">
        <div class="mb-3">
            <label class="form-label">Pilih Anggota</label>
            <select name="id_anggota" class="form-select" required>
                <option value="">-- Pilih Anggota --</option>
                <?php foreach($anggota as $a): ?>
                <option value="<?php echo $a['id_anggota']; ?>"><?php echo $a['nama']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Buku (Stok Tersedia)</label>
            <select name="id_buku" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach($buku as $b): ?>
                <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['judul']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan Peminjaman</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
