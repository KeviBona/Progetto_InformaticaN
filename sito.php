<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 
Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>caricamento dati</title>
</head>

<body>
<table border="0">
  <tr>
    <td align="center">Inserisci i dati richiesti</td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="post" action="input.php">
        <tr>
          <td>Nome</td>
          <td><input type="text" name="nome" size="20">
          </td>
        </tr>
        <tr>
          <td>Cognome</td>
          <td><input type="text" name="cognome" size="20">
          </td>
        </tr>
        <tr>
          <td>password</td>
          <td><input type="password" name="password" size="20">
          </td>
        </tr>
        <tr>
          <td>conferma la password</td>
          <td><input type="password" name="password1" size="20">
          </td>
        </tr>
        <tr>
          <td>Indirizzo</td>
          <td><input type="text" name="indirizzo" size="40">
          </td>
        </tr>
        <tr>
          <td></td>
          <td align="right"><input type="submit" 
          name="submit" value="Procedi"></td>
          <?php

 
        $var1= $_POST ["nome"];
        $var2= $_POST["cognome"];
        $var3= $_POST["password"];
        $var4= $_POST["password1"];
 
        if ($var3 == $var4){
            echo("Inserimento corretto!");
        }
        else
            echo("Ops! Inserimento errato");
    ?>
        </tr>
        </form>
        </table>
      </td>
    </tr>
</table>
</body>
</html>