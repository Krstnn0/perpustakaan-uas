<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Data Peminjaman</h2>
        <a href="tambah.php" class="btn btn-success">+ Peminjaman Baru</a>
    </div>
    
    <?php if(isset($_GET['msg'])): ?>
    <div class="alert alert-success"><?php 
        if($_GET['msg']=='berhasil_tambah') echo 'Data berhasil ditambah!';
        elseif($_GET['msg']=='berhasil_edit') echo 'Data berhasil diupdate!';
        elseif($_GET['msg']=='berhasil_hapus') echo 'Data berhasil dihapus!';
    ?></div>
    <?php endif; ?>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th style="width: 8%;">ID</th>
                    <th style="width: 20%;">ID Anggota</th>
                    <th style="width: 20%;">ID Buku</th>
                    <th style="width: 15%;">Tgl Pinjam</th>
                    <th style="width: 12%;">Status</th>
                    <th style="width: 25%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM peminjaman ORDER BY id_peminjaman DESC");
                if($stmt->rowCount() == 0):
                ?>
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data peminjaman</td>
                </tr>
                <?php else: 
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                ?>
                <tr>
                    <td><strong>#<?php echo $row['id_peminjaman']; ?></strong></td>
                    <td>ID: <?php echo $row['id_anggota']; ?></td>
                    <td>ID: <?php echo $row['id_buku']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($row['tgl_pinjam'])); ?></td>
                    <td>
                        <span class="badge fs-6 px-3 py-2 rounded-pill bg-<?php echo $row['status']=='dipinjam' ? 'warning text-dark' : 'success'; ?>">
                            <?php echo ucwords($row['status']); ?>
                        </span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="edit.php?id=<?php echo $row['id_peminjaman']; ?>" 
                               class="btn btn-warning">Edit</a>
                            <a href="proses.php?aksi=hapus&id=<?php echo $row['id_peminjaman']; ?>" 
                               class="btn btn-danger" onclick="return confirm('Yakin hapus peminjaman #<?php echo $row['id_peminjaman']; ?>?')">
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        <a href="../index.php" class="btn btn-secondary">← Dashboard</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
