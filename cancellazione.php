<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>RIMOZIONE ARTICOLI</title>
</head>
<body>
    <h1>Rimuovi articolo:</h1>
    <form action="cancellazione.php" method="GET">
        <label for="ricerca">Inserisci l'indice dell'oggetto da rimuovere:</label><br><br>
        <input type="number" name="index"><br><br>
        <input type="submit" name="rimuovi" value="Rimuovi"><br><br>
    </form>
</body>
<?php
$connessione = mysqli_connect("localhost", "root", null, "Magazzino");
echo("<table border=1>");
echo("<tr><td>ID</td><td>DESCRIZIONE</td><td>QUANTITA</td><td>COSTO</td></tr>");
$obj = $connessione->query("SELECT * FROM articoli");
foreach($obj as $riga)
{
    $id = $riga["id"];
    $description = $riga["descrizione"];
    $quantita = $riga["quantita"];
    $prezzo = $riga["prezzo"];
    echo("<tr><td>".$id."</td><td>".$description."</td><td>".$quantita."</td><td>".$prezzo."</td></tr>");
}
echo("</table>");
if(isset($_GET["rimuovi"]))
{
    $removeIndex = $_GET["index"];
    if($removeIndex)
    {
        if($removeIndex >= 0)
        {
            try{
                //DELETE FROM table_name WHERE condition;
                $connessione->query("DELETE FROM articoli WHERE id='$removeIndex'");
                echo("Articolo rimosso correttamente!");
            }
            catch(Exception $ex){
                echo($ex);
            }
        }
        else
        {
            echo('<script>alert("Errore! Inserire un indice esistente")</script>');
        }
    }
    else
    {
        echo('<script>alert("Errore! Inserire un elemento da rimuovere")</script>');
    }
}
?>
