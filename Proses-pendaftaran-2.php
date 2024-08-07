<?php
include("koneksi.php");

// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])) {
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_Kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // sanitasi data untuk menghindari SQL Injection
    $nama = mysqli_real_escape_string($db, $nama);
    $alamat = mysqli_real_escape_string($db, $alamat);
    $jenis_Kelamin = mysqli_real_escape_string($db, $jenis_Kelamin);
    $agama = mysqli_real_escape_string($db, $agama);
    $sekolah_asal = mysqli_real_escape_string($db, $sekolah_asal);

    // buat query
    $sql = "INSERT INTO calon_siswa(nama, alamat, jenis_kelamin, agama, sekolah_asal) 
            VALUES ('$nama', '$alamat', '$jenis_Kelamin', '$agama', '$sekolah_asal')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>

 