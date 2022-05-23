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