<?php
include 'class/koneksi.php';
include 'class/Comment.php';
include 'class/Vote.php'; // Tambahkan agar objek Vote bisa digunakan

$comment = new Comment();
$vote = new Vote(); // Inisialisasi objek Vote

// Pastikan 'id' dikirim melalui GET atau POST
$topic_id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);

if (!$topic_id) {
    die("ID topik tidak ditemukan!");
}

// Ambil komentar berdasarkan ID topik
$comments = $comment->getCommentsByTopicId($topic_id);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Komentar:</h3>
        <?php if (!empty($comments)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Komentar</th>
                        <th>Total Vote</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $cmt): ?>
                    <tr>
                        <td><?= htmlspecialchars($cmt['content']) ?></td>
                        <td><?= $vote->getVoteCount($cmt['id']) ?></td>
                        <td>
                            <form method="POST" action="add_vote.php" class="d-inline">
                                <input type="hidden" name="comment_id" value="<?= $cmt['id'] ?>">
                                <input type="hidden" name="user_id" value="1"> <!-- Ganti dengan session user_id -->
                                <input type="hidden" name="vote_type" value="up">
                                <button type="submit" class="btn btn-success btn-sm btn-vote">
                                    <i class="fas fa-thumbs-up"></i> Upvote
                                </button>
                            </form>
                            <form method="POST" action="add_vote.php" class="d-inline">
                                <input type="hidden" name="comment_id" value="<?= $cmt['id'] ?>">
                                <input type="hidden" name="user_id" value="1"> <!-- Ganti dengan session user_id -->
                                <input type="hidden" name="vote_type" value="down">
                                <button type="submit" class="btn btn-danger btn-sm btn-vote">
                                    <i class="fas fa-thumbs-down"></i> Downvote
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada komentar untuk topik ini.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
