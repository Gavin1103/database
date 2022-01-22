<?php
include('core/header.php');
// include('');

?>

<main>
    <div class="titel-container">
        <h1>Bestellen</h1>
    </div>
    <div id="melding">
        
    </div>
    <section class="bestel-section">

        <div class="product-overzicht">
            <div class="product-info">
                <?php

                $productID = $_GET['productID'];

                $productQuery = $con->prepare("SELECT name, price FROM `product` WHERE active = 1 AND product_id = ?");
                if ($productQuery === false) {
                    trigger_error(mysqli_error($con));
                } else {
                    $productQuery->bind_param('i', $productID);
                    $productQuery->bind_result($productName, $price);
                    if ($productQuery->execute()) {
                        $productQuery->store_result();
                        while ($productQuery->fetch()) {
                ?>
                            <img class="bestel-img" src="#" alt="">
                            <h3><?php echo $productName ?></h3>
                            <p><?php echo '$', $price ?></p>
                            <p>shipping costs: $20</p>
                <?php
                        }
                    }
                    $productQuery->close();
                }
                ?>
            </div>
        </div>

        <div class="form-container">
            <form id="form" action="#" method="POST">
                <input id="voornaam" type="text" name="first_name" placeholder="voornaam*">
                <input id="tussenvoegsel" type="text" name="middle_name" placeholder="tussenvoegsel">
                <input id="achternaam" type="text" name="last_name" placeholder="achternaam*">
                <input id="huisnummer" type="text" name="house_number" placeholder="huisnummer*">
                <input id="postcode" type="text" name="zip_code" placeholder="postcode*">
                <input id="straat" type="text" name="street" placeholder="straat*">
                <input id="stad" type="text" name="city" placeholder="stad*">
                <input id="btlmethode" type="text" name="payment_method" placeholder="betaalmethode*">
                <input id="bestel-knop" type="submit" name="bestellen">
            </form>
        </div>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $voornaam = $_POST['first_name'];
            $tussenvoegsel = $_POST['middle_name'];
            $achternaam = $_POST['last_name'];
            $huisnummer = $_POST['house_number'];
            $postcode = $_POST['zip_code'];
            $straat = $_POST['street'];
            $stad = $_POST['city'];
            $betaalmethode = $_POST['payment_method'];
            $bestel_knop = $_POST['bestellen'];
        }

        if (
            isset($voornaam) && $voornaam
            && ($achternaam) && $achternaam
            && ($huisnummer) && $huisnummer
            && ($postcode) && $postcode
            && ($straat) && $straat
            && ($stad) && $stad
            && ($betaalmethode) && $betaalmethode != ""
        ) {

            // $voornaam = $con->real_escape_string($_POST['first_name']);

            $bestelsql = "INSERT INTO tbl_order(order_id, product_id, first_name, middle_name, last_name, street, house_number, house_number_addon, zip_code, city, total_price, shipping_costs, payment_method, order_date, shipping_date) VALUES ('','$productID', '$voornaam', '$tussenvoegsel', '$achternaam', '$straat', '$huisnummer', '', '$postcode', '$stad', '$price' + 20, 20, '$betaalmethode', NOW(), '')";
            $bestelqry = $con->prepare($bestelsql);
            if ($bestelqry === false) {
                echo mysqli_error($con);
            } else {
                // $liqry->bind_param('s',$voornaam);
                if ($bestelqry->execute()) {
                    $bestelqry->store_result();
                    while ($bestelqry->fetch()) {
        ?>



        <?php
                    }
                }
                $bestelqry->close();
            }
        }
        ?>


    </section>

</main>
<?php
include('core/footer.php');
?>