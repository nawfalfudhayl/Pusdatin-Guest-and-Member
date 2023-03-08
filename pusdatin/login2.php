<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/other.css">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="login-check.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" id="email">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="input-group">
                <button name="login" type="submit" value="Log in" class="btn login">Login</button>
            </div>
        </form>
        <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
            echo '<span style="color: #FF0000; justify-content: center;">Email / Password anda salah!</span>';
        }
        ?>
    </div>
</body>

</html>