<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>RICERCA ARTICOLI</title>
</head>
<body>
    <h1>Ricerca articolo:</h1>
    <form action="ricerca.php" method="GET">
        <label for="ricerca">Inserisci la descrizione da ricercare:</label><br>
        <input type="text" name="descrizione"><br><br>
        <label for="minprezzo">Prezzo MIN:</label><br>
        <input type="number" name="prezzoMinimo"><br><br>
        <label for="maxprezzo">Prezzo MAX:</label><br>
        <input type="number" name="prezzoMassimo"><br><br>
        <label for="maxprezzo">Quantità minima:</label><br>
        <input type="number" name="quantita"><br><br>
        <input type="submit" name="ricerca" value="Ricerca"><br>
    </form>
</body>
<?php
$connessione = mysqli_connect("localhost", "root", null, "Magazzino");
if(isset($_GET["ricerca"]))
{
    $searchString = $_GET["descrizione"];
    if(isset($_GET["prezzoMinimo"]))
    {
        $prezzoMinimo = $_GET["prezzoMinimo"];
    }
    else
    {
        $prezzoMinimo = 0;
    }
    if(isset($_GET["prezzoMassimo"]))
    {
        $prezzoMassimo = $_GET["prezzoMassimo"];
    }
    else
    {
        $prezzoMassimo = PHP_INT_MAX;
    }
    if(isset($_GET["quantita"]))
    {
        $qtMinima = $_GET["quantita"];
    }
    else
    {
        $qtMinima = 0;
    }
    if($searchString)
    {
        try{
            echo("<table border=1>");
            echo("<tr><td>ID</td><td>DESCRIZIONE</td><td>QUANTITA</td><td>COSTO</td></tr>");
            $obj = $connessione->query("SELECT * FROM articoli WHERE descrizione LIKE '$searchString%' AND quantita >= '$qtMinima' AND prezzo BETWEEN '$prezzoMinimo' AND '$prezzoMassimo'");
            foreach($obj as $riga)
            {
                $id = $riga["id"];
                $description = $riga["descrizione"];
                $quantita = $riga["quantita"];
                $prezzo = $riga["prezzo"];
                echo("<tr><td>".$id."</td><td>".$description."</td><td>".$quantita."</td><td>".$prezzo."</td></tr>");
            }
            echo("</table>");

        }
        catch(Exception $ex)
        {
            echo($ex);
        }
    }
    else
    {
        echo('<script>alert("Errore! Inserire una descrizione da ricercare")</script>');
    }
}
?>
