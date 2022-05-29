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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<div>
<body>
    <form action="login.php" method="POST">
        <h1> Accedi</h1>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" name="submit" value="invia">
        <p>Non hai ancora un account? <a href="registrazione.php">Registrati</a></p>
    </form>
</body>
</div>


</html>

<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $connessione = new mysqli('localhost', 'root', null, 'magazzino');
    $result = $connessione->query("select * from utenti where username = '$username' and password = '$password'");
    if ($result->num_rows == 1) {
        header("location: area-privata.php");
    } else {
        echo ("");
    }
}

?>