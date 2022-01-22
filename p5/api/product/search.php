<?php
include("../config/database.php");
$database = new Database();
$db = $database->getConnection();
$dbConn = $database->conn;
?>
type bijvoorbeeld cola in.

<form method="$_POST">
    <input type="text" name="search" placeholder="zoek op naam">
    <input type="submit" value="zoek">
</form>

<?php


if (!empty($_GET["search"])) {

    $str = $_GET["search"];

    $liqry = $dbConn->prepare("SELECT `id`, `naam`, `beschrijving`, `prijs`, `categorie_id`, `toegevoegd_op`, `gewijzigd_op` FROM `product` WHERE naam = '$str'");
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
        }else{
            echo 'niks gevonden';
        }
        $liqry->close();
    }
    ?>
<?php
}
?>

