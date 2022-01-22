<?php
include('../core/header.php');
?>

<?php
if (isset($_GET['ID']) && $_GET['ID'] != "") {

    $orderID = $_GET['ID'];

    $deleteqry = $con->prepare("DELETE FROM `tbl_order` WHERE order_id = '$orderID' LIMIT 1;");
    if ($deleteqry === false) {
        echo mysqli_error($con);
    } else {
        if ($deleteqry->execute()) {
            $deleteqry->store_result();
            echo 'bestelling verwijderd';
            }
        }
        $deleteqry->close();
    }
?>
<br>
<a href="index.php">Klaar</a>
<?php

include('../core/footer.php');

?>