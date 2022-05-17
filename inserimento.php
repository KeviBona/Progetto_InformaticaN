<?php
$connessione = mysqli_connect("localhost", "root", null, "Magazzino");
if(isset($_GET["inserisci"]))
{
    $descrizione = $_GET["descrizione"];
    $quantita = $_GET["quantita"];
    $prezzo = $_GET["costo"];
    if($descrizione && $quantita && $prezzo)
    {
        try
        {
            $connessione->query("INSERT INTO articoli(descrizione, quantita, prezzo) VALUES('$descrizione', '$quantita', '$prezzo')");
            echo("Inserimento avvenuto correttamente!");
            header("location:home.php");
        }
        catch (Exception $ex)
        {
            echo("Alcuni campi sono errati!");
        }
    }
    else
    {
        echo("Alcuni campi sono mancanti!");
    }
}
elseif(isset($_GET["cancella"]))
{
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>INSERISCI ARTICOLI</title>
</head>
<body>
    <h1>Inserisci un nuovo articolo:</h1>
    <form action="inserimento.php" method="GET">
        <label for="descrizione">Descrizione</label>
        <input type="text" name="descrizione"><br><br>
        <label for="quantita">Quantità</label>
        <input type="number" name="quantita"><br><br>
        <label for="costo">Costo</label>
        <input type="number" name="costo"><br><br>
        <input type="submit" name="inserisci" value="Inserisci"><br><br>
        <input type="submit" name="cancella" value="Cancella">
    </form>
</body>