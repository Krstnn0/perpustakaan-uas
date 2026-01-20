<?php 
include '../koneksi.php'; 
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM anggota WHERE id_anggota=?");
$stmt->execute([$id]);
$anggota = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">✏️ Edit Data Anggota</h2>
    <form action="proses.php?aksi=edit&id=<?php echo $id; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($anggota['nama']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required><?php echo htmlspecialchars($anggota['alamat']); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="no_telp" value="<?php echo htmlspecialchars($anggota['no_telp']); ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input type="radio" name="jenis_kelamin" value="L" class="form-check-input" <?php echo $anggota['jenis_kelamin']=='L'?'checked':''; ?> required> Laki-laki
            </div>
            <div class="form-check">
                <input type="radio" name="jenis_kelamin" value="P" class="form-check-input" <?php echo $anggota['jenis_kelamin']=='P'?'checked':''; ?> required> Perempuan
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" value="<?php echo $anggota['tanggal_daftar']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
