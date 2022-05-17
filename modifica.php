<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>MODIFICA ARTICOLI</title>
</head>
<body>
    <h1>Modifica un articolo</h1>
    <?php
    $connessione = mysqli_connect("localhost", "root", null, "Magazzino");
    echo("<table border=1>");
    echo("<tr><td>ID</td><td>DESCRIZIONE</td><td>QUANTITA</td><td>COSTO</td></tr>");
    $rows = $connessione->query("SELECT * FROM articoli");
    foreach($rows as $riga)
    {
        $id = $riga["id"];
        $description = $riga["descrizione"];
        $quantita = $riga["quantita"];
        $prezzo = $riga["prezzo"];
        echo("<tr><td>".$id."</td><td>".$description."</td><td>".$quantita."</td><td>".$prezzo."</td></tr>");
    }
    echo("</table><br>");
    if(isset($_GET["modifica"]))
    {
        $descrizione = $_GET["descrizione"];
        $quantita = $_GET["quantita"];
        $prezzo = $_GET["costo"];
        if($descrizione && $quantita && $prezzo)
        {
            try{
                //update
                $connessione->query("UPDATE articoli SET quantita = '$quantita', prezzo = '$prezzo' WHERE descrizione = '$descrizione'");
                echo("Modifica avvenuta correttamente!");
                header("location:home.php");
            }
            catch(Exception $ex){
                echo("Alcuni campi sono errati!");
            }
        }
        else
        {
            echo("Alcuni campi sono mancanti!");
        }
    }
    ?>
    <form action="modifica.php" method="GET">
    <label for="descrizione">Descrizione</label>
        <input type="text" name="descrizione"><br><br>
        <label for="quantita">Quantità</label>
        <input type="number" name="quantita"><br><br>
        <label for="costo">Costo</label>
        <input type="number" name="costo"><br><br>
        <input type="submit" name="modifica" value="Modifica"><br><br>
        <input type="submit" name="cancella" value="Cancella">
    </form>
</body>
