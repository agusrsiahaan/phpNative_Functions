<?php

require 'function.php';

    if(isset($_POST["register"])){

        if(registrasi($_POST)> 0){
            echo " <script>
                    alert('User baru berhasil ditambahkan');
                    </script> ";
            
        } 
        else{
            echo mysqli_error($conn);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="util.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Administrator/bootstrap/css/bootstrap.css">
    <title>Regsitrasi</title>
</head>
<body>
<main role="main" class="container mt-5">
        <div class="col-md-7" style="margin: 0 auto">
            <div class="card shadow">
                <div class="card-body">

        <form action=""method="POST">
         <ul> 
             <div class="wrap-input100 rs1 validate-input">               
             <input class="input100" type="text" name= "username" placeholder="Username/Email" required>
            </div>
            <div class="wrap-input100 rs2 validate-input">
            <input class="input100" type="password" name= "password" placeholder="password"required>
            </div>

            <div class="wrap-input100 rs2 validate-input">
            <input class="input100" type="password" name= "password2" placeholder="Konfirmasi Password"required>
            </div>
        <div class="container-login100-form-btn">
            <br>
            
            <button  class="btn btn-outline-success" type="submit" name="register">Register</button>
            
            </div>
            <p class ="input100">Sudah ada akun?<a href="login.php">klik disini   </a></p>

            </div>
        
        
        
        

    </ul>

</form>
</div>
</div>
</div>
</main>
</body>
</html>