<?php

// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');
?>
<a href="../../admin/producten/index.php">terug</a>

<?php
if (isset($_POST['naam_product']) && $_POST['naam_product'] && ($_POST['beschrijving_product']) && $_POST['beschrijving_product'] && ($_POST['prijs_product']) && $_POST['prijs_product'] && ($_POST['kleur_product']) && $_POST['kleur_product'] && ($_POST['gewicht_product']) && $_POST['gewicht_product'] && ($_POST['category']) && $_POST['category'] != "") {

    $name = $con->real_escape_string($_POST['naam_product']);
    $description = $con->real_escape_string($_POST['beschrijving_product']);
    $price = $con->real_escape_string($_POST['prijs_product']);
    $color = $con->real_escape_string($_POST['kleur_product']);
    $weight = $con->real_escape_string($_POST['gewicht_product']);
    $category = $con->real_escape_string($_POST['category']);

    $liqry = $con->prepare("INSERT INTO product (name, description, category_id, price, color, weight, active) VALUES ('$name', '$description', '$category','$price', '$color', '$weight', 1)");
    if ($liqry === false) {
        echo mysqli_error($con);
    } else {
        // $liqry->bind_param('s', $name);
        if ($liqry->execute()) {
            echo "product: " . $name . " toegevoegd.";
        }
    }
    $liqry->close();
} else {
    echo 'alles moet ingevuld zijn!';
}
?>
<form action="" method="POST">
    naam product:<input type="text" name="naam_product">
    <br>
    <br>
    beschrijving:<input type="text" name="beschrijving_product">
    <br>
    <br>
    Prijs:<input type="text" name="prijs_product">
    <br>
    <br>
    kleur:<input type="text" name="kleur_product">
    <br>
    <br>
    gewicht:<input type="text" name="gewicht_product">
    <br>
    <br>


    <label for="category">Category:</label>
    <select id="category" name="category">
    
        <option value="1">tafellamp</option>
        <option value="2">buitenlamp</option>
        <option value="3">designlamp</option>
        <option value="4">bureaulamp</option>

    </select>

    <br>
    <br>

    <input type="submit" name="submit" value="Toevoegen">
</form>

<?php
include('../core/footer.php');
?>