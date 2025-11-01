<!DOCTYPE html>
<html>

<head>
    <title>Form Input dengan Validasi Password</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Form Input dengan Validasi Password</h1>
    <form id="myFormPassword" method="post" action="proses_validasi_password.php">
        <label for="namaPassword">Nama: </label>
        <input type="text" id="namaPassword" name="nama">
        <span id="nama-error-password" style="color: red;"></span><br>
        <label for="emailPassword">Email:</label>
        <input type="text" id="emailPassword" name="email">
        <span id="email-error-password" style="color: red;"></span><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br>
        <input type="submit" value="Submit">
    </form>
    <script>
        $(document).ready(function () {
            $("#myFormPassword").submit(function (event) {
                var nama = $("#namaPassword").val();
                var email = $("#emailPassword").val();
                var password = $("#password").val();
                var valid = true;

                if (nama === "") {
                    $("#nama-error-password").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error-password").text("");
                }

                if (email === "") {
                    $("#email-error-password").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error-password").text("");
                }

                if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>