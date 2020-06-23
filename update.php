<?php
require 'function.php';

    //ambil data URL
    $id =$_GET["id"];

    // query data berdasarkan id
    $flm = query("SELECT * FROM film WHERE id = $id")[0];
    

if(isset($_POST["ubah"] ) ) {
    //cek data berhasil ditambhkan atau tidak
    
    if(ubah($_POST) >0){
        echo"<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>";
    }
    else{
        echo"<script>
        alert('Data gagal diubah');
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
    <title>Ubah data </title>
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
        <form action="" method="POST">
            <ul>
                
                <li>
                    <input type="hidden" name ="id" id="id" value ="<?=$flm["id"];  ?>">

                    <label  class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="kode_film">Kode_film : </label>
                    <input type="text" name ="kode_film" id="kode_film" required value ="<?=$flm["kode_film"];  ?>">
            
                </li>

                <li>
                    <label  class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="kode_jadwal">kode_jadwal: </label>
                    <input type="text" name ="kode_jadwal" id="kode_jadwal"required value ="<?=$flm["kode_jadwal"];  ?>">
            
                </li>

                <li>
                    <label  class="col-sm-2 col-form-label" style="margin-left: 1.5cm" for="judul">judul : </label>
                    <input type="text" name ="judul" id="judul" required value ="<?=$flm["judul"];  ?>">
            
                </li>

                <li>
                    <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm"  for="jam">jam : </label>
                    <select class="form-control" id="jam" name = "jam" value="<?=$flm["jam"]; ?>">
                                <option>18:00</option>
                                <option>21:57</option>
                                <option>23:40</option>
                                <option>08:53</option>    
                    </select>
            
                </li>

                <label class="col-sm-2 col-form-label" style="margin-left: 1.5cm"for="tanggal">tanggal: </label>
                    <select class="form-control" id="tanggal" name = "tanggal" value ="<?=$flm["tanggal"]; ?>">
                                 <option>2020-04-12</option>
                                <option>2020-05-15</option>
                                <option>2020-07-01</option>   
                    </select>
                <br>
                <button  class="btn btn-primary" type ="submit" name ="ubah">ubah</button>
            
            </ul>
        
        </form>
    </div>
</div>
</div>
</main>



</body>
</html>