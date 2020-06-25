<?php
/* Make DB Connection */
    $servername = "localhost";
    $username = "aless";
    $password = "123456789";
    $dbname = "auto";

    $con = new mysqli($servername, $username, $password, $dbname);
/* IF no DB */
    if ($con->connect_errno) {
        $createdb = "CREATE DATABASE IF NOT EXISTS '$dbname' DEFAULT CHARACTER SET utf8";
        $con->query($createdb);

        $con->select_db($dbname);

        $createtable = "CREATE TABLE '$dbname' IF NOT EXISTS 'auto' (
                ID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
                Name VARCHAR(255) NOT NULL,
                Kraftstoff VARCHAR(255) NOT NULL,
                Farbe VARCHAR(7) NOT NULL,
                Tank INTEGER NOT NULL DEFAULT 0)";

        $con->query($createtable);
    }
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <!-- Meta data -->
    <meta name="author" content="Alessio Ricci">
    <meta name="publisher" content="Alessio Ricci">
    <meta name="copyright" content="Alessio Ricci">
    <meta name="description"
        content="Das ist eine Webseite, welche gestaltet wurde für den Unterricht im ICT Modul 307.">
    <meta name="keywords" content="ICT, Modul, 307, Interaktive, Webseite, mit, Formular, erstellen, Auto">
    <meta name="page-topic" content="Bildung">
    <meta name="page-type" content="Private Homepage">
    <meta name="audience" content="Alle">
    <meta http-equiv="content-language" content="de">
    <meta name="robots" content="index, follow">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title register -->
    <title>Auto</title>
    <!-- Links from internet -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Links of myself -->
    <script language="javascript" type="text/javascript" src="/auto/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="/auto/css/css.php">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body class="cyan lighten-5">
    <header></header>
    <!-- Nav -->
        <nav class="cyan darken-4">
            <div class="nav-wrapper">
                <a href="/auto/sites/index.php" class="brand-logo">Auto</a>
                <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="https://materializecss.com/">MATERIALIZE CSS</a></li>
                    <li><a href="https://geeklabs.com">GEEKLAPS</a></li>
                    <li><a href="https://ict-berufsbildung.info/">MOODLE</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="https://materializecss.com/">MATERIALIZE CSS</a></li>
            <li><a href="https://geeklabs.com">GEEKLAPS</a></li>
            <li><a href="https://ict-berufsbildung.info/">MOODLE</a></li>
        </ul>
    <!-- Btn creat -->
    <div>
        <a>
            <i style="height: 50px; float:right; color: darkcyan;" class="new large material-icons">add_circle</i>
        </a>
    </div>
    <!-- Table -->
    <div class="tableabstand">
        <main>
            <table id="autos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Kraftstoff</th>
                        <th>Farbe</th>
                        <th>Bauart</th>
                        <th>Tank</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </main>
        <!-- Template -->
        <script id="myTemplate" type="x-tmpl-mustache">
            {{#auto}}
                <tr>
                    <td>{{ID}}</td>
                    <td>{{Name}}</td>
                    <td>{{Kraftstoff}}</td>
                    <td>
                        <div class="coloranzeige" style="background-color:{{Farbe}}"></div>{{Farbe}}
                    </td>
                    <td>{{Bauart}}</td>
                    <td class="tank">{{Tank}}</td>
                    <td data-id="{{ID}}" data-Name="{{Name}}" data-Kraftstoff="{{Kraftstoff}}" data-Farbe="{{Farbe}}" data-Bauart="{{Bauart}}">
                        <i class="tanken small material-icons blue">directions_car</i>
                        <i class="edit small material-icons green">create</i>
                        <i class="delete small material-icons red">delete</i>
                    </td>
                </tr>
            {{/auto}}
        </script>
    </div>
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <h4 id="modat_titel"></h4>
            <p id="modat_inhalt"></p>
        </div>
    </div>
    <!-- Footer -->
    <footer>© Alessio Ricci 2020</footer>
</body>

</html>

<?php
    $action = '';
/* Read URL  */
    if (isset($_GET['action'])) $action = $_GET['action'];
    if (isset($_GET['id'])) $id = $_GET['id'];
    if (isset($_GET['tank'])) $tank = $_GET['tank'];
/* Switch case */
    switch ($action) {
        case 'delet':
            /* connect to DB */
            $con = new mysqli($servername, $username, $password, $dbname);
            /* SQL */
            $sql = "DELETE FROM `auto` WHERE `ID` = $id";
            $con->query($sql);
            /* close */
            $con->close();
            break;
        case 'creat':
            /* If everything fild in */
            if (isset($_POST["name"]) && isset($_POST["kraftstoff"]) && isset($_POST["farbe"]) && isset($_POST["bauart"])) {
                /* DB connection */
                $con = new mysqli($servername, $username, $password, $dbname);
                /* Read all var */
                $name = $_POST["name"];
                $kraftstoff = $_POST["kraftstoff"];
                switch ($kraftstoff) {
                    case 'b':
                        $kraftstoff = "Benzin";
                        break;
                    case 'd':
                        $kraftstoff = "Diesel";
                        break;
                    case 'e':
                        $kraftstoff = "Elektro";
                        break;
                    case 'w':
                        $kraftstoff = "Wasserstoff";
                        break;
                };
                $farbe = $_POST["farbe"];
                $bauart = $_POST["bauart"];
                /* SQL */
                $sql = "INSERT INTO `auto`(`Name`, `Kraftstoff`, `Farbe`, `Bauart`) VALUES ('$name', '$kraftstoff', '$farbe', '$bauart')";
                $con->query($sql);
                /* Close */
                $con->close();
            }
            break;
        case 'edit':
            /* If everything fild in */
            if (isset($_POST["name"]) && isset($_POST["kraftstoff"]) && isset($_POST["farbe"]) && isset($_POST["bauart"])) {
                /* DB connection */
                $con = new mysqli($servername, $username, $password, $dbname);
                /* Read all var */
                $name = $_POST["name"];
                $kraftstoff = $_POST["kraftstoff"];
                switch ($kraftstoff) {
                    case 'b':
                        $kraftstoff = "Benzin";
                        break;
                    case 'd':
                        $kraftstoff = "Diesel";
                        break;
                    case 'e':
                        $kraftstoff = "Elektro";
                        break;
                    case 'w':
                        $kraftstoff = "Wasserstoff";
                        break;
                };
                $farbe = $_POST["farbe"];
                $bauart = $_POST["bauart"];
                /* SQL */
                $sql = "UPDATE `auto` SET `Name`= '$name',`Kraftstoff`='$kraftstoff',`Farbe`='$farbe',`Bauart`='$bauart' WHERE `ID` = '$id'";
                $con->query($sql);
                /* Close */
                $con->close();
            }
            break;
        case 'tanken':
            /* DB connection */
            $con = new mysqli($servername, $username, $password, $dbname);
            /* var change */
            $tank = $tank + 1;
            /* SQL */
            $sql = "UPDATE `auto` SET `Tank`= $tank WHERE `ID` = $id";
            $con->query($sql);
            /* Close */
            $con->close();
            break;
        case '':
            /* Standart do nothing */
            break;
    }
?>