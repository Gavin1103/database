<?php
session_start();

/**
 * Voor de MAC gebruikers;
 */
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "root";
// $dbname = "webshop";

/**
 * Voor de Windows gebruikers;
 */
// $dbhost = "localhost";
// $dbuser = "u533187_533187";
// $dbpass = "m4BrU2v2";
// $dbname = "u533187_crud";


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webshop";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

// define("BASEURL","http://u533187.gluweb.nl/webshop/");
// define("BASEURL_CMS","http://u533187.gluweb.nl/webshop/admin/");

define("BASEURL","http://localhost/programming/database/p3/database-webshop/database-webshop/");
define("BASEURL_CMS","http://localhost/programming/database/p3/database-webshop/database-webshop/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}