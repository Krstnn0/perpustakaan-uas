<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">👤 Data Anggota</h2>
    
    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Anggota Baru</a>
    
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM anggota ORDER BY id_anggota DESC");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
            ?>
            <tr>
                <td><?php echo $row['id_anggota']; ?></td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                <td><?php echo htmlspecialchars($row['no_telp']); ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo date('d/m/Y', strtotime($row['tanggal_daftar'])); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses.php?aksi=hapus&id=<?php echo $row['id_anggota']; ?>" 
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
