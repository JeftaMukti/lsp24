<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PPDB</title>
</head>
<body>
    <div class="form">
        <p><a href="create.php">Create Siswa</a></p>
        <h1>Record Siswa PPDB</h1>
        <table width="50%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th>no</th>
                    <th>nis</th>
                    <th>name</th>
                    <th>jenis kelamin</th>
                    <th>tempat lahir</th>
                    <th>tanggal lahir</th>
                    <th>alamat</th>
                    <th>asal sekolah</th>
                    <th>kelas</th>
                    <th>jurusan</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $count = 1;
                    $sel_query = "SELECT * FROM siswa ORDER BY id DESC;";
                    $result = mysqli_query($conn, $sel_query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td align='center'>" . $count . "</td>";
                        echo "<td align='center'>" . $row['nis'] . "</td>";
                        echo "<td align='center'>" . $row['name'] . "</td>";
                        echo "<td align='center'>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td align='center'>" . $row['temp_lahir'] . "</td>";
                        echo "<td align='center'>" . $row['tgl_lahir'] . "</td>";
                        echo "<td align='center'>" . $row['alamat'] . "</td>";
                        echo "<td align='center'>" . $row['asal_sekolah'] . "</td>";
                        echo "<td align='center'>" . $row['kelas'] . "</td>";
                        echo "<td align='center'>" . $row['jurusan'] . "</td>";
                        echo "<td align='center'><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                        echo "<td align='center'><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";

                        $count++;
                    }
                ?>
            </tbody>
        </table>
    </div>    
</body>
</html>