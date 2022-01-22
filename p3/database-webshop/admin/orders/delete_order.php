<?php

include('../core/header.php');

?>
<a href="../../admin/orders/index.php">terug</a>


<?php

$orderID = $_GET['ID'];

$ordersqry = $con->prepare(" SELECT order_id, product_id, first_name, middle_name, last_name, street, house_number, zip_code, city, total_price ,shipping_costs, payment_method, order_date, shipping_date FROM `tbl_order` WHERE order_id = $orderID");
if ($ordersqry === false) {
    echo mysqli_error($con);
} else {
    $ordersqry->bind_result($orderID, $productID, $firstName, $middleName, $lastName, $street, $houseNumber, $postCode, $city, $totalPrice, $shippingCost, $paymentMethod, $date, $shippingDate);
    if ($ordersqry->execute()) {
        $ordersqry->store_result();
        while ($ordersqry->fetch()) {
?>

            <div class="products-wrapper">
                <div class="order-container">
                    <div class="product-block"><?php echo $orderID ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $productID ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $firstName ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $middleName ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $lastName ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $street ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $houseNumber ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $postCode ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $city ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo '$',$totalPrice ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo '$',$shippingCost ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $shippingDate ?></div>
                </div>
               
            </div>
            <br>
<?php
        }
    }
    $ordersqry->close();
}
?>


<h3>Weet u zeker dat u deze bestelling wilt verwijderen?</h3>

<a class="verwijderen" href="<?php echo BASEURL?>/admin/orders/deleted_order.php?ID=<?php echo $orderID ?>">verwijderen</a>

<?php

include('../core/footer.php');

?>