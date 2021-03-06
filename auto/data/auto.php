<?php
/* Make DB connection */
    $servername = "localhost";
    $username = "aless";
    $password = "123456789";
    $dbname = "auto";

    $con = new mysqli($servername, $username, $password, $dbname);
/* If no connection */
    if ($con->connect_errno) {
        $createdb = "CREATE DATABASE IF NOT EXISTS " . $dbname . "DEFAULT CHARACTER SET utf8";
        $con->query($createdb);

        $con->select_db($dbname);

        $createtable = "CREATE TABLE IF NOT EXISTS autos (
            ID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
            Name VARCHAR(255) NOT NULL,
            Kraftstoff VARCHAR(255) NOT NULL,
            Farbe VARCHAR(7) NOT NULL,
            Tank INTEGER NOT NULL DEFAULT 0)";

        $con->query($createtable);
    }
    /* Creat JSON */
?>
{
    "auto":
        <?php
        /* Get all object with SQL from DB */
            $res = $con->query("SELECT `auto`.* FROM `auto`");
            $results = $res->fetch_all(MYSQLI_ASSOC);
            echo json_encode($results);
            $con->close();
        ?>
}