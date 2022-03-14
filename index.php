<?php
// Koneksi ke database
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

?>



<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Data Mahasiswa</title>

     <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

  <style>

      table {
        border-collapse: collapse;
        font: normal normal 12px Verdana, Arial, Sans-Serif;
        color: #ffffff;
      }

      /* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
      table th {
        background: #ff0000;
        color: #ffffff;
        font-weight: bold;
        font-size: 14px;
      }

      /* Mengatur border dan jarak/ruang pada kolom */
      table th,
      table td {
        vertical-align: center;
        padding: 10px 20px;
        border: 1px solid #0202020c;
      }

      /* Mengatur warna baris */
      table tr {
        background: #686868;
      }

      /* Mengatur warna baris genap (akan menghasilkan warna selang seling pada baris tabel) */
      table tr:nth-child(even) {
        background: #c5c5c5;
      }

      * {
        margin: 0;
      }

      .header {
        width: 100%;
        height: 100px;
        background-color: #e40d0d65;
      }

      .header h1 {
        padding-top: 15px;
        padding-bottom: 0px;
        text-align: left;
        font-size: 50px;
        color: rgb(252, 252, 252);
        font-family: fantasy;
        
      }

      .footer {
                width: 100%;
                height: 50px;
                padding-left: 0px;
                padding-right: 0px;
                line-height: 50px;
                background-color: #e40d0d65;
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
        background: #3f729b;
      }

  </style>


<body background="ff.jpg">
  
     <div class="header">
     <marquee direction="right"><h1>Daftar Mahasiswa</h1></marquee> 
               <div style="float:LEFT">
                    <a class="akun" href="tambah.php"><button style="background-color:red; border-color:blue; color:white">TAMBAH DATA</button> </a>
               </div>
     </div>

          <br><br><br>
          


          <table style="margin-left:auto;margin-right:auto" border="1" cellpadding="10" cellspacing="0">
               <tr>
                    <th>No.</th>
                    <th>Aksi</th>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Jurusan</th>
                    <th>Email</th>
               </tr>

               <?php $i = 1; ?>
               <?php foreach ($mahasiswa as $row) : ?>
               <tr>

                    <td> <?= $i; ?> </td>

                    <td>
                         <a href="ubah.php?id=<?php echo $row["id"]; ?>">
                              <button> ubah </button> </a>
                         <a href="hapus.php?id=<?php echo $row["id"] ?>"
                              onclick="return confirm('Yakin Ingin       Menghapus Data');  ">
                              <button> hapus </button></a>
                    </td>
                    <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
                    <td><?php echo $row["nama"] ?></td>
                    <td><?php echo $row["npm"] ?></td>
                    <td><?php echo $row["jurusan"] ?></td>
                    <td><?php echo $row["email"] ?></td>
               </tr>
               <?php $i++; ?>
               <?php endforeach; ?>

          </table>

          <Copyright class="footer">
          <h10 style="color:white;">Copyright Farhanadeata
               <div style="float:left">&copy; <?php echo date("Y"); ?> </div> <h10>
              
               <div style="float:right">
                    <a href="https://www.instagram.com/farhanadeata/"><button type="button"
                              class="social-media-button icon instagram">my instagram</button> </a>
               </div>


          </div>

</body>

</html>