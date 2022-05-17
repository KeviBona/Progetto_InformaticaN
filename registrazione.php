<?php
$connessione = mysqli_connect("localhost", "root", null, "Magazzino");
if(isset($_GET["submit"]))
{
    $nomeUtente = $_GET["username"];
    $pass = $_GET["password"]; 
    $secret = $_GET["passwordAdministrator"]; //password amministratore deve essere uguale a 1234
    $privilegi = $_GET["livello"];
    if($nomeUtente && $pass && $secret && $privilegi)
    {
        //inserimento record db
        if($connessione->query("INSERT INTO TABLE utenti(username, pass, privilegi) VALUES ($nomeUtente, $pass, $privilegi)") == TRUE && $secret = "1234")
        {
            echo("Utente registrato correttamente!");
            header("location:home.php");
        }
        else
        {
            echo("Errore in fase di registrazione");
        }
    }
    else
    {
        echo("Errore! Alcuni campi sono mancanti!");
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Registrazione</title>
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
        <form style="max-width:400px;margin:auto;" action="GET">
        <h1 class="mt-4 font-weight-normal">Registrati</h1><br>
        <input type="text" name="username" class="form-control mt-3" placeholder="Username"><br>
        <input type="password" name="password" class="form-control" placeholder="Password"><br>
        <input type="password" name="passwordAdministrator" class="form-control" placeholder="Password Amministratore"><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="livello" id="Amministratore">
            <label class="form-check-label" for="Amministratore">
            Amministratore
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="livello" id="Utente">
            <label class="form-check-label" for="flexRadioDefault2">
            Utente
            </label>
        </div><br>
        <input type="submit" class="btn btn-lg btn primary btn block" name="registrati" value="Registrati">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
