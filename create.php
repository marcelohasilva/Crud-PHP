<?php
require 'db.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $year = intval($_POST['year'] ?? 0);
    $genre = trim($_POST['genre'] ?? '');
    if ($title === '') $errors[] = 'O título é obrigatório.';
    if ($author === '') $errors[] = 'O autor é obrigatório.';
    if (empty($errors)) {
        $stmt = mysqli_prepare($conn, "INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssis', $title, $author, $year, $genre);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Adicionar Livro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Adicionar Livro</h1>
    <?php if ($errors): ?>
      <div class="errors">
        <?php foreach($errors as $e) echo '<p>'.htmlspecialchars($e).'</p>'; ?>
      </div>
    <?php endif; ?>
    <form method="post">
      <label>Título<br><input name="title" required></label>
      <label>Autor<br><input name="author" required></label>
      <label>Ano<br><input name="year" type="number" min="0"></label>
      <label>Gênero<br><input name="genre"></label>
      <p><button class="btn" type="submit">Salvar</button> <a href="index.php">Cancelar</a></p>
    </form>
  </div>
</body>
</html>