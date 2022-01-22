<?php
include('../core/header.php')
?>

<a href="../../admin/producten/index.php">terug</a>


<?php

$productID = $_GET['ID'];

// echo $productID

$editqry = $con->prepare("SELECT product_id , name , description , category_id,price,color,weight ,active FROM `product` WHERE active = 1 AND product_id = $productID");
if ($editqry === false) {
    echo mysqli_error($con);
} else {
    $editqry->bind_result($proID, $proName, $proDescription, $catID, $price, $color, $weight, $active);
    if ($editqry->execute()) {
        $editqry->store_result();
        while ($editqry->fetch()) {
?>

            <div class="products-wrapper">
                <div class="products-container">
                    <div class="product-block"><?php echo 'ID:', $proID ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo 'catID:', $catID ?></div>
                </div>

                <div class="products-container">
                    <div class="product-block"><?php echo $proName ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $proDescription ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo '$', $price ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $color ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $weight ?></div>
                </div>
                <div class="products-container">
                    <div class="product-block"><?php echo $active ?></div>
                </div>


            </div>

<?php
        }
    }
    $editqry->close();
}
?>

<br>
<form method="POST">

    Nieuwe: naam:<input type="text" name="proName" value="<?php echo $proName ?>"><br>
    Nieuwe: beschrijving<input type="text" name="proDescription" value="<?php echo $proDescription ?>"><br>
    Nieuwe: prijs<input type="text" name="price" value="<?php echo $price ?>"><br>
    Nieuwe: kleur<input type="text" name="color" value="<?php echo $color ?>"><br>
    Nieuwe: gewicht<input type="text" name="weight" value="<?php echo $weight ?>"><br>
    <label for="category">Nieuwe category:</label>
    <select id="category" name="category">

        <option value="1">tafellamp</option>
        <option value="2">buitenlamp</option>
        <option value="3">designlamp</option>
        <option value="4">bureaulamp</option>

    </select>
    <br>
    
    <input type="submit">

</form>


<?php

if (isset($_POST['proName']) && $_POST['proName'] && ($_POST['proDescription']) && $_POST['proDescription'] && ($_POST['price']) && $_POST['price'] && ($_POST['color']) && $_POST['color'] && ($_POST['weight']) && $_POST['weight'] && ($_POST['category']) && $_POST['category'] != "") {

    $newName = $_POST['proName'];
    $newDescription = $_POST['proDescription'];
    $newPrice = $_POST['price'];
    $newColor = $_POST['color'];
    $newWeight = $_POST['weight'];
    $newCategory = $_POST['category'];


    $editqry = $con->prepare("UPDATE `product` SET `name`='$newName',`description`='$newDescription',`category_id`='$newCategory',`price`='$newPrice',`color`='$color',`weight`='$weight' WHERE product_id = $productID");
    if ($editqry === false) {
        echo mysqli_error($con);
    } else {
        // $editqry->bind_result();
        if ($editqry->execute()) {
            $editqry->store_result();
            header("Refresh:0");
            echo "<script type='text/javascript'>alert('Product bewerkt');</script>";
        }
    }
    $editqry->close();
}
?>



<?php
include('../core/footer.php')
?>