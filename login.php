<?php
if(isset($_GET["submit"]))
{
    $nomeUtente = $_GET["username"];
    $password = $_GET["password"];
    if($nomeUtente && $password)
    {
        try
        {
            $connessione = mysqli_connect("localhost", "root", null, "Magazzino");
            $result = $connessione->query("SELECT privilegi FROM utenti WHERE username = '$nomeUtente' AND password = '$password'");
            foreach($result as $riga)
            {
                $livello = $riga["privilegi"];
                header("location: home.php?username=$nomeUtente&password=$password&livello=$livello");
            } 
        }
        catch (Exception $ex)
        {
            echo($ex);
        }
    }
    else
    {
        echo("Errore! E' necessario compilare tutti i campi!");
    }
}
elseif(isset($_GET["registrati"]))
{
    header("location:registrazione.php");
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login</title>
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
        <form style="max-width:400px;margin:auto;" action="login.php" method="GET">
        <h1 class="mt-4 font-weight-normal">Accedi al servizio</h1><br>
        <img  src="imgLogin.png" height="100" width="100" alt="Login immage">
        <input type="text" name="username" class="form-control mt-3" placeholder="Username"><br>
        <input type="password" name="password" class="form-control" placeholder="Password"><br>
        <input type="submit" class="btn btn-lg btn primary btn block" name="submit" value="Accedi"><br>
        <input type="submit" class="btn btn-lg btn primary btn block" name="registrati" value="Non hai un account? Clicca qui per registrarti">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
