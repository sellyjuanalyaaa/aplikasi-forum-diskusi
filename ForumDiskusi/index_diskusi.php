<?php
require_once 'class/Topik.php';
require_once 'class/Comment.php';
require_once 'class/Vote.php';

$topic = new Topik();
$topics = $topic->getTopics();

$comment = new Comment();

$vote = new Vote();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f5f5f5; }
        .table { margin-top: 30px; }
        .table thead th { background-color: #343a40; color: #fff; }
        .btn-vote { margin: 2px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Forum Diskusi</h1>
        <a href="buat_topik.php" class="btn btn-primary mb-3">Buat Topik Baru</a>
        
        <table id="topicsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($topics as $topic): ?>
                <tr>
                    <td><?= htmlspecialchars($topic['title']) ?></td>
                    <td><?= htmlspecialchars($topic['created_at']) ?></td>
                    <td>
                        <a href="tambah_komen.php?id=<?= $topic['id'] ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-comment"></i> Tambah Komentar
                        </a>
                        <a href="viewComments.php?id=<?= $topic['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#topicsTable').DataTable();
        });
    </script>
</body>
</html>
