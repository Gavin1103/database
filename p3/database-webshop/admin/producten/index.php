<?php
include('../core/header.php');
include('../core/checklogin_admin.php');
?>
<a href="<?php echo BASEURL; ?>/admin/index_loggedin.php" class="terug-knop">terug</a>
<h3>Producten Overzicht</h3>
<a href="add_products.php">Add product</a>
<br>

<div class="products-wrapper">
                <div class="products-container">
                    <div class="product-block">cat name</div>
                </div>
                <div class="products-container">
                    <div class="product-block">cat ID</div>
                </div>
                <div class="products-container">
                    <div class="product-block">Pro ID</div>
                </div>
                <div class="products-container">
                    <div class="product-block">pro name</div>
                </div>
                <div class="products-container">
                    <div class="product-block">price</div>
                </div>
                <div class="products-container">
                    <div class="product-block">color</div>
                </div>
                <div class="products-container">
                    <div class="product-block">active</div>
                </div>
            </div>
            <br>

<?php
$liqry = $con->prepare("SELECT category.name AS category ,category.category_id ,product.product_id , product.name, product.description AS productdescription , price , color , weight, product.active FROM product INNER JOIN category on product.category_id = category.category_id WHERE product.category_id = category.category_id AND category.active = 1 AND product.active = 1
");
if ($liqry === false) {
    echo mysqli_error($con);
} else {
    $liqry->bind_result($catName, $catID, $proID, $proName, $proDescription, $price, $color, $weight, $active);
    if ($liqry->execute()) {
        $liqry->store_result();
        while ($liqry->fetch()) {
?>

            <div class="products-wrapper">
                <div class="products-container">
                    <div class="product-block"><?php echo $catName ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $catID ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $proID ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $proName ?></div>
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
                <div class="products-container">
                    <div class="product-block"><a href="edit_products.php?ID=<?php echo $proID ?>">edit</a></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><a href="delete_products.php?ID=<?php echo $proID ?>">delete</a></div>
                </div>
                
            </div>




<?php
        }
    }
    $liqry->close();
}
?>
<?php
include('../core/footer.php');
?>