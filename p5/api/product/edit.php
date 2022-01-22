<?php
// verbinding met database
include("../config/database.php");
$database = new Database();
$db = $database->getConnection();
$dbConn = $database->conn;

$_GET["ID"];
$editID = $_GET["ID"];

$liqry = $dbConn->prepare("SELECT `id`, `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoegd_op`, `gewijzigd_op` FROM `product` WHERE id = '$editID'");
if ($liqry === false) {
    echo mysqli_error($dbConn);
} else {
    $liqry->bind_result($id, $naam, $beschrijving, $prijs, $categorie, $toegevoegd_op, $gewijzigd_op);
    if ($liqry->execute()) {
        $liqry->store_result();
        while ($liqry->fetch()) {
            // echo "<pre>";
            echo "ID: ", $id;
            echo "<br>";
            echo "Drank: ", $naam;
            echo "<br>";
            echo "Beschrijving: ", $beschrijving;
            echo "<br>";
            echo "Prijs: ", $prijs;
            echo "<br>";
            echo "Categorie: ", $categorie;
            echo "<br>";
            echo "Toegevoegd: ", $toegevoegd_op;
            echo "<br>";
            echo "Gewijzigd: ", $gewijzigd_op;
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
    }
    $liqry->close();
}
?>

<form action="#" method="POST">
    nieuwe naam:<input type="text" name="newName">
    <br>
    nieuwe beschrijving:<input type="text" name="newDescription">
    <br>
    nieuwe prijs:<input type="number" name="newPrice">
    <br>
    nieuwe categorie:<input type="number" name="newCat">
    <br>
    <input type="submit" value="update">
</form>

<?php


if (!empty($_POST['newName']) && !empty($_POST['newDescription']) && !empty('newPrice') && !empty('newCat')) {

    $newName = $_POST['newName'];
    $newDescription = $_POST['newDescription'];
    $newPrice = $_POST['newPrice'];
    $newCat = $_POST['newCat'];


    $editqry = $dbConn->prepare("UPDATE `product` SET `naam`='$newName',`beschrijving`='$newDescription',`prijs`='$newPrice',`categorie_id`='$newCat',`gewijzigd_op`='CURRENT_TIME' WHERE id = $editID");
    if ($editqry === false) {
        echo mysqli_error($dbConn);
    } else {
        // $editqry->bind_result();
        if ($editqry->execute()) {
            $editqry->store_result();
            // header("Refresh:0");
            echo "Product met ID: $editID bewerkt";
        }else{
            echo 'er is niks veranderd';
        }
    }
    $editqry->close();
}
?>
