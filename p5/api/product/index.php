<a href="create.php">Voeg een product toe</a>
<br>
<br>
<a href="search.php">Zoek een product</a>
<br>
<br>
<?php
// verbinding met database
include("../config/database.php");
$database = new Database();
$db = $database->getConnection();
$dbConn = $database->conn;

$liqry = $dbConn->prepare("SELECT `id`, `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoegd_op`, `gewijzigd_op` FROM `product` WHERE 1");
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
?>
            <a href="index.php?ID=<?php echo $id ?>">Delete</a>
            <br>
            <a href="edit.php?ID=<?php echo $id ?>">Edit</a>
<?php
            echo "<br>";
            echo "<br>";
        }
    }
    $liqry->close();
}
?>
<?php

// $_GET["ID"];

if (isset($_GET["ID"])) {
    $deleteProduct = $_GET["ID"];
    $deleteqry = $dbConn->prepare("DELETE FROM `product` WHERE id = '$deleteProduct'");
    if ($deleteqry === false) {
        echo mysqli_error($dbConn);
    } else {
        if ($deleteqry->execute()) {
            $deleteqry->store_result();
            echo $deleteProduct, ': product verwijderd';
        }
    }
    $deleteqry->close();
}
?>