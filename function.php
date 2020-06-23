<?php

    $conn = mysqli_connect("localhost","root","","bioskop");

    function query($query){

        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;

        }
        return $rows;

    }


    function tambah($data){

        global $conn;
        
            $film = htmlspecialchars($data["kode_film"] );
            $jadwal = htmlspecialchars($data["kode_jadwal"] );
            $judul = htmlspecialchars($data["judul"] );
            $jam = htmlspecialchars($data["jam"] );
            $tanggal = htmlspecialchars($data["tanggal"] );


            $query = "INSERT INTO film VALUES('','$film','$jadwal','$judul','$jam','$tanggal')";
    
            //query database
            mysqli_query($conn,$query);

            return mysqli_affected_rows($conn);
    
        
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM film WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $id =$data["id"];
        $film = htmlspecialchars($data["kode_film"] );
        $jadwal = htmlspecialchars($data["kode_jadwal"] );
        $judul = htmlspecialchars($data["judul"] );
        $jam = htmlspecialchars($data["jam"] );
        $tanggal = htmlspecialchars($data["tanggal"] );


        $query = "UPDATE film SET 
            kode_film ='$film',

            kode_jadwal ='$jadwal',

            judul ='$judul',

             jam = '$jam',

            tanggal = '$tanggal'

            WHERE id = $id 
            ";

        //query database
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function registrasi($data){
        global $conn;

        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);


        //cek konfirmasi password

        if($password!=$password2){

            echo " <script>
                    alert('konfimasi password salah') ;
            </script>";
            return false;
        }

        //username

        $result = mysqli_query($conn,"SELECT username FROM admin  WHERE username ='$username'");
        
        if(mysqli_fetch_assoc($result) ){
            echo"<script>
                alert('Username Sudah Ada') ;
                 </script>";

                 return false;

        }

            

        

        //enkripsi password
        $password =password_hash($password, PASSWORD_DEFAULT);


         //tambah data ke database
         mysqli_query($conn," INSERT INTO admin VALUES('','$username','$password') ");

         return mysqli_affected_rows($conn);





    }


?>

