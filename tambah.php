<?php

require 'function.php';
$mahasiswa = query("SELECT * FROM Mahasiswa");


//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {
    //cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'tambah.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tambah Data Mahasiswa</title>
</head>

<style>
     legend {
          color: white;
          padding: 5px;
          background: red;
          border-radius: 5px;
     }

     fieldset {
          max-width: 400px;
          border-radius: 10px;
          border-color: blue;
          background: gray;
     }

     label {
          float: left;
          color: blue;
     }

     input {
          border: none;
          border-radius: 10px;
          height: 30px;
     }

     button {
          background: Red;

     }


     .footer {
          width: 100%;
          height: 50px;
          padding-left: 0px;
          padding-right: 0px;
          line-height: 50px;
          background-color: #3f729b;
          position: absolute;
          bottom: 0px;
          right: 0px;
     }

     .social-media-button {
          border: none;
          color: #FFFFFF;
          /* WHITE */
          font-size: 16px;
          padding: 0.5em 1em;
     }

     .social-media-button:hover {
          opacity: 0.9;
     }

     .social-media-button.icon:before {
          font-family: "FontAwesome";
          padding-right: 0.5em;
     }

     .social-media-button.icon.instagram:before {
          content: "\f16d";
     }

     .social-media-button.instagram {
          background: red;
     }
</style>

<body background="hsfs.jpg">

<br><br>

     <div align="center">
          <form action="" method="POST">
               <fieldset>
                    <legend>Tambah Data Mahasiswa</legend>
                    <form action="" method="POST" enctype="multipart/form-data">
                    <ul>
                         <p>
                              <label for="nama" style="margin-right: 25px;">
                                   NAMA : </label>
                              <input type="text" name="nama" id="nama" required>
                         </p>
                         <p>
                              <label for="npm" style="margin-right: 39px;">
                                   NPM : </label>
                              <input type="text" name="npm" id="npm" required>
                         </p>
                         <p>
                              <label for="jurusan" style="margin-right: 1px;">
                                   JURUSAN : </label>
                              <input type="text" name="jurusan" id="jurusan" required>
                         </p>
                         <p>
                              <label for="email" style="margin-right: 25px;">
                                   EMAIL : </label>
                              <input type="text" name="email" id="email" required>
                         </p>
                         <p>
                              <label for="gambar" style="margin-right: 23px;">
                                   PHOTO : </label>
                              <input type="file" name="gambar" id="gambar" required>
                              
                         </p>
                         <p>
                              <button type="submit" name="submit">Tambah Data</button>
                         </p>
                    </ul>
               </fieldset>
          </form>
     </div>

     </div>
     <div class="footer">
          <h10 style="color:white;"> Copyright Farhanadeata
          <div style="float:left">&copy; <?php echo date("Y"); ?> </div> </h10>
          <div style="float:right">
               <a href="https://www.instagram.com/farhanadeata/"><button type="button"
                         class="social-media-button icon instagram">my instagram</button> </a>
          </div>

</body>