<?php
session_start();

if( !isset($_SESSION["login"] ) ){
    header("location: login.php");
    exit;

}

require 'function.php';

$bioskop = query("SELECT * FROM film");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="http://localhost/Administrator/bootstrap/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" class="font-weight-bold">bioskop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-outline-success"><a class="nav-link" href="logout.php"onclick="return confirm('Yakin?');">Log Out</a></button>
        </li>
    </ul>
  </div>
</nav>
<div class="container mt-2" >
   <a class="btn btn-secondary" href="insert.php">Tambah film</a>
   </div>    
   <br>
    
    <div class="container">
        <table class="table">
        <thead class="thead-dark">
            <tr>

                <th scope ="col">No</th>

                <th scope ="col"class="align-middle">Aksi</th>

                <th scope ="col">Kode_film</th>

                <th scope ="col">kode_jadwal</th>

                <th scope ="col">Judul</th>

                <th scope ="col">Jam</th>
                <th scope ="col">tanggal</th>
            </tr>
            </thead>
            <?php $i=1; ?>
            <?php foreach($bioskop as $row)  : ?>

            <tr>
                <td><?= $i; ?></td>
                <td>
               <a  class="btn btn-primary" href="update.php?id=<?= $row["id"]; ?>">ubah</a> <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('Yakin?');">Hapus</a> 
                <td> <?= $row["kode_film"]; ?></td>
                <td> <?= $row["kode_jadwal"]; ?></td>
                <td> <?= $row["judul"]; ?></td>
                <td> <?= $row["jam"]; ?></td>
                <td> <?= $row["tanggal"]; ?></td>

            </tr>
            <?php $i++; ?>
            <?php endforeach ;  ?>
        
        </table>
        <br>
        <br>
    </div>




</body>
</html>