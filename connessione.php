<?php
try
{
    $connection = new mysqli("localhost", "root", null);
    if($connection->query("CREATE DATABASE IF NOT EXISTS Magazzino") == TRUE)
    {
        echo("Database Magazzino creato correttamente");
    }
    else
    {
        echo("Errore nella creazione db: ".$connection->error);
    }

    $connection->close();

    #$connection->query("USE Magazzino");
    $connection = new mysqli("localhost", "root", null, "Magazzino");

    if($connection->query('CREATE TABLE Utenti(id int auto_increment PRIMARY KEY, username varchar(20) NOT NULL, password varchar(20) NOT NULL)') == TRUE)
    { 
        
        echo(" Tabella Utenti creata correttamente");
    }
    else
    {
        echo(" Errore nella creazione della tabella Utenti: ".$connection->error);
    }

    if($connection->query('CREATE TABLE Articoli(id int auto_increment PRIMARY KEY, descrizione varchar(20) NOT NULL, quantita int, prezzo double(6,2))') == TRUE)
    {
        echo(" Tabella Articoli creata correttamente");
    }
    else
    {
        
        echo(" Errore nella creazione della tabella Articoli: ".$connection->error);
    }

    $connection->close();
}
catch (Exception $ex)
{
    echo($ex);
}
?>