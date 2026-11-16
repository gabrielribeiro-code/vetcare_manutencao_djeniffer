<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';
exigirLogin();

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    try {
        $s = $pdo->prepare("DELETE FROM tutores WHERE id = ?");
        $s->execute([$id]);
    } catch (PDOException $e) {
    $_SESSION['erro_tutor'] = "Não é possível excluir o tutor, pois ele está vinculado a um animal.";
    header('Location: index.php');
    exit;
    }
}

header('Location: index.php');
exit;
