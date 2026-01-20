<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">📚 Data Buku</h2>
    
    <!-- Tombol Tambah -->
    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Buku Baru</a>
    
    <!-- Tabel Data -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM buku ORDER BY id_buku DESC");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
            ?>
            <tr>
                <td><?php echo $row['id_buku']; ?></td>
                <td><?php echo htmlspecialchars($row['judul']); ?></td>
                <td><?php echo htmlspecialchars($row['pengarang']); ?></td>
                <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                <td><span class="badge bg-<?php echo $row['stok']>0 ? 'success' : 'danger'; ?>">
                    <?php echo $row['stok']; ?></span></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id_buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses.php?aksi=hapus&id=<?php echo $row['id_buku']; ?>" 
                       class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary">← Kembali</a>
</div>
</body>
</html>
