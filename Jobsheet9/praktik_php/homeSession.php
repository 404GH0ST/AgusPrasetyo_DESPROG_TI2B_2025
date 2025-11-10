<!DOCTYPE html>
<html>

<head>
    <title>Home Session</title>
</head>

<body>
    <?php
    session_start();

    if ($_SESSION['status'] == 'login') {
        echo "selamat datang " . $_SESSION['username'];
        ?>
        <br>
        <br><a href="sessionLogout.php">Log Out</a>
        <?php
    } else {
        echo "anda belum login, silahkan ";
        echo "<a href='sessionLoginForm.html'>Log In</a>";
    }
    ?>
</body>

</html>