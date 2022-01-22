<?php
include('../core/header.php');
include('../core/checklogin_admin.php');
?>


<h3>Bestellingen</h3>
<a href="<?php echo BASEURL; ?>/admin/index_loggedin.php" class="terug-knop">terug</a>
<div class="products-wrapper">
    <div class="order-container">
        <div class="product-block"> OrderID</div>
    </div>
    <div class="order-container">
        <div class="product-block"> productID</div>
    </div>
    <div class="order-container">
        <div class="product-block"> firstName</div>
    </div>
    <div class="order-container">
        <div class="product-block"> middleName</div>
    </div>
    <div class="order-container">
        <div class="product-block"> lastName</div>
    </div>
    <div class="order-container">
        <div class="product-block"> street</div>
    </div>
    <div class="order-container">
        <div class="product-block"> houseNumber</div>
    </div>
    <div class="order-container">
        <div class="product-block"> postCode</div>
    </div>
    <div class="order-container">
        <div class="product-block"> city</div>
    </div>
    <div class="order-container">
        <div class="product-block"> totalPrice</div>
    </div>
    <div class="order-container">
        <div class="product-block"> shippingCost</div>
    </div>
    <div class="order-container">
        <div class="product-block"> shippingDate</div>
    </div>
</div>
<br>

<?php
$ordersqry = $con->prepare(" SELECT order_id, product_id, first_name, middle_name, last_name, street, house_number, zip_code, city, total_price ,shipping_costs, payment_method, order_date, shipping_date FROM `tbl_order` ");
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
                <div class="order-container">
                    <div class="product-block"><a href="edit_order.php?ID=<?php echo $orderID ?>">edit</a></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><a href="delete_order.php?ID=<?php echo $orderID ?>">delete</a></div>
                </div>
            </div>
            <br>
<?php
        }
    }
    $ordersqry->close();
}
?>


<?php
include('../core/footer.php');
?>