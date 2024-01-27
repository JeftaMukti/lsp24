<?php
include "db.php";

$status = "";
if (isset($_POST['new']) && $_POST['new']==1) {
    $nis = $_REQUEST['nis'];
    $name = $_REQUEST['name'];
    $jenis_kelamin = $_REQUEST['jenis_kelamin'];
    $temp_lahir = $_REQUEST['temp_lahir'];
    $tgl_lahir = $_REQUEST['tgl_lahir'];
    $alamat = $_REQUEST['alamat'];
    $asal_sekolah = $_REQUEST['asal_sekolah'];
    $kelas = $_REQUEST['kelas'];
    $jurusan = $_REQUEST['jurusan'];
    $submit = "insert into siswa(`nis`,`name`,`jenis_kelamin`,`temp_lahir`,`tgl_lahir`,`alamat`,
    `asal_sekolah`,`kelas`,`jurusan`)values('$nis','$name','$jenis_kelamin','$temp_lahir','$tgl_lahir','$alamat',
    '$asal_sekolah','$kelas','$jurusan')";
    mysqli_query($conn,$submit) or die(mysqli_error($conn));
    $status = "data submited. </br></br><a href='view.php'>View Inserted Record</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Siswa</title>
</head>
<body>
    <div class="form">
        <p><a href="view.php">View Siswa</a></p>
    </div>
    <h1>Insert Data Siswa</h1>
    <form action="" name="form" method="post">
        <input type="hidden" name="new" value="1"/>
        <p><input type="text" name="nis" placeholder="Insert Nis" required></p>
        <p><input type="text" name="name" placeholder="Insert Name" required></p>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
        <option value="laki">Laki-laki</option>
        <option value="perempuan">Perempuan</option>
        </select>
        <p><input type="text" name="temp_lahir" placeholder="Insert tempat lahir" required></p>
        <p><input type="date" name="tgl_lahir" placeholder="Insert tanggal Lahir" required></p>
        <p><input type="text" name="alamat" placeholder="Insert alamat " required></p>
        <p><input type="text" name="asal_sekolah" placeholder="Insert asal Sekolah " required></p>
        <p><input type="text" name="kelas" placeholder="Insert Kelas" required></p>
        <p><input type="text" name="jurusan" placeholder="Insert jurusan " required></p>
        <p><input type="submit" name="submit" value="Submit"></p>
    </form>
</body>
</html>