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
</style>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>

</head>

<body>
    <div>
    <h1>Inserisci Articolo</h1>
    <form action="inserisci.php" method="POST">
        <label for="id">Inserisci la descrizione</label>
        <input type="text" name="descrizione" required>
        <label for="id">Inserisci la quantità</label>
        <input type="text" name="quantita" required>
        <label for="id">Inserisci il prezzo</label>
        <input type="text" name="prezzo" required>
        <input type="submit" name="submit" value="Invia">
    </div>

        <?php
        if (isset($_POST["submit"])) {
            $descrizione = $_POST["descrizione"];
            $prezzo = $_POST["prezzo"];
            $quantita = $_POST["quantita"];
            $connessione = new mysqli('localhost', 'root', null, 'magazzino');
            $result = $connessione->query("insert into articoli (descrizione, prezzo, quantita) values ('$descrizione', '$prezzo', $quantita)");
            header("location: area-privata.php");
        }
        ?>
    </form>
</body>

</html>