<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];

    
    $sql = "INSERT INTO data_penduduk_smka (NIK, nama, alamat, pekerjaan) VALUES (:NIK, :nama, :alamat, :pekerjaan)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':NIK' => $NIK,
        ':nama' => $nama,
        ':alamat' => $alamat,
        ':pekerjaan' => $pekerjaan,
    ]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Tambah cuy</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="NIK" class="form-label">NIK</label>
            <input type="text" class="form-control" id="NIK" name="NIK" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
