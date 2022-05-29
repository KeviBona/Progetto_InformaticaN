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
    <title>Cancellazione</title>

</head>

<body>
    <div>
        <h1>Cancella un articolo</h1>
    <form action="cancella.php" method="POST">
        <label for="id">Inserisci un id</label>
        <input type="text" name="id" required>
        <input type="submit" name="submit" value="Invia">
        <?php
        if (isset($_POST["submit"])) {
            $id = $_POST["id"];
            $connessione = new mysqli('localhost', 'root', null, 'magazzino');
            $result = $connessione->query("delete from articoli where id = '$id'");
            header("location: area-privata.php");
        }
        ?>

    </div>
    </form>
</body>

</html>