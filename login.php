<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>pagina login</title>
</head>
<body>
<?php
if(isset($_POST["submit"]))
{
    $utente = $_POST["username"];
    $pwd = $_POST["password"];

    try
    {
        $connessione = new mysqli('localhost', 'root', null, 'anagrafica');
        echo("Connessione effettuata<br>");
    }
    catch (Exception $ex)
    {
        if(mysqli_connect_errno())
        {
            echo("Connessione fallita: ".mysqli_connect_error()."<br>");
            exit(1);
        }
    }

    try
    {
        $result = $connessione->query("INSERT INTO Utente (username, psw) VALUES ('$utente', '$pwd')");
        echo("Inserimento eseguito<br>");
        
    }
    catch(Exception $ex)
    {
        die("Query fallita<br> ".$ex);
    }

    $connessione->close();
    }
else
{
    echo(" <h1>La mia pagina di login</h1>
    <form action='".$_SERVER['PHP_SELF']."' method='POST'>
        <label for='username'>Nome utente:</label>
        <input type='text' value='inserisci username' name='username'><br>
        <label for='password'>Password:</label>
        <input type='password' name='password'><br>
        <input type='submit' name='submit' value='invia'>
    </form>");
}
?>
</body>
</html>