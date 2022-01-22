<?php

// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');
?>
<a href="<?php echo BASEURL; ?>admin/index_loggedin.php" class="terug-knop">terug</a>
<?php
if (isset($_POST['email']) && $_POST['email'] && ($_POST['ww']) && $_POST['ww'] != "") {
    
    $email = $con->real_escape_string($_POST['email']);
    $wactwoord = $con->real_escape_string($_POST['ww']);

    $liqry = $con->prepare("INSERT INTO admin_user (email,password) VALUES ('$email', '$wactwoord')");
    if ($liqry === false) {
        echo mysqli_error($con);
    } else {
        // $liqry->bind_param('s', $email);
        if ($liqry->execute()) {
            echo "admin user met email " . $email . " toegevoegd.";
        }
    }
    $liqry->close();
}
?>
<form action="" method="POST">
    email:<input type="text" name="email" value=""><br>
    wachtwoord:<input type="text" name="ww" value=""><br>
    <input type="submit" name="submit" value="Toevoegen">
</form>

<?php
include('../core/footer.php');
?>