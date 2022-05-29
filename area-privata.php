<style>
    h1 {
        color: yellow;
        size: 30px;
    }

    body {
        display: flex;
        justify-content: center;
        background-image: url(sfondo.jpg);
    }

    div {
        color: white;
        display: flex;
        flex-direction: column;
        width: 300px;
    }

    form>input {
        margin-bottom: 20px;
        border-radius: 10px;
    }

    input {
        font: 20px 'Open Sans', sans-serif;
        border: px;
        padding: 2px;
        display: block;
        width: 96%;
        cursor: pointer;
    }

    button {
        border-radius: 10px;
        padding: top 10px;
        margin-bottom: 10px;
        width: 100px;
        top: 50px;
        left: 50px;
    }
    td{
        color: white;
        display: flex;
        flex-direction: auto;
        width: 300;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Area Privata</title>
</head>
<div>
<body>
    <h1>Area Privata</h1>

    <a href="login.php">Disconnetti</a><br>
    <a href="cancella.php" name="cancella">Cancella</a><br>
    <a href="inserisci.php" name="inserisci">Inserisci</a><br>
    <a href="modifica.php" name="modifica">Modifica</a><br>
    </body>
    
<?php
$connessione = new mysqli('localhost', 'root', null, 'magazzino');
$result = $connessione->query("select * from articoli");
if ($result) {
    echo ("<table border=2>");
    echo ("<tr><td>ID</td><td>Descrizione</td><td>Quantità</td><td>Prezzo</td></tr>");
    foreach ($result as $riga) {
        echo ("<tr>");
        echo ("<td>" . $riga["id"] . "</td>");
        echo ("<td>" . $riga["descrizione"] . "</td>");
        echo ("<td>" . $riga["quantita"] . "</td>");
        echo ("<td>" . $riga["prezzo"] . "</td>");
        echo ("</tr>");
    }
}
?>

</div>

</html>
