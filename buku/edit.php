<?php 
include '../koneksi.php'; 
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM buku WHERE id_buku=?");
$stmt->execute([$id]);
$buku = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">✏️ Edit Buku</h2>
    <form action="proses.php?aksi=edit&id=<?php echo $id; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="<?php echo htmlspecialchars($buku['judul']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pengarang</label>
            <input type="text" name="pengarang" value="<?php echo htmlspecialchars($buku['pengarang']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" name="penerbit" value="<?php echo htmlspecialchars($buku['penerbit']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" value="<?php echo htmlspecialchars($buku['kategori']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" value="<?php echo $buku['stok']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
