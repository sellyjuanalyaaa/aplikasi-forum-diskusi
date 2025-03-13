<?php

require_once 'class/Comment.php';
include 'class/koneksi.php';
require_once 'class/Topik.php';

$topics = new Topik();


if (isset($_GET['id'])) {
    $topic = $topics->getTopicById($_GET['id']);
}

$comment = new Comment();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Topik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        function showAlert() {
            let alertDiv = document.createElement("div");
            alertDiv.className = "alert alert-success alert-dismissible fade show mt-3";
            alertDiv.role = "alert";
            alertDiv.innerHTML = "Komentar berhasil dikirim!" +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            document.getElementById("alert-container").appendChild(alertDiv);
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <!-- Judul Topik -->
        <?php foreach ($topics as $topic): ?>
        <h1><?php echo htmlspecialchars($topic['title']); ?></h1>
        <p class="text-muted">
            Dibuat oleh: User <?php echo htmlspecialchars($topic['user_id']); ?> pada <?php echo htmlspecialchars($topic['created_at']); ?>
        </p>
        <?php endforeach; ?>

        <!-- Alert Container -->
        <div id="alert-container"></div>

        <!-- Form Komentar -->
        <form method="POST" class="mb-4" onsubmit="showAlert(); return false;">
            <div class="mb-3">
                <label for="content" class="form-label">Tambah Komentar</label>
                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="createComment">Kirim Komentar</button>
        </form>

        <!-- Daftar Komentar -->
        <h3>Komentar</h3>
        <?php if (empty($comments)): ?>
            <p>Belum ada komentar.</p>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text"><?php echo htmlspecialchars($comment->content); ?></p>
                        <p class="text-muted">
                            <small>Oleh: User <?php echo htmlspecialchars($comment->user_id); ?> pada <?php echo htmlspecialchars($comment->created_at); ?></small>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
