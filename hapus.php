<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM data_penduduk_smka WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        die("Gagal menghapus data: " . $e->getMessage());
    }
}


header('Location: index.php');
exit;
?>
