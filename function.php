<?php
$db = mysqli_connect("localhost", "root", "", "farhan_ade_beljar_php");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO mahasiswa VALUES 
            ('', '$nama', '$npm', '$jurusan', '$email', '$gambar')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    //cek yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }

    //cek jika ukuran gambarnya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    //jika lolos pengecekan gambar sip di upload
    //generate nama file gambar baru ketika di upload
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namafileBaru);
    return $namafileBaru;
}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}


function ubah($data)
{
    global $db;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE mahasiswa SET 
            nama = '$nama',
            npm = '$npm',
            jurusan = '$jurusan',
            email = '$email',
            gambar = '$gambar'
            WHERE id = $id
            ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa 
                WHERE 
                nama LIKE '%$keyword%' OR
                npm LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                email LIKE '%$keyword%' 
            ";
    return query($query);
}