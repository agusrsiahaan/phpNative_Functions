<?php
session_start();

if( isset($_SESSION["login"] ) ){
    header("location: index.php");
    exit;

}

require 'function.php';

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username'");

    if(mysqli_num_rows($result) ==1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row["password"])){

            //set session
            $_SESSION["login"] = true;
           header("location: index.php");
           exit;
            
    
        }
    }

    $eror = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Administrator/bootstrap/css/bootstrap.css">
    <title>Halaman Login</title>
</head>
<body background ="img/gambar.jpg">    
   


    <main role="main" class="container mt-5">
        <div class="col-md-7" style="margin: 0 auto">
            <div class="card shadow">
                <div class="card-body">
    <?php if(isset($eror)) : ?>
                <p style="color : red;font-style:italic;">email/password salah</p>

                <?php endif;?>
    
            <form action=""method="POST">
             <ul> 
                                
                 <input class="input100" type="text" name= "username" placeholder="Username/Email" required>
                
                <input class="input100" type="password" name= "password" placeholder="password"required>
                

                <li>
                    <input type="checkbox" name ="remember"id="remember">
                    <label for="remember">Remember Me</label>
                
                </li>
                
                <button class="btn btn-outline-success" type="submit" name="login">login</button>
                
                <p> buat akun?<a href="registrasi.php">klik disini</a></p>
            

        </ul>

            </form>
        </div>
     </div>
</div>
    </main>

</body>
</html>