<?php
// class/Topic.php

class Topik {
    private $db;

    public function __construct() {
        // Include file koneksi dan simpan objek koneksi ke property $this->db
        include 'koneksi.php';
        $this->db = $db;
    }

    // Ambil semua topik
    public function getTopics() {
       return $this->db->query('SELECT * FROM topics ORDER BY created_at DESC');

    }

    // Buat topik baru
    public function createTopic($title, $created_at, $user_id) {
        return $this->db->query("INSERT INTO topics (title, created_at, user_id) VALUES ('$title', '$created_at', 1)");
        }
    public function getTopicById($id) {
            return $query = $this->db->query("SELECT * FROM topics WHERE id = '$id'");
            ;
        }


    // Hapus topik
    public function deleteTopic($id) {
        $query = $this->db->prepare('DELETE FROM topics WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute(); // Mengembalikan true jika berhasil, false jika gagal
    }
}
?>
