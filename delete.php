<?php
require 'db.php';
$id = intval($_GET['id'] ?? 0);
if ($id) {
    $stmt = mysqli_prepare($conn, "DELETE FROM books WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
header('Location: index.php');
exit;
?>