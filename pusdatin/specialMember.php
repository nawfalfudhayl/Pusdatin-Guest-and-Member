<?php
error_reporting(0);
include("./lib/connect.php");

session_start();
?>

<!DOCTYPE html>
<html lang="en">

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

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="./index.php">Pusdatin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-6 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./lihatprofile.php">Lihat Profile</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ms-auto ms-md-2 me-3 me-lg-4">
                    <div class="sb-sidenav-menu-heading mt-4 mb-2">
                        <div class="nav">
                            <form class="example" action="/pusdatin/specialMember.php"
                                style="margin:auto;max-width:300px">
                                <div class="sb-sidenav-menu-subheading mb-2">Judul</div>
                                <input type="text" placeholder="Cari buku.." name="judul"
                                    style="height: 35px; width: 180px">
                                <div class="sb-sidenav-menu-subheading mt-4 mb-2">Kategori</div>
                                <input type="text" placeholder="Kategori.." name="kategori"
                                    style="height: 35px; width: 180px">
                                <div class="sb-sidenav-menu-subheading mt-4 mb-2">Pengarang</div>
                                <input type="text" placeholder="Cari penulis.." name="pengarang"
                                    style="height: 35px; width: 180px">
                                <button type="submit" class="btn btn-secondary mt-4 mb-2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"><b>Logged in as</b> :</div>
                    <?php
                    echo $_SESSION['username'];
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4 text-warning">Special Member</h2>
                    <br>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="container" align="center">
                                <?php
                                $query = "SELECT * FROM book WHERE 1=1 AND JenisDok='SpecialMember'";
                                $judul = $_GET['judul'];
                                if ($judul) {
                                    $query .= " AND Judul like '%" . $judul . "%'";
                                } else {
                                    $query .= ' AND 1=1';
                                }
                                $kategori = $_GET['kategori'];
                                if ($kategori) {
                                    $query .= " AND Kategori like '%" . $kategori . "%'";
                                } else {
                                    $query .= ' AND 1=1';
                                }
                                $pengarang = $_GET['pengarang'];
                                if ($pengarang) {
                                    $query .= " AND Pengarang like '%" . $pengarang . "%'";
                                } else {
                                    $query .= ' AND 1=1';
                                }
                                $result = $db->query($query);
                                $kolom = 3;
                                $i = 1;
                                $query = mysqli_query($db, $query);
                                while ($data = mysqli_fetch_array($query)) {
                                    if (($i) % $kolom == 1) {
                                        echo '<div class="row">';
                                    }
                                    echo '<div class="col-sm-4"><img class="img-thumbnail" src="assets/img/' . $data['Gambar'] . '" width="60%" /><br><b>' . $data['Judul'] . '</b><br><p>' . $data['Pengarang'] . '</p></div>';
                                    if (($i) % $kolom == 0) {
                                        echo '</div>';
                                    }
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>