<?php
include('../core/header.php');
include('../core/checklogin_admin.php');
?>
<hr>
<a href="<?php echo BASEURL; ?>/admin/index_loggedin.php" class="terug-knop">terug</a>
<h3>Users</h3>
<a href="add_user.php">Gebruiker toevoegen</a>
<br>
<br>
<?php
$liqry = $con->prepare("SELECT admin_user_id,email FROM admin_user");
if ($liqry === false) {
    echo mysqli_error($con);
} else {
    $liqry->bind_result($adminId, $email);
    if ($liqry->execute()) {
        $liqry->store_result();
        while ($liqry->fetch()) {
?>
            ID:<?php echo $adminId; ?> -
            E-mail:<?php echo $email; ?> -
            <a href="edit_user.php?uid=<?php echo $adminId; ?>">edit</a>
            <a href="delete_user.php?uid=<?php echo $adminId; ?>">delete</a>
            <br>
<?php
        }
    }
    $liqry->close();
}
?>
<?php
include('../core/footer.php');
?>