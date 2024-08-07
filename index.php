<?php 
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2em;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 1em;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            color: blue;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <a href="form-pendaftar.php" class="add-button">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Sekolah Asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = mysqli_query($db, "SELECT * FROM calon_siswa ORDER BY id DESC");
        while ($data_user = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $data_user['nama']; ?></td> 
                <td><?php echo $data_user['alamat']; ?></td> 
                <td><?php echo $data_user['jenis_kelamin']; ?></td> 
                <td><?php echo $data_user['agama']; ?></td> 
                <td><?php echo $data_user['sekolah_asal']; ?></td> 
                <td class="action-links">
                    <a class="hapus" href="hapus.php?id=<?php echo $data_user['id']; ?>">hapus</a>|
                    <a class="edit" href="edit.php?id=<?php echo $data_user['id']; ?>">edit</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
