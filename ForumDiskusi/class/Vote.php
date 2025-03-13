<?php
// includes/Vote.php
class Vote {
    private $db;

    public function __construct()
    {
        include 'koneksi.php';
        $this->db = $db;
    }

    // Tambah vote (upvote/downvote)
    public function addVote($comment_id, $user_id, $vote_type) {
        return$this->db->query('INSERT INTO votes (comment_id, user_id, vote_type) VALUES ($comment_id, $user_id, $vote_type)');
        
        
    }

    // Hapus vote
    public function deleteVote($id) {
     return    $this->db->query('DELETE FROM votes WHERE id = $id');
    
    }

    // Ambil total vote untuk sebuah komentar
    public function getVoteCount($id) {
        return $this->db->query("SELECT COUNT(*) FROM votes WHERE id = '$id'");
       
    }
}
?>