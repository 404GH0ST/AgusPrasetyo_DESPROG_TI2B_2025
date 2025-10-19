<?php
// ===== SESSION INITIALIZATION =====
session_start();

// Initialize posts array if not exists
if (!isset($_SESSION['posts'])) {
  $_SESSION['posts'] = array();
}

// ===== VARIABLES =====
$action = isset($_POST['action']) ? $_POST['action'] : '';
$validationErrors = array();
$isSuccess = false;

// ===== HANDLE FORM SUBMISSION =====
if ($action === 'add_post') {
  $validationErrors = validatePostInput();

  if (empty($validationErrors)) {
    $newPost = createPostArray();
    array_unshift($_SESSION['posts'], $newPost);

    // Limit stored posts to 100
    if (count($_SESSION['posts']) > 100) {
      $_SESSION['posts'] = array_slice($_SESSION['posts'], 0, 100);
    }

    $isSuccess = true;
  }
} elseif ($action === 'add_comment') {
  $validationErrors = validateCommentInput();

  if (empty($validationErrors)) {
    $postIndex = (int)$_POST['postIndex'];

    if (isset($_SESSION['posts'][$postIndex])) {
      $newComment = createCommentArray();
      $_SESSION['posts'][$postIndex]['komentar'][] = $newComment;
      $isSuccess = true;
    }
  }
}

// Redirect back to index after processing
header('Location: index.php');
exit();

// ===== VALIDATION FUNCTIONS =====
function validatePostInput() {
  $errors = array();

  // Validate judul
  if (empty($_POST['judul'])) {
    $errors['judul'] = 'Judul tidak boleh kosong';
  }

  // Validate nama
  if (empty($_POST['nama'])) {
    $errors['nama'] = 'Nama tidak boleh kosong';
  }

  // Validate email
  if (empty($_POST['email'])) {
    $errors['email'] = 'Email tidak boleh kosong';
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Format email tidak valid';
  }

  // Validate konten
  if (empty($_POST['konten'])) {
    $errors['konten'] = 'Konten tidak boleh kosong';
  } elseif (strlen($_POST['konten']) < 10) {
    $errors['konten'] = 'Konten minimal 10 karakter';
  }

  return $errors;
}

function validateCommentInput() {
  $errors = array();

  // Validate post index
  if (!isset($_POST['postIndex']) || !is_numeric($_POST['postIndex'])) {
    $errors['postIndex'] = 'Post tidak ditemukan';
  }

  // Validate nama
  if (empty($_POST['commentNama'])) {
    $errors['commentNama'] = 'Nama tidak boleh kosong';
  } elseif (strlen($_POST['commentNama']) < 3) {
    $errors['commentNama'] = 'Nama minimal 3 karakter';
  }

  // Validate email
  if (empty($_POST['commentEmail'])) {
    $errors['commentEmail'] = 'Email tidak boleh kosong';
  } elseif (!filter_var($_POST['commentEmail'], FILTER_VALIDATE_EMAIL)) {
    $errors['commentEmail'] = 'Format email tidak valid';
  }

  // Validate konten
  if (empty($_POST['commentKonten'])) {
    $errors['commentKonten'] = 'Komentar tidak boleh kosong';
  } elseif (strlen($_POST['commentKonten']) < 5) {
    $errors['commentKonten'] = 'Komentar minimal 5 karakter';
  }

  return $errors;
}

// ===== DATA CREATION FUNCTIONS =====
function createPostArray() {
  return array(
    'judul' => sanitizeInput($_POST['judul']),
    'nama' => sanitizeInput($_POST['nama']),
    'email' => sanitizeInput($_POST['email']),
    'konten' => sanitizeInput($_POST['konten']),
    'tanggal' => date('Y-m-d H:i:s'),
    'komentar' => array()
  );
}

function createCommentArray() {
  return array(
    'nama' => sanitizeInput($_POST['commentNama']),
    'email' => sanitizeInput($_POST['commentEmail']),
    'konten' => sanitizeInput($_POST['commentKonten']),
    'tanggal' => date('Y-m-d H:i:s')
  );
}

// ===== UTILITY FUNCTIONS =====
function sanitizeInput($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
  return $input;
}
?>
