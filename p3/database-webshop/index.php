<?php
include('core/header.php');
// include('');

?>
<main>
    <!-- alles voor de Koop nu gedeelte -->
    <section class="section-random">
        <div class="titel-container">
            <h2>Koop nu!</h2>
        </div>
        <div class="wrapper-random">
            <?php
            $liqry = $con->prepare("SELECT product_id ,category.name AS category , product.name, product.description AS productdescription FROM product INNER JOIN category on product.category_id = category.category_id WHERE product.category_id = category.category_id AND category.active = 1 AND product.active = 1 ORDER BY RAND() LIMIT 3");
            if ($liqry === false) {
                trigger_error(mysqli_error($con));
            } else {
                // $liqry->bind_param('s', $categoryName, $categoryDescription);
                $liqry->bind_result($productID, $categoryName, $productName, $productDescription);
                if ($liqry->execute()) {
                    $liqry->store_result();
                    while ($liqry->fetch()) {
            ?>
                        <a class="random-products-a" href="<?php echo BASEURL; ?>/product_detail.php?uid=<?php echo $productID ?>">
                            <article class="article-random">
                                <p style="display: none;"><?php echo $productID ?></p>
                                <h4><?php echo $categoryName ?></h4>
                                <h2><?php echo $productName ?></h2>
                                <div><?php echo $productDescription  ?> </div>
                            </article>
                        </a>
            <?php
                    }
                }
                $liqry->close();
            }
            ?>
        </div>
    </section>

    <!-- alles voor de category producten -->
    <section class="section-category">
        <div class="titel-container">
            <h2>Categorie overzicht</h2>
        </div>
        <div class="wrapper">
            <?php
            $liqry = $con->prepare("SELECT name, description, category_image.image FROM category INNER JOIN category_image on category.category_id = category_image.category_id WHERE category.active = 1 AND category_image.active = 1");
            if ($liqry === false) {
                trigger_error(mysqli_error($con));
            } else {
                // $liqry->bind_param('s', $categoryName, $categoryDescription);
                $liqry->bind_result($categoryName, $categoryDescription, $img);
                if ($liqry->execute()) {
                    $liqry->store_result();
                    while ($liqry->fetch()) {
            ?>

                        <a style="background-image: url(<?php BASEURL; ?>assets/img/img_category/<?php echo $img?>);" class="category-a" href="<?php echo BASEURL; ?>/products.php">
                            <article style="background-image: url(<?php echo BASEURL; ?>/assets/img/img_category/<?php $img ?>);" class="article-category">
                                <h3> ><?php echo $categoryName ?></h3>
                                <?php echo $categoryDescription ?>
                            </article>
                        </a>

            <?php
                    }
                }
                $liqry->close();
            }
            ?>
        </div>
    </section>
</main>
<?php
include('core/footer.php');
?>