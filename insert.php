<?php

session_start();

if( !isset($_SESSION["login"] ) ){
    header("location: login.php");
    exit;

}

require 'function.php';

if(isset($_POST["tambah"] ) ) {
    //cek data berhasil ditambhkan atau tidak
    
    if(tambah($_POST)>0){
        echo"<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>";
    }
    else{
        echo"<script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
    </script>";
    }

}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Administrator/bootstrap/css/bootstrap.css">
    <title>Tambah data </title>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" class="font-weight-bold">Bioskop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-outline-success"><a class="nav-link" href="logout.php"onclick="return confirm('Yakin?');">Log Out</a></button>
        </li>
    </ul>
  </div>
</nav>

<main role="main" class="container mt-5">
        <div class="col-md-7" style="margin: 0 auto">
            <div class="card shadow">
                <div class="card-body">
        <form action="" method="POST" class ="form-group">
            <ul>
                
                <li>
                    <label  class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="kodefilm">kodefilm : </label>
                    <input type="text" name ="kode_film" id="kode_film" required>
            
                </li>

                <li>
                    <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="kode_jadwal">Kode jadwal: </label>
                    <input type="text" name ="kode_jadwal" id="kode_jadwal"required>
            
                </li>

                <li>
                    <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="judul"> judul: </label>
                    <input type="text" name ="judul" id="judul" required>
            
                </li>

                <li>
                    <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm"for="jam">jam: </label>
                    <select class="form-control" id="jam" name = "jam">
                                <option>14:00</option>
                                <option>08:00</option>
                                <option>17:25</option>
                                <option>18:00</option>    
                    </select>

                <li>
                    <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm"for="tanggal">tanggal: </label>
                    <select class="form-control" id="tanggal" name = "tanggal">
                                <option>2020-04-12</option>
                                <option>2020-05-15</option>
                                <option>2020-07-01</option>
                                <option>2020-08-2020</option>    
                    </select>
            
                </li>
                <br>

                <button class="btn btn-primary" type ="submit" name ="tambah">Tambah</button>
            
            </ul>
        
            </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>