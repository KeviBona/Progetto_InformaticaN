<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 14 Sistema di Login</title>
    <style>
        h1{
            color: yellow;
            size: 30px;
        }
        body {
            display : flex;
            justify-content: center;
            background-image: url(sfondo.jpg);
             }
        div{
            color: white;
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        
        form > input{
            margin-bottom: 20px;
            border-radius: 10px; 
        } 
        input { 
	font: 20px 'Open Sans', sans-serif;
    border: px;
    padding: 2px;
    display: block;
    width: 96%; 
    cursor:pointer;
}
button{
    border-radius: 10px;
    padding: top 10px;
	margin-bottom: 10px;
    width: 100px;
    top: 50px;
    left: 50px;
}
    </style> 
</head>
<body>
    <form action=""></form>
    <h2> Accedi</h2>
    <label for="username">Username</label>
    <input type="text"  name="username" id="username" required>
    <label for="password">Password</label>
    <input type="password"  name="password" id="password" required>
    <input type="submit" value="invia">
    <p>Non hai ancora un account? <a href="prova1.php">Registrati</a></p>
    </form>


    <?php

require_once('config.php');

$username = $connesione->real_escape_string($_POST['username']);
$password = $connesione->real_escape_string($_POST['password']);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $sql_select ="SELECT * From utenti WHERE username = '$username'";
    if($result = $connessione->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();

                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['loggato'] = true;

                header("location: ../area-privata.php"); 
            }else{
                echo"la password non e' corretta";

            }else{
                echo "non ci sono account con questo username";
            }
        
        }else{
            echo "Errore in fase di login";
        }
        $connesione->close();
        
    }
}

    
</body>