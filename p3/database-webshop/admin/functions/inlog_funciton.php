<?php
// include('core/header.php');
// include('/xampp/htdocs/programming/database/p3/database-webshop/database-webshop/core/db_connect.php');
include('http://u533187.gluweb.nl/webshop/core/db_connect.php');
// echo 'hallo';
if (isset($_POST['submit']) && $_POST['submit'] != '') {
    //default user: test@test.nl
    //default password: test123
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    $liqry = $con->prepare("SELECT admin_user_id,email,password FROM admin_user WHERE email = ? LIMIT 1;");
    if ($liqry === false) {
        trigger_error(mysqli_error($con));
    } else {
        $liqry->bind_param('s', $email);
        $liqry->bind_result($adminId, $email, $dbHashPassword);
        if ($liqry->execute()) {
            $liqry->store_result();
            $liqry->fetch();
            if ($liqry->num_rows == '1' && password_verify($password, $dbHashPassword)) {
                $_SESSION['Sadmin_id'] = $adminId;
                $_SESSION['Sadmin_email'] = stripslashes($email);
                echo "Bezig met inloggen... <meta http-equiv=\"refresh\" content=\"1; URL=  ". BASEURL_CMS ." index_loggedin.php\">";
                exit();
            } else {
                echo "ERROR tijdens inloggen";
            }
        }
        $liqry->close();
    }
}
