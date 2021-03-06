<!DOCTYPE html>
<html lang="de">

<head>
    <!-- Meta daten -->
    <meta name="author" content="Alessio Ricci">
    <meta name="publisher" content="Alessio Ricci">
    <meta name="copyright" content="Alessio Ricci">
    <meta name="description" content="Das ist eine Webseite, welche gestaltet wurde für den Unterricht im ICT Modul 307.">
    <meta name="keywords" content="ICT, Modul, 307, Interaktive, Webseite, mit, Formular, erstellen">
    <meta name="page-topic" content="Bildung">
    <meta name="page-type" content="Private Homepage">
    <meta name="audience" content="Alle">
    <meta http-equiv="content-language" content="de">
    <meta name="robots" content="index, follow">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Name shown by Register -->
    <title>Name</title>
    <!-- Links to copy -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.0.1/mustache.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Links by myself -->
    <script language="javascript" type="text/javascript" src="/js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="css/css.php">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="indigo lighten-5">
    <!-- Header -->
    <header class="grey">ICT Modul 307 | Interaktive Webseite mit Formular erstellen</header>
    <!-- Nav -->
    <a href="auto/sites/index.php" target="_blank">
        <nav class="black">
            Auto
        </nav>
    </a>
    <!-- Content -->
    <div>
        <h1>Hey my name is Alessio!</h1>
        <main></main>
        <script id="myTemplate" type="x-tmpl-mustache">
            {{#person}}
                <div>
                    {{name}}
                    <br>
                    {{age}}
                    <br>
                    {{city}}
                    <br>
                    <div class="btn edit">edit</div>
                </div>
                <hr>
            {{/person}}
        </script>
    </div>
    <!-- Size -->
    <div class="row">
        <div class="col s1 m6 l12 red">RED</div>
        <div class="col s2 m6 l12 orange">ORANGE</div>
        <div class="col s3 m6 l12 yellow">YELLOW</div>
        <div class="col s4 m6 l12 green">GREEN</div>
        <div class="col s5 m6 l12 blue">BLUE</div>
        <div class="col s6 m6 l12 purple">PURPLE</div>
        <div class="col s7 m6 l12 white">WHITE</div>
        <div class="col s8 m6 l12 grey">GREY</div>
        <div class="col s9 m6 l12 black">BLACK</div>
        <div class="col s10 m6 l12 brown">BROWN</div>
        <div class="col s11 m6 l12 cyan">CYAN</div>
        <div class="col s12 m6 l12 lime">LIME</div>
    </div>
    <!-- Date -->
    <div class="red">
        <form method="GET">
            <input type="text" class="datepicker">
            <input type="number" id="numbers" onkeyup="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeydown="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
            <button type="submit">Try</button>
        </form>
    </div>
    <!-- Footer -->
    <footer>© Alessio Ricci 2020</footer>
</body>

</html>

<script>
    $('#numbers').keyup(function() {
        var wert = $('#numbers').val();
        console.log(wert);
        if (Number.isInteger(wert)) {
            var wert = parseInt(wert);
            $('#numbers').val(wert);
        }
        if (wert > 2147483647) {
            $('#numbers').val(2147483647);
            M.toast({
                html: 'Wert zu gross'
            });
        }
        if (wert < 0) {
            $('#numbers').val(0);
            M.toast({
                html: 'Wert zu klein'
            });
        }
    });
</script>