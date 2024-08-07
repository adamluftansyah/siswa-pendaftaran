<?php

include("koneksi.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db,$sql);

    //check
    if($query){
        header('location:index.php');
    }else{
        die("gagal menghapus..");
    }
}

?>