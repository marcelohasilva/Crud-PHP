<?php
require 'db.php';
$result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Lista de Livros</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Biblioteca — Livros</h1>
    <p><a class="btn" href="create.php">+ Adicionar Livro</a></p>
    <table>
      <thead>
        <tr><th>ID</th><th>Título</th><th>Autor</th><th>Ano</th><th>Gênero</th><th>Ações</th></tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['author']) ?></td>
          <td><?= htmlspecialchars($row['year']) ?></td>
          <td><?= htmlspecialchars($row['genre']) ?></td>
          <td>
            <a class="small" href="edit.php?id=<?= $row['id'] ?>">Editar</a>
            <a class="small danger" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Excluir esse livro?')">Excluir</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>