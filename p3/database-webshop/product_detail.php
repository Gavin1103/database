<?php
include('core/header.php');
// include('');
?>
<main>
    <section class="detail-section">
        <?php

        $productID = $_GET['uid'];

        $productQuery = $con->prepare("SELECT name, description, price, color FROM `product` WHERE active = 1 AND product_id = ?");
        if ($productQuery === false) {
            trigger_error(mysqli_error($con));
        } else {
            $productQuery->bind_param('i', $productID);
            $productQuery->bind_result($productName, $productDescription, $price, $color);
            if ($productQuery->execute()) {
                $productQuery->store_result();
                while ($productQuery->fetch()) {
        ?>


                    <div class="detail-container-left">
                        <img class="detail-img" src="#" alt="">
                        <h3>shipping costs: $20</h3>
                    </div>

                    <div class="detail-container-rechts">

                        <h2><?php echo $productName ?></h2>
                        <h3><?php echo $productDescription ?></h3>
                        <h3><?php echo $color ?></h3>
                        <h3><?php echo '$', $price ?></h3>
                        <a class="bestel-knop" href="<?php echo BASEURL; ?>bestel.php?productID=<?php echo $productID ?>">Bestellen</a>

                    </div>



        <?php
                }
            }
            $productQuery->close();
        }
        ?>
    </section>
</main>
<?php
include('core/footer.php');
?>