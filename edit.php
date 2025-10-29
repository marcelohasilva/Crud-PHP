<?php
require 'db.php';
$id = intval($_GET['id'] ?? 0);
if (!$id) {
    header('Location: index.php'); exit;
}
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $year = intval($_POST['year'] ?? 0);
    $genre = trim($_POST['genre'] ?? '');
    if ($title === '') $errors[] = 'O título é obrigatório.';
    if ($author === '') $errors[] = 'O autor é obrigatório.';
    if (empty($errors)) {
        $stmt = mysqli_prepare($conn, "UPDATE books SET title=?, author=?, year=?, genre=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'ssisi', $title, $author, $year, $genre, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: index.php');
        exit;
    }
} else {
    $res = mysqli_query($conn, "SELECT * FROM books WHERE id = $id LIMIT 1");
    $row = mysqli_fetch_assoc($res);
    if (!$row) { header('Location: index.php'); exit; }
    $title = $row['title']; $author = $row['author']; $year = $row['year']; $genre = $row['genre'];
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Editar Livro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Editar Livro</h1>
    <?php if ($errors): ?>
      <div class="errors"><?php foreach($errors as $e) echo '<p>'.htmlspecialchars($e).'</p>'; ?></div>
    <?php endif; ?>
    <form method="post">
      <label>Título<br><input name="title" value="<?= htmlspecialchars($title) ?>" required></label>
      <label>Autor<br><input name="author" value="<?= htmlspecialchars($author) ?>" required></label>
      <label>Ano<br><input name="year" type="number" value="<?= htmlspecialchars($year) ?>"></label>
      <label>Gênero<br><input name="genre" value="<?= htmlspecialchars($genre) ?>"></label>
      <p><button class="btn" type="submit">Atualizar</button> <a href="index.php">Cancelar</a></p>
    </form>
  </div>
</body>
</html>