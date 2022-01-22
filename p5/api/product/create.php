<?php
// verbinding met database
include("../config/database.php");
$database = new Database();
$db = $database->getConnection();
$dbConn = $database->conn;

?>
<form method="POST">
    <label for="inputWoord">voeg een drank toe</label>
    <br>
    <br>
    <input id="" type="text" placeholder="drank" value="" name="nieuwDrank">
    <br>
    <input id="" type="text" placeholder="kies categorie" value="" name="category">
    <br>
    <input id="" type="text" placeholder="beschrijving" value="" name="beschrijving">
    <br>
    <input id="" type="text" placeholder="prijs" value="" name="prijs">
    <br>
    <input type="submit" name="submit" value="toevoegen">
</form>


<?php

if (!empty($_POST['nieuwDrank']) && !empty($_POST['category']) && !empty($_POST['beschrijving'])  && !empty($_POST['prijs']) && !empty($_POST['submit'])) {

    $nieuwDrank = $_POST['nieuwDrank'];
    $category = $_POST['category'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];

    $liqry = $dbConn->prepare("INSERT INTO `product`( `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoegd_op`, `gewijzigd_op`) VALUES ('$nieuwDrank','$beschrijving','$prijs','$category','CURRENT_DATE','CURRENT_TIME')");
    if ($liqry === false) {
        echo mysqli_error($dbConn);
    } else {
        // $liqry->bind_param('s', $name);
        if ($liqry->execute()) {
            echo "product: " . $nieuwDrank . " toegevoegd.";
        }
    }
    $liqry->close();
} else {
    echo 'alles moet ingevuld zijn!';
}
?>

