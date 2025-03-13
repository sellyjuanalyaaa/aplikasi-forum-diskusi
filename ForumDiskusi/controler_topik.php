<?php 
include 'class/Topik.php';
$topic = new Topik();

if (isset($_POST['createTopic'])) {
    $created_at = date('Y-m-d H:i:s');
    $topic->createTopic($_POST['title'], $created_at, 1);
    header('Location: index_diskusi.php');
    exit();
}

?>
