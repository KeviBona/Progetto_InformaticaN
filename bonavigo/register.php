<?php

require_once('config.php');

$email = $connesione->real_escape_string($_POST['email']);
$username = $connesione->real_escape_string($_POST['username']);
$password = $connesione->real_escape_string($_POST['password']);

$sql = "INSERT INTO utenti (email, username, password) VALUES ('$email', '$username', '$password')";
if($connesione->query($sql) === true){
    echo "Registrazione effettuata con successo!";
}else{
    echo "Errore durante la registrazione utente $sql. " . $connesione->error;
}

?>
