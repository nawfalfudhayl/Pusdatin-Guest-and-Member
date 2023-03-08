<?php
if (isset($_GET['ID'])) {
    $ProductID = $_GET['ID'];
} else {
    die("Error. No ID Selected!");
}
include("./lib/connect.php");
$query = mysqli_query($db, "SELECT * FROM book WHERE ID='$ProductID'");
$data = mysqli_fetch_array($query);
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<head>
    <title>Detail</title>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="./index.php" style="color: #268ece">Pusdatin</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-6 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="login.php">Login</a></li>
                    <li><a class="dropdown-item" href="register.php">Register</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-5">Detail Data Buku</h2>
            <p><i>Note: Dibawah ini adalah detail informasi Buku berdasarkan ID</i> <b>
                    <?php echo $ProductID ?>
                </b></p>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="container">
                        <table class="mt-4" border="0" cellpadding="4">
                            <?php echo '<div class="col-sm-4 mt-4"><img class="img-thumbnail" src="assets/img/' . $data['Gambar'] . '"width="60%"/></div>';
                            ?>
                            </td>
                            <tr>
                                <td size="90">Judul</td>
                                <td>:
                                    <?php echo $data['Judul'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Dokumen</td>
                                <td>:
                                    <?php echo $data['JenisDok'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>ISBN</td>
                                <td>:
                                    <?php echo $data['ISBN'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td>:
                                    <?php echo $data['Pengarang'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td>:
                                    <?php echo $data['TahunTerbit'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>:
                                    <?php echo $data['Penerbit'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:
                                    <?php echo $data['Kategori'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Sinopsis</td>
                                <td>:
                                    <?php echo $data['Sinopsis'] ?>
                                </td>
                            </tr>
                            <tr height="40">
                                <td></td>
                                <td> <a href="./">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a class="btn btn-primary" href="../assets/pdf/<?php echo $data['PDF']; ?>" target='_new'
                    download="<?php echo $data['PDF']; ?>">Download Buku</a>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Fudhayl 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</body>


</html>