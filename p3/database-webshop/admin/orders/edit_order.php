<?php
include('../core/header.php');
?>
<a href="../../admin/orders/index.php">terug</a>
<?php

$orderID = $_GET['ID'];
$ordersqry = $con->prepare(" SELECT order_id, product_id, first_name, middle_name, last_name, street, house_number, zip_code, city, total_price ,shipping_costs, payment_method, order_date, shipping_date FROM `tbl_order` WHERE order_id = $orderID ");
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
                    <div class="product-block"><?php echo '$', $totalPrice ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo '$', $shippingCost ?></div>
                </div>
                <div class="order-container">
                    <div class="product-block"><?php echo $shippingDate ?></div>
                </div>
            </div>

    <?php
        }
    }
    $ordersqry->close();
}
    ?>

    <br>

    <form method="POST">

        Andere product ID:<input type="text" name="proID" value="<?php echo $productID ?>"><br>
        Andere voornaam:<input type="text" name="firstName" value="<?php echo $firstName ?>"><br>
        Andere tussenvoegsel:<input type="text" name="middleName" value="<?php echo $middleName ?>"><br>
        Andere achternaam:<input type="text" name="lastName" value="<?php echo $lastName ?>"><br>
        Andere straatnaam:<input type="text" name="street" value="<?php echo $street ?>"><br>
        Andere huisnummer:<input type="text" name="houseNumber" value="<?php echo $houseNumber ?>"><br>
        Andere postcode:<input type="text" name="zip_code" value="<?php echo $postCode ?>"><br>
        Andere stad:<input type="text" name="stad" value="<?php echo $city ?>"><br>
        Andere totale prijs:<input type="text" name="totalPrice" value="<?php echo $totalPrice ?>"><br>
        Andere verzending kosten:<input type="text" name="shippingCost" value="<?php echo $shippingCost ?>"><br>
        Andere betaalmethode:<input type="text" name="payment_method" value="<?php echo $paymentMethod ?>"><br>
        <input type="submit">
    </form>

    <?php

    if (
        isset($_POST['proID']) && $_POST['proID'] &&
        ($_POST['firstName']) && $_POST['firstName'] &&
        ($_POST['middleName']) && $_POST['middleName'] &&
        ($_POST['lastName']) && $_POST['lastName'] &&
        ($_POST['street']) && $_POST['street'] &&
        ($_POST['houseNumber']) && $_POST['houseNumber'] &&
        ($_POST['zip_code']) && $_POST['zip_code'] &&
        ($_POST['totalPrice']) && $_POST['totalPrice'] &&
        ($_POST['shippingCost']) && $_POST['shippingCost'] &&
        ($_POST['payment_method']) && $_POST['payment_method'] &&
        ($_POST['stad']) && $_POST['stad']

        != ""
    ) {

        $newproID = $_POST['proID'];
        $newfirstname = $_POST['firstName'];
        $newmiddlename = $_POST['middleName'];
        $newlastname = $_POST['lastName'];
        $newstreet = $_POST['street'];
        $newzipcode = $_POST['zip_code'];
        $newtotalprice = $_POST['totalPrice'];
        $newshippingcost = $_POST['shippingCost'];
        $newpaymentmethod = $_POST['payment_method'];
        $newhousenumber = $_POST['houseNumber'];
        $newcity = $_POST['stad'];



        $editqry = $con->prepare("UPDATE `tbl_order` SET `product_id`='$newproID',`first_name`='$newfirstname',`middle_name`='$newmiddlename',`last_name`='$newlastname',`street`='$newstreet',`house_number`='$newhousenumber',`zip_code`='$newzipcode',`city`='$newcity',`total_price`='$newtotalprice',`shipping_costs`='$newshippingcost',`payment_method`='$newpaymentmethod' WHERE order_id = $orderID");
        if ($editqry === false) {
            echo mysqli_error($con);
        } else {
            // $editqry->bind_result();
            if ($editqry->execute()) {
                $editqry->store_result();
                header("Refresh:0");
                echo "<script type='text/javascript'>alert('order bewerkt');</script>";
            }
        }
        $editqry->close();
    }
    
    ?>





    <?php
    include('../core/footer.php');

    ?>