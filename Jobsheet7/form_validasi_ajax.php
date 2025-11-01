<!DOCTYPE html>
<html>

<head>
    <title>Form Input dengan Validasi (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Form Input dengan Validasi (AJAX)</h1>
    <form id="myFormAjax" method="post">
        <label for="namaAjax">Nama: </label>
        <input type="text" id="namaAjax" name="nama">
        <span id="nama-error-ajax" style="color: red;"></span><br>
        <label for="emailAjax">Email:</label>
        <input type="text" id="emailAjax" name="email">
        <span id="email-error-ajax" style="color: red;"></span><br>
        <input type="submit" value="Submit">
    </form>
    <div id="ajax-response"></div>
    <script>
        $(document).ready(function () {
            $("#myFormAjax").submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "proses_validasi_ajax.php",
                    data: formData,
                    success: function (response) {
                        var parts = response.split('|');
                        $("#nama-error-ajax").text(parts[0] || "");
                        $("#email-error-ajax").text(parts[1] || "");
                        $("#ajax-response").html(parts[2] || "");
                    }
                });
            });
        });
    </script>
</body>

</html>