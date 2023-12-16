<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Beasiswa</title>
    <!-- bootstrap import -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- container navbar start -->
    <div class="container pt-2">
        <!-- navbar start -->
        <nav class="nav nav-pills nav-fill rounded shadow fw-semibold">
            <a class="nav-link text-dark" aria-current="page" href="index.php">Jenis Beasiswa</a>
            <a class="nav-link active bg-info" href="pendaftaran.php">Pendaftaran Beasiswa</a>
            <a class="nav-link text-dark" href="hasil.php">Hasil</a>
            <a class="nav-link text-dark" href="tabel_pendaftaran.php">Tabel Pendaftaran</a>
        </nav>
        <!-- navbar end -->
    </div>
    <!-- container navbar end -->

    <!-- container form start -->
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mt-5 px-3 mb-5" style="width: 50%;">
                <!-- title form -->
                <h4 class="text-center mt-3" style="font-weight:medium">REGISTRASI BEASISWA</h4>
                <!-- alert  -->
                <?php
                if (isset($_SESSION['message'])) {
                    if ($_SESSION['message'][1] == 'sukses') {
                ?>
                <!-- allert sukses pendaftaran -->
                        <div class="alert alert-success mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                    <?php
                    } else {
                    ?>
                    <!-- alert peringatan -->
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $_SESSION['message'][0]; ?>
                            <?php unset($_SESSION['message']); ?>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="card-body">
                    <!-- form start dengan method post -->
                    <form action="proses_pendaftaran.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama<span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Alamat<span class="text-danger">*</span></label>
                            <input type="text" name="alamat" id="alamat" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Handphone<span class="text-danger">*</span></label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester<span class="text-danger">*</span></label>
                            <select class="form-select" name="semester">
                                <option value="" disabled selected>-- Pilih Semester saat ini --</option>
                                <!-- perulangan untuk pemilihan semester  -->
                                <?php
                                for ($i = 1; $i < 9; $i++) {
                                ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ipk" class="form-label">IPK Terakhir<span class="text-danger">*</span></label>
                            <div class="d-flex justify-content-between">
                                <input type="text" readonly name="ipk" id="ipk" class="form-control">
                                <a class="btn btn-primary btn-sm" href="#" onclick="generateipk()">IPK</a>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="beasiswa" class="form-label">Pilihan Beasiswa<span class="text-danger">*</span></label>
                            <select name="beasiswa" class="form-select" id="beasiswa" disabled=false>
                                <option readonly selected>-- Pilih Beasiswa --</option>
                                <option value="akademik">Akademik</option>
                                <option value="non">Non Akademik</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="berkas" class="form-label">Upload Berkas Syarat<span class="text-danger">*</span></label>
                            <input type="file" name="berkas" id="berkas" class="form-control" disabled=false>
                        </div>
                        <div class="mt-4 mb-2 d-flex justify-content-end">
                            <button class="btn btn-primary mx-2" id="daftar" name="daftar" disabled='false'>Daftar</button>
                            <a href="#" class="btn btn-outline-secondary" id="cancel" disabled='false'>Cancel</a>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
            </div>
        </div>
    </div>
    <!-- container form end -->

    <!-- boostrap import -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- script for generate ipk -->
    <script>
        function generateipk() {
            const max = 3
            const min = 1
            const ipk = Math.random().toFixed(1) * max - min + 2;
            document.getElementById('ipk').value = ipk;
            if (ipk >= 3.0) {
                document.getElementById('beasiswa').disabled = false;
                document.getElementById('berkas').disabled = false;
                document.getElementById('daftar').disabled = false;
            } else {
                document.getElementById('beasiswa').disabled = true;
                document.getElementById('berkas').disabled = true;
                document.getElementById('daftar').disabled = true;
            }
        }
    </script>
</body>

</html>