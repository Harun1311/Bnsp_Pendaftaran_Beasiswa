<?php

include('config.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Beasiswa</title>
    <!-- import bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- container navbar start -->
    <div class="container pt-2">
        <!-- navbar start -->
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link text-dark" aria-current="page" href="index.php">Jenis Beasiswa</a>
            <a class="nav-link text-dark" href="pendaftaran.php">Pendaftaran Beasiswa</a>
            <a class="nav-link text-dark" href="hasil.php">Hasil</a>
            <a class="nav-link active bg-info" href="status_pendaftaran.php">Tabel Pendaftaran</a>
        </nav>
        <!-- navbar end -->
    </div>
    <!-- container navbar end -->

    <!-- container tabel pendaftaran -->
    <div class="container">
        <!-- card start -->
        <div class="card mt-5">
            <!-- title tabel pendaftaran -->
            <h4 class="text-center mt-4">Tabel Pendaftaran Beasiswa Mahasiwa</h4>
            <div class="card-body">
                <?php
                // pengecekan untuk mencetak sesuai dengan status verifikasi
                if (isset($_SESSION['result'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['result']; ?>
                        <?php unset($_SESSION['result']); ?>
                    </div>
                <?php
                }
                ?>
                <!-- table start -->
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nomor Handphone</th>
                            <th>Semester</th>
                            <th>IPK</th>
                            <th>Jenis Beasiswa</th>
                            <th>Status</th>
                            <th>Berkas</th>
                            <th>Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // mengkoneksi ke database dan mengambil data dari tabel mahasiswa
                        $query = mysqli_query($conn, 'SELECT * FROM mahasiswa');
                        $i = 1;
                        $status = '';
                        
                        // $count = mysqli_num_rows($query);
                        while ($user = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $user['name'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['alamat'] . "</td>";
                            echo "<td>" . $user['phone_number'] . " </td>";
                            echo "<td>" . $user['semester'] . " </td>";
                            echo "<td>" . $user['ipk'] . " </td>";
                            echo "<td>" . $user['beasiswa'] . " </td>";
                            echo "<td>". $user['status'] . "</td>";
                            // button untuk melihat dan download berkas
                            echo "<td>" . "<a href='assets/file/$user[berkas]' class='btn btn-sm btn-primary'>Berkas</a>" . "</td>";
                            // pengecekan untuk memanipulasi button
                            if($user['status'] == "Verifikasi") {
                                echo "<td>" . "<a href='verifikasi.php?id=$user[id]' class='btn btn-danger btn-sm'>Batalkan</a>"  . "</td>";
                            } else {
                                echo "<td>" . "<a href='verifikasi.php?id=$user[id]' class='btn btn-primary btn-sm'>Verifikasi</a>"  . "</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- table end-->
            </div>
        </div>
        <!-- card end -->
    </div>

    <!-- import js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>