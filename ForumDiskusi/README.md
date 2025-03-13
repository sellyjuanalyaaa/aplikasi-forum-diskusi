# README - Struktur Forum Diskusi

Link Github = https://github.com/sellyjuanalyaaa/aplikasi-forum-diskusi

## Struktur Folder dan Kegunaan

### **Folder `class/`**
Berisi class PHP untuk mengelola fitur utama forum diskusi.

- **`Comment.php`**: Mengelola komentar pada topik diskusi (menambah, menghapus, dan mengambil komentar).
- **`koneksi.php`**: Konfigurasi koneksi database menggunakan PDO.
- **`Topik.php`**: Mengelola data topik diskusi (membuat, mengambil, dan menghapus topik).
- **`Vote.php`**: Mengelola fitur voting pada komentar (upvote dan downvote).

### **File Utama**
- **`buat_topik.php`**: Halaman untuk membuat topik diskusi baru.
- **`controller_topik.php`**: Menghandle request terkait topik, seperti menambah dan menghapus topik.
- **`controller_komen.php`**: Menghandle request terkait komentar, seperti menambah dan menghapus komentar.
- **`index_diskusi.php`**: Halaman utama yang menampilkan daftar topik diskusi.
- **`tambah_komen.php`**: Memproses penambahan komentar ke database.
- **`tambah_vote.php`**: Memproses voting komentar.
- **`viewComments.php`**: Menampilkan daftar komentar berdasarkan topik yang dipilih.

## Struktur Database
Berikut adalah struktur tabel yang digunakan dalam sistem forum diskusi:

```sql
CREATE TABLE topics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    topic_id INT,
    user_id INT,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topics(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comment_id INT,
    user_id INT,
    vote_type ENUM('up', 'down') NOT NULL,
    FOREIGN KEY (comment_id) REFERENCES comments(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

## Cara Menggunakan
1. Pastikan database telah dibuat dan file `koneksi.php` telah dikonfigurasi dengan benar.
2. Jalankan `index_diskusi.php` untuk melihat daftar topik yang tersedia.
3. Gunakan `buat_topik.php` untuk menambahkan topik baru.
4. Klik pada topik untuk melihat komentar dan menambahkan komentar baru.
5. Gunakan fitur voting pada komentar dengan tombol upvote/downvote.


