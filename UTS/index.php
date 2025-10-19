<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - Berbagi Ide dan Pendapat</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <h1 class="logo">Forum Diskusi</h1>
                <p class="tagline">Tempat Berbagi Ide dan Pendapat</p>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="create-post-section">
            <h2 class="section-title">Buat Postingan Baru</h2>
            
            <form id="postForm" class="post-form" method="POST" action="process.php">
                <input type="hidden" name="action" value="add_post">
                
                <div class="form-group">
                    <label for="judul">Judul Postingan *</label>
                    <input 
                        type="text" 
                        id="judul" 
                        name="judul" 
                        placeholder="Masukkan judul postingan Anda"
                        class="form-input"
                    >
                    <span class="error-message" id="error-judul"></span>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Anda *</label>
                    <input 
                        type="text" 
                        id="nama" 
                        name="nama" 
                        placeholder="Masukkan nama Anda"
                        class="form-input"
                    >
                    <span class="error-message" id="error-nama"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Anda *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email Anda"
                        class="form-input"
                    >
                    <span class="error-message" id="error-email"></span>
                </div>

                <div class="form-group">
                    <label for="konten">Konten Postingan *</label>
                    <textarea 
                        id="konten" 
                        name="konten" 
                        placeholder="Tuliskan konten postingan Anda di sini (minimal 10 karakter)"
                        class="form-textarea"
                        rows="6"
                    ></textarea>
                    <span class="error-message" id="error-konten"></span>
                    <span class="char-count">0 / 500 karakter</span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Kirim Postingan</button>
                    <button type="reset" class="btn btn-secondary">Bersihkan</button>
                </div>
            </form>
        </section>

        <section class="posts-section">
            <h2 class="section-title">Daftar Postingan</h2>
            <div id="postsList" class="posts-list">
                <?php
                    if (isset($_SESSION['posts']) && count($_SESSION['posts']) > 0) {
                        foreach ($_SESSION['posts'] as $postIndex => $post) {
                            $postDate = date('d M Y H:i', strtotime($post['tanggal']));
                            
                            echo '<div class="post-card">';
                            
                            echo '<div class="post-header">';
                            echo '<div>';
                            echo '<h3 class="post-title">' . htmlspecialchars($post['judul']) . '</h3>';
                            echo '<div class="post-meta">';
                            echo '<span class="post-meta-item">👤 ' . htmlspecialchars($post['nama']) . '</span>';
                            echo '<span class="post-meta-item">📧 ' . htmlspecialchars($post['email']) . '</span>';
                            echo '<span class="post-meta-item">📅 ' . $postDate . '</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            
                            echo '<div class="post-content">' . htmlspecialchars($post['konten']) . '</div>';
                            
                            echo '<div class="post-actions">';
                            echo '<button class="btn btn-primary btn-small" onclick="openCommentModal(' . $postIndex . ')">Tambah Komentar</button>';
                            echo '</div>';

                            echo '<div class="comments-section">';
                            
                            if (isset($post['komentar']) && count($post['komentar']) > 0) {
                                echo '<div class="comments-title">Komentar (' . count($post['komentar']) . ')</div>';
                                echo '<div class="comments-list">';
                                
                                foreach ($post['komentar'] as $comment) {
                                    $commentDate = date('d M Y H:i', strtotime($comment['tanggal']));
                                    
                                    echo '<div class="comment-item">';
                                    echo '<div class="comment-header">';
                                    echo '<span class="comment-author">' . htmlspecialchars($comment['nama']) . '</span>';
                                    echo '<span class="comment-time">' . $commentDate . '</span>';
                                    echo '</div>';
                                    echo '<div class="comment-content">' . htmlspecialchars($comment['konten']) . '</div>';
                                    echo '</div>';
                                }
                                
                                echo '</div>';
                            } else {
                                echo '<div class="comments-title">Komentar</div>';
                                echo '<p class="no-comments">Belum ada komentar. Jadilah yang pertama berkomentar!</p>';
                            }
                            
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="no-posts">Belum ada postingan. Jadilah yang pertama membuat postingan!</p>';
                    }
                ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Agus Prasetyo</p>
        </div>
    </footer>

    <div id="commentModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Komentar</h3>
                <button class="modal-close">&times;</button>
            </div>
            
            <form id="commentForm" class="comment-form" method="POST" action="process.php">
                <input type="hidden" name="action" value="add_comment">
                <input type="hidden" id="postIndex" name="postIndex">
                
                <div class="form-group">
                    <label for="commentNama">Nama Anda *</label>
                    <input 
                        type="text" 
                        id="commentNama" 
                        name="commentNama" 
                        placeholder="Masukkan nama Anda"
                        class="form-input"
                    >
                    <span class="error-message" id="error-commentNama"></span>
                </div>

                <div class="form-group">
                    <label for="commentEmail">Email Anda *</label>
                    <input 
                        type="email" 
                        id="commentEmail" 
                        name="commentEmail" 
                        placeholder="Masukkan email Anda"
                        class="form-input"
                    >
                    <span class="error-message" id="error-commentEmail"></span>
                </div>

                <div class="form-group">
                    <label for="commentKonten">Komentar Anda *</label>
                    <textarea 
                        id="commentKonten" 
                        name="commentKonten" 
                        placeholder="Tuliskan komentar Anda"
                        class="form-textarea"
                        rows="4"
                    ></textarea>
                    <span class="error-message" id="error-commentKonten"></span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    <button type="button" class="btn btn-secondary modal-close-btn">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
