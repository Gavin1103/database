<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login_page.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="../index.php">Terug</a></li>
            </ul>
        </nav>
        <?php
        include('../admin/functions/inlog_funciton.php')
        ?>
        <main>
            <div class="titel-container">
                <h2>Inloggen</h2>
            </div>
            <div class="form-container">
                <form action="index.php" method="post">
                    <input type="email" name="email" id="" placeholder="Email">
                    <input type="password" name="password" id="" placeholder="Password">
                    <input type="submit" name="submit" value="Login">
                    <a href="forgot_password.php">Forgot Password?</a>
                </form>
            </div>
        </main>
    </div>
</body>

</html>