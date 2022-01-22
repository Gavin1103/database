<?php
// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');

?>
<a href="<?php echo BASEURL; ?>admin/index_loggedin.php" class="terug-knop">terug</a>
<h1>dit is edit user</h1>
<hr>


<?php

$userID = $_GET['uid'];

$editqry = $con->prepare(" SELECT admin_user_id, email FROM `admin_user` WHERE admin_user_id = $userID  ");
if ($editqry === false) {
    echo mysqli_error($con);
} else {
    $editqry->bind_result($adminID, $email);
    if ($editqry->execute()) {
        $editqry->store_result();
        while ($editqry->fetch()) {
?>
            <h3>U bewerkt <?php echo $email ?></h3>


<?php
        }
    }
    $editqry->close();
}
?>
<br>

<form action="" method="POST">
    Nieuw E-mail:<input type="text" name="nieuw_email" id="" value="">
    <br>

    <input type="submit" name="editen" value="Verstuur">
</form>

<?php

if (isset($_POST['nieuw_email']) && $_POST['nieuw_email'] != "") {

    $nieuw_email = $_POST['nieuw_email'];

    $updateqry = $con->prepare(" UPDATE `admin_user` SET email = '$nieuw_email' WHERE admin_user_id = $userID");
    if ($updateqry === false) {
        echo mysqli_error($con);
    } else {
        // $updateqry->bind_result($adminID, $email);
        if ($updateqry->execute()) {
            $updateqry->store_result();
            echo "Gebruiker bewerkt";
        }
    }
    $updateqry->close();
}


?>


<?php
include('../core/footer.php');
?>