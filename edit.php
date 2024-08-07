<?php
include "koneksi.php";

$db = mysqli_connect("localhost","root","","pendaftaran_siswa");

$id = $_GET['id'];
$sql = "SELECT * FROM calon_siswa WHERE id='$id'";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal= $_POST['sekolah_asal'];

$sql = "UPDATE calon_siswa set nama='$nama',alamat='$alamat',jenis_kelamin='$jenis_kelamin',agama='$agama',sekolah_asal='$sekolah_asal' WHERE id='$id' ";
mysqli_query($db, $sql);
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3.edit {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="text"],
        select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
<body>
<div class="container">
<h3 class="edit">edit</h3>
<div class="container">
<form action="" method="post">
        <label for="nama">nama</label>
        <input type="text" id ="nama" value=" <?php echo $data['nama']?>"  name="nama">
        <br>
        <label for="alamat">alamat</label>
        <input type="text" id ="alamat"  value=" <?php echo $data['alamat']?>" name="alamat">
        <br>
        <p>
           <label for="jenis_kelamin">Jenis Kelamin:</label>
           <label><input type="radio" name="jenis_kelamin"value="laki-laki"  value="<?php echo $data['jenis_kelamin'] ?>"  name="jenis_kelamin">Laki-Laki</label>
           <label><input type="radio" name="jenis_kelamin"value="perempuan"  value="<?php echo $data['jenis_kelamin'] ?>"  name="jenis_kelamin">Perempuan</label>
       </p>
        <br>
        <div class="form-group">
                        <label> Agama</label>
                        <select class="form-control" type="text" id ="agama"  value=" <?php echo $data['agama']?>" name="agama">
                          <option>islam</option>
                          <option>kristen</option>
                          <option>Hindu</option>
                          <option>Budha</option>  
                          <option>atheis</option>
                        </select>
                        <br>
                        <br>
        <label for="sekolah_asal">sekolah_asal</label>
        <input type="text" id ="sekolah_asal"  value=" <?php echo $data['sekolah_asal']?>" name="sekolah_asal">
        <br>
        <input type="submit" name="submit" value ="tambah">
        <br>
    </form>
    <a href="home.php">kembali</a>
</body>
</html>
