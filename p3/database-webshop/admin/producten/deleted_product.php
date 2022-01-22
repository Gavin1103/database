<?php
include('../core/header.php');
?>

<?php
if (isset($_GET['ID']) && $_GET['ID'] != "") {

    $productID = $_GET['ID'];

    $deleteqry = $con->prepare("DELETE FROM `product` WHERE product_id = '$productID'");
    if ($deleteqry === false) {
        echo mysqli_error($con);
    } else {
        if ($deleteqry->execute()) {
            $deleteqry->store_result();
            echo 'product verwijderd';
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