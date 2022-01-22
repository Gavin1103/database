// maak in access.php de volgende code:
<?php
class Access
{
    private $conn;
    private $id;
    private $apikey;
    private $name;
    function __construct($db)
    {
        $this->conn = $db;
    }
    function validateAPIkey($key)
    {
        $sql = "SELECT apikey FROM `access` WHERE apikey = '$key'";
        $result = $this->conn->query($sql);
        $num = $result->num_rows;
        if ($num > 0) {
            $validate = true;
        } else {
            $validate = false;
        }
        return $validate;
    }
}
