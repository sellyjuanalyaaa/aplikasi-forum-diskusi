<?php
// includes/Comment.php
class Comment {
    
    private $db;

    public function __construct()
    {
        include 'koneksi.php';
        $this->db = $db;
    }

    // Ambil semua komentar berdasarkan topic_id
    public function getCommentsByTopicId($topic_id) {
       return $this->db->query("SELECT * FROM comments WHERE topic_id = '$topic_id' ORDER BY created_at DESC");
    }

    public function addComment($topic_id, $content, $created_at) {
        $created_at = date('Y-m-d H:i:s');
        return $this->db->query("INSERT INTO comments (topic_id, content, created_at) VALUES ('$topic_id', '$content', '$created_at')");
    }

    // Hapus komentar
    public function deleteComment($id) {
        return $this->db->query("DELETE FROM comments WHERE id = '$id'");

    }
}
?>