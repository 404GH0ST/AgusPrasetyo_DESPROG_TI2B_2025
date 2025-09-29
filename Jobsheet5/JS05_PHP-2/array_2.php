<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informasi Dosen</title>
    <style>
        .info-table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        .info-table th, .info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .info-table th {
            background-color: #f2f2f2; 
            color: #333; 
            width: 30%; 
        }

        .info-table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];
    ?>

    <table class="info-table">
        <tr>
            <th>Nama</th>
            <td><?php echo $Dosen['nama']; ?></td>
        </tr>
        <tr>
            <th>Domisili</th>
            <td><?php echo $Dosen['domisili']; ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo $Dosen['jenis_kelamin']; ?></td>
        </tr>
    </table>

</body>
</html>