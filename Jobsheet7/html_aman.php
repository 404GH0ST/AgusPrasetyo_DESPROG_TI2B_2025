<?php
$input = $_POST['input'];
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
echo $input;
echo "<br>";

// Memeriksa apakah input adalah email yang valid
$email = $_POST['email'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Lanjutkan dengan pengolahan email yang aman
    echo "Format email valid.";
} else {
    // Tangani input yang tidak valid
    echo "Format email tidak valid.";
}
?>