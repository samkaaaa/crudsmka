 <?php
include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM data_penduduk_smka WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if (!$mahasiswa) {          
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NIK = $_POST['NIK'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];


    $sql = "UPDATE data_penduduk_smka SET NIK = :NIK, nama = :nama, alamat = :alamat, pekerjaan = :pekerjaan WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':NIK' => $NIK,
        ':nama' => $nama,
        ':alamat' => $alamat,
        ':pekerjaan' => $pekerjaan,
        ':id' => $id
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
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Mahasiswa</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="NIK" class="form-label">NIK</label>
            <input type="text" class="form-control" id="NIK" name="NIK" value="<?= htmlspecialchars($mahasiswa['NIK']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">NAMA</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($mahasiswa['nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($mahasiswa['alamat']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= htmlspecialchars($mahasiswa['pekerjaan']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
