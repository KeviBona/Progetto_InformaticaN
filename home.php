<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<style>
    body {
        background-image:url("backgroundLogin.jpg"); 
        background-repeat:no-repeat;
        background-size: cover;
        color: white;
    }
</style>
<body>
<div class="text-center mt-5">
    <h1>Accesso al magazzino</h1>
    <form style="max-width:400px;margin:auto;" action="home.php" method="GET">
        <?php
        //MODIFICA: potrei aggiungere un pulsante per effettuare il logout
        $username = $_GET["username"];
        $privilegi = $_GET["livello"];
        echo("Username: ".$username."<br><br>");
        $connessione = mysqli_connect("localhost", "root", null, "Magazzino");
        if($privilegi == 0) //utente privilegi user
        {
            //visualizza
            echo("<table border=1 class="."table table-dark".">");
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
            echo("</table>");
        }
        elseif($privilegi == 1) //utente privilegi administrator
        {
            echo("<table border=1 class="."table".">");
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
            echo("</echo><br>");
            //inserimento
            echo("<input type="."submit "."class="."btn btn-lg btn primary btn block"."name="."inserisci"." value="."Inserisci articolo"."><br><br>");
            //rimozione
            echo("<input type="."submit "."class="."btn btn-lg btn primary btn block"."name="."rimozione"."class="." value="."Rimouvi articolo"."><br><br>");
            //ricerca
            echo("<input type="."submit "."class="."btn btn-lg btn primary btn block"."name="."ricerca"." value="."Ricerca articoli"."><br><br>");
            //modifica
            echo("<input type="."submit "."class="."btn btn-lg btn primary btn block"."name="."modifica"." value="."Modifica articoli"."><br><br>");
            echo($_GET["inserisci"]);
            if(isset($_GET["inserisci"]))
            {
                header("location:inserimento.php");//da sistemare
            }
            //DA VEDERE COME SPOSTARE I PULSANTI A FIANCO DELLA TABELLA
            //gestione scelta utente
            elseif(isset($_GET["rimozione"]))
            {
                header("location:cancellazione.php");
            }
            elseif(isset($_GET["ricerca"]))
            {
                header("location:ricerca.php");
            }
            elseif(isset($_GET["modifica"]))
            {
                header("location:modifica.php");
            }
        }
        ?>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>

