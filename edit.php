<?php
include "db.php";

$id = $_REQUEST['id'];
$query = "SELECT * FROM siswa WHERE id='".$id."';";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
</head>
<body>
    <div class="form">
        <p><a href="view.php">View Siswa</a></p>
    </div>
    <h1>Update Data Siswa</h1>
    <?php
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

        $update = "UPDATE siswa SET nis=?, name=?, jenis_kelamin=?, temp_lahir=?, tgl_lahir=?, alamat=?, asal_sekolah=?, kelas=?, jurusan=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $update);
        mysqli_stmt_bind_param($stmt, 'sssssssssi', $nis, $name, $jenis_kelamin, $temp_lahir, $tgl_lahir, $alamat, $asal_sekolah, $kelas, $jurusan, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    ?>
    <form action="" name="form" method="post">
        <input type="hidden" name="new" value="1"/>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p><input type="text" name="nis" placeholder="Insert Nis" required value="<?php echo $row['nis']; ?>"></p>
        <p><input type="text" name="name" placeholder="Insert Name" required value="<?php echo $row['name']; ?>"></p>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
        <option value="laki" <?php if($row['jenis_kelamin'] == 'laki') echo 'selected'; ?>>Laki-laki</option>
        <option value="perempuan" <?php if($row['jenis_kelamin'] == 'perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>
        <p><input type="text" name="temp_lahir" placeholder="Insert tempat lahir" required value="<?php echo $row['temp_lahir']; ?>"></p>
        <p><input type="date" name="tgl_lahir" placeholder="Insert tanggal Lahir" required value="<?php echo $row['tgl_lahir']; ?>"></p>
        <p><input type="text" name="alamat" placeholder="Insert alamat " required value="<?php echo $row['alamat']; ?>"></p>
        <p><input type="text" name="asal_sekolah" placeholder="Insert asal Sekolah " required value="<?php echo $row['asal_sekolah']; ?>"></p>
        <p><input type="text" name="kelas" placeholder="Insert Kelas" required value="<?php echo $row['kelas']; ?>"></p>
        <p><input type="text" name="jurusan" placeholder="Insert jurusan " required value="<?php echo $row['jurusan']; ?>"></p>
        <p><input type="submit" name="submit" value="update"></p>
    </form>
</body>
</html>