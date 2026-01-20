<?php 
include '../koneksi.php'; 
$id = $_GET['id'];
$stmt = $pdo->prepare("
    SELECT p.*, a.nama as nama_anggota, b.judul as judul_buku 
    FROM peminjaman p 
    LEFT JOIN anggota a ON p.id_anggota = a.id_anggota
    LEFT JOIN buku b ON p.id_buku = b.id_buku
    WHERE p.id_peminjaman=?
");
$stmt->execute([$id]);
$peminjaman = $stmt->fetch();
$anggota = $pdo->query("SELECT id_anggota, nama FROM anggota")->fetchAll();
$buku = $pdo->query("SELECT id_buku, judul FROM buku")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">✏️ Edit Peminjaman #<?php echo $id; ?></h2>
    <form action="proses.php?aksi=edit&id=<?php echo $id; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select name="id_anggota" class="form-select" required>
                <?php foreach($anggota as $a): ?>
                <option value="<?php echo $a['id_anggota']; ?>" <?php echo $peminjaman['id_anggota']==$a['id_anggota']?'selected':''; ?>>
                    <?php echo $a['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Buku</label>
            <select name="id_buku" class="form-select" required>
                <?php foreach($buku as $b): ?>
                <option value="<?php echo $b['id_buku']; ?>" <?php echo $peminjaman['id_buku']==$b['id_buku']?'selected':''; ?>>
                    <?php echo $b['judul']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" value="<?php echo $peminjaman['tgl_pinjam']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="dipinjam" <?php echo $peminjaman['status']=='dipinjam'?'selected':''; ?>>Dipinjam</option>
                <option value="dikembalikan" <?php echo $peminjaman['status']=='dikembalikan'?'selected':''; ?>>Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
