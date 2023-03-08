<?php
include("import.php");

session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {
    $valid = TRUE;
    $NamaMember = test_input($_POST["inputNamaMember"]);
    if (empty($NamaMember)) {
        $error_NamaMember = "<b>ERROR !!</b>  Nama tidak boleh kosong!<br>";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $NamaMember)) {
        $error_NamaMember = "<b>ERROR !!</b>  Nama hanya dapat berupa alphabet dan spasi!<br>";
        $valid = FALSE;
    }

    $Username = test_input($_POST["inputUsername"]);
    if (empty($Username)) {
        $error_Username = "<b>ERROR !!</b>  Username tidak boleh kosong!<br>";
        $valid = FALSE;
    }

    $EmailMember = test_input($_POST["inputEmailMember"]);
    if ($EmailMember == "") {
        $error_EmailMember = "<b>ERROR !!</b>  E-mail harus diisi!<br>";
        $valid = FALSE;
    } elseif (!filter_var($EmailMember, FILTER_VALIDATE_EMAIL)) {
        $error_EmailMember = "<b>ERROR !!</b>  Format Email Salah!<br>";
        $valid = FALSE;
    }

    $Telp = test_input($_POST["inputNoTelp"]);
    if (empty($Telp)) {
        $error_Telp = "<b>ERROR !!</b>  No Telp harus diisi!<br>";
        $valid = FALSE;
    } elseif (strlen($Telp) == 12) {
        $error_NoTelp = "<b>ERROR !!</b>  No Telp minimal atau sama dengan 12 karakter!<br>";
        $valid = FALSE;
    } elseif (str_contains($Telp, ' ') == TRUE) {
        $error_Telp = "<b>ERROR !!</b>  No Telp tidak boleh mengandung spasi!<br>";
        $valid = FALSE;
    }

    $Password = test_input($_POST["inputPassword"]);
    if ($Password == "") {
        $error_Password = "<b>ERROR !!</b>  Password harus diisi!<br>";
        $valid = FALSE;
    } elseif (strlen($Password) < 8) {
        $error_Password = "<b>ERROR !!</b>  Panjang password harus lebih dari atau sama dengan 8 karakter!<br>";
        $valid = FALSE;
    } elseif (str_contains($Password, ' ') == TRUE) {
        $error_Password = "<b>ERROR !!</b>  Password tidak boleh mengandung spasi!<br>";
        $valid = FALSE;
    }

    if ($valid) {
        $queryakun = "UPDATE `member` SET NamaMember='" . $NamaMember . "', Telp='" . $Telp . "', EmailMember='" . $EmailMember . "', PasswordMember='" . $Password . "' WHERE Username='" . $Username . "'";
        $result = $db->query($queryakun);

        if (!$result) {
            die("Tidak bisa menyelesaikan query </br>" . $db->error . "</br> Query:" . $query);
        } else {
            $message = "Berhasil Menginput Data!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("location:index.php");
        }
    } else {
        echo "Gagal Menginput Data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit - Member</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Edit Profile</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="inputUsername"
                                                class="col-sm-2 col-form-label"><b>Username</b></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputUsername"
                                                    name="inputUsername" value="<?php if (isset($Username))
                                                        echo $Username ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                    <?php if (isset($error_Username))
                                                        echo $error_Username ?>
                                                    </div>
                                                    <a style="color: black; font-size: 12px;">*Menggunakan username yang lama dan harus sesuai!</a>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNamaMember"
                                                    class="col-sm-2 col-form-label"><b>Name</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputNamaMember"
                                                        name="inputNamaMember" value="<?php if (isset($NamaMember))
                                                        echo $NamaMember ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                    <?php if (isset($error_NamaMember))
                                                        echo $error_NamaMember ?>
                                                    </div>
                                                    <a style="color: black; font-size: 12px;">*Nama hanya boleh mengandung
                                                        alfabet
                                                        dan spasi.<br>*Nama harus nama lengkap!</a>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmailMember"
                                                    class="col-sm-2 col-form-label"><b>Email</b></label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmailMember"
                                                        name="inputEmailMember" value="<?php if (isset($EmailMember))
                                                        echo $EmailMember ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                    <?php if (isset($error_EmailMember))
                                                        echo $error_EmailMember ?>
                                                    </div>
                                                    <a style="color: black; font-size: 12px;">*Email yang digunakan harus
                                                        email pribadi dan dengan format yang benar.</a>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNoTelp" class="col-sm-2 col-form-label"><b>No
                                                        Telp</b></label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputNoTelp"
                                                        name="inputNoTelp" value="<?php if (isset($Telp))
                                                        echo $Telp ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                    <?php if (isset($error_Telp))
                                                        echo $error_Telp ?>
                                                    </div>
                                                    <a style="color: black; font-size: 12px;">*No Telp minimal dan maksimal
                                                        12 digit.</a>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPassword"
                                                    class="col-sm-2 col-form-label"><b>Password</b></label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputPassword"
                                                        name="inputPassword" value="<?php if (isset($Password))
                                                        echo $Password ?>">
                                                    <div class="error" style="color:red; font-size: 12px;">
                                                    <?php if (isset($error_Password))
                                                        echo $error_Password ?>
                                                    </div>
                                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary"><b>Save</b></button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="lihatprofile.php">Back to Profile</a></div>
                                        <div class="small"><a href="specialMember.php">Dashboard</a></div>
                                    </div>
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
                            <div class="text-muted">Copyright &copy; Fudhayl 2022</div>
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
        <script>
            function myFunction() {
                var x = document.getElementById("inputPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>

    </html>