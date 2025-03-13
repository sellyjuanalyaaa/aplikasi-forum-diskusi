<?php
require_once 'class/Vote.php';
include 'class/koneksi.php';
include 'class/Comment.php';

$comment = new Comment();
$comment_id = $_POST['id'];
$vote = new Vote();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Komentar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Vote Komentar</h1>
        <table id="commentsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Komentar</th>
                    <th>Total Vote</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['content']); ?></td>
                    <td><?php echo $vote->getVoteCount($comment['id']); ?></td>
                    <td>
                        <form method="POST" action="tambah_vote.php" style="display:inline;">
                            <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                            <input type="hidden" name="user_id" value="1"> <!-- Ganti dengan user_id dari session -->
                            <input type="hidden" name="vote_type" value="up">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-thumbs-up"></i> Upvote (<?php echo $vote->getVoteCount($comment['id'], 'up'); ?>)
                            </button>
                        </form>
                        <form method="POST" action="tambah_vote.php" style="display:inline;">
                            <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                            <input type="hidden" name="user_id" value="1"> <!-- Ganti dengan user_id dari session -->
                            <input type="hidden" name="vote_type" value="down">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-thumbs-down"></i> Downvote (<?php echo $vote->getVoteCount($comment['id'], 'down'); ?>)
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS dan Dependencies -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#commentsTable').DataTable();
        });
    </script>
</body>
</html>
