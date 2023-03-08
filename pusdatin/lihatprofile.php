<?php
include("import.php");
session_start();

if (isset($_SESSION['username'])):
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Profile - Member</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Profile</h3>
                                    </div>
                                    <?php
                                    $usernem = $_SESSION['username'];
                                    $sql = "SELECT * FROM member WHERE Username='$usernem'";
                                    $result = mysqli_query($db, $sql);
                                    ?>
                                    <?php
                                    while ($rows = mysqli_fetch_array($result)) {
                                        ?>
                                        <center style="font-weight: bold; font-size: 15px; margin-top: 3%; color: #268ece">Your
                                            Profile
                                        </center>
                                        <table border="0" align="center" cellpadding="2" cellspacing="0">
                                            <tr>
                                                <td>
                                                    <div align="left">Username&emsp;&ensp;&nbsp;</div>
                                                </td>
                                                <td>
                                                    :
                                                    <?php echo $rows['Username']; ?>
                                                </td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td>
                                                    <div align="left">Name&emsp;&ensp;&nbsp;</div>
                                                </td>
                                                <td>
                                                    :
                                                    <?php echo $rows['NamaMember']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div align="left">Phone Number&emsp;&emsp;&nbsp;</div>
                                                </td>
                                                <td>
                                                    :
                                                    <?php echo $rows['Telp']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div align="left">Email&emsp;&emsp;&ensp;</div>
                                                </td>
                                                <td>
                                                    :
                                                    <?php echo $rows['EmailMember']; ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                    }
                                    ?>
                                    <a class="text-center" href="editprofile.php">
                                        <button type="button" class="btn btn-primary btn-rounded btn-lg mt-3 mb-3">
                                            Edit Profile
                                        </button>
                                    </a>
                                    <div class="text-center small mb-4"><a href="specialMember.php">Dashboard</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>

    </html>
<?php endif ?>