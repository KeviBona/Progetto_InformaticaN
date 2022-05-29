<!DOCTYPE html>
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
</style>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica</title>

</head>

<body>
    <div>
        <h1>Modifica Articolo</h1>
        <form action="modifica.php" method="POST">
        <label for="id">Inserisci un id</label>
        <input type="text" name="id">
        <input type="submit" name="submit" value="Invia"><br>
    </div>

        <?php
        if (isset($_POST["submit"])) {
            if ($_POST["id"]) {
                $id = $_POST["id"];
                $connessione = new mysqli('localhost', 'root', null, 'magazzino');
                $result = $connessione->query("select * from articoli where id = '$id'");
                foreach ($result as $riga) {
                    echo ("<label for='descrizione'>Descrizione</label>");
                    echo ("<input type='text' name='descrizione' value='" . $riga["descrizione"] . "'><br>");
                    echo ("<label for='quantita'>Quantita</label>");
                    echo ("<input type='text' name='quantita' value='" . $riga["quantita"] . "'><br>");
                    echo ("<label for='prezzo'>Prezzo</label>");
                    echo ("<input type='text' name='prezzo' value='" . $riga["prezzo"] . "'><br>");
                    echo ("<input type='text' name='id' value='" . $id . "' hidden><br>");
                    echo ("<input type='submit' name='modifica' value='Modifica'>");
                }
            }
        } else if (isset($_POST["modifica"])) {
            $descrizione = $_POST["descrizione"];
            $prezzo = $_POST["prezzo"];
            $quantita = $_POST["quantita"];
            $id = $_POST["id"];
            $connessione = new mysqli('localhost', 'root', null, 'magazzino');
            $result = $connessione->query("update articoli set descrizione = '$descrizione', prezzo = '$prezzo', quantita = $quantita where id = '$id'");
            header("location: area-privata.php");
        }
        ?>
    </form>
</body>

</html>