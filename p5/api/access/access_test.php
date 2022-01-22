// maak in access_test.php de volgende code:
<?php
// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/access.php';
// instantiate database and access object
$database = new Database();
$db = $database->getConnection();
// initialize object
$access = new Access($db);
// Verder met vaststellen: bestaat de apikey
$testwaarde = "d1bf93299de1b68e6d382c893bf1215f";
$resultaat = $access->validateAPIkey($testwaarde);
if ($resultaat) {
    echo '<br>Hoera, de apikey bestaat';
} else {
    echo '<br>Oeps, niet de juiste waarde';
}
