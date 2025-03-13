<?php

include 'class/koneksi.php';    
include 'class/Comment.php';    


if(isset($_POST['createComment'])) {
    $topic_id = $_POST['id'];
    $comment->addComment($_POST['topic_id'], $_POST['content'], $created_at);
    header('Location: viewComments.php?id=' . $_POST['topic_id']);
    exit();
}