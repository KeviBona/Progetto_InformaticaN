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
        width: 300;

    }

    form>input {
        color: black;
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
        border-radius: 20px;
        padding: top 10px;
        margin-bottom: 10px;
        width: 100px;

    }

    label {
        color: white;
        display: flex;

    }

    p {
        color: white;
    }
</style>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>


</head>

<body>
    <form action="registrazione.php" method="POST">
        <br><br><br><br><br>
        <h1> Registrati</h1>
        <br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="passwordAdmin">Password amministratore</label>
        <input type="password" name="passwordAdmin" id="password" required>
        <div>
            <input type="submit" value="invia" name="submit">
        </div>
        <p>Hai gia' un account? <a href="login.php">Accedi</a></p>
    </form>
</body>

</html>
<?php
$passwordAdmin = "123";
if (isset($_POST["submit"])) {
    if ($_POST["passwordAdmin"] == $passwordAdmin) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $connessione = new mysqli('localhost', 'root', null, 'magazzino');
        /*$result = $connessione->query("select * from utenti where username = '$username'");
        if($result->num_rows == 0)
        {

        }*/
        $connessione->query("Insert into utenti (username, password) VALUES ('$username', '$password')");
        $connessione->close();
        echo ("");
    } else {
        echo ("");
    }
}

?>