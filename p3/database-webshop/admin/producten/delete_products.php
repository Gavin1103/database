<?php

include('../core/header.php');

?>
<a href="../../admin/producten/index.php">terug</a>


<?php

$productID = $_GET['ID'];

$deleteqry = $con->prepare("SELECT product_id , name , description , category_id,price,color,weight ,active FROM `product` WHERE active = 1 AND product_id = $productID");
if ($deleteqry === false) {
    echo mysqli_error($con);
} else {
    $deleteqry->bind_result($proID, $proName, $proDescription, $catID, $price, $color, $weight, $active);
    if ($deleteqry->execute()) {
        $deleteqry->store_result();
        while ($deleteqry->fetch()) {
?>

            <div class="products-wrapper">
                <div class="products-container">
                    <div class="product-block"><?php echo $proID ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $proName ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $proDescription ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $price ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $color ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $weight ?></div>
                </div>


            </div>
<?php
        }
    }
    $deleteqry->close();
}
?>
<h3>Weet u zeker dat u dit product wilt verwijderen?</h3>

<a class="verwijderen" href="<?php echo BASEURL?>/admin/producten/deleted_product.php?ID=<?php echo $productID ?>">verwijderen</a>


<?php

include('../core/footer.php');

?>