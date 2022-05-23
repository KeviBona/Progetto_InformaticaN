<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
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
            width: 300;

        }
        
        form > input{
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
    cursor:pointer;
}
button{
    border-radius: 20px;
    padding: top 10px;
	margin-bottom: 10px;
    width: 100px;

}
label{
    color: white;
    display: flex;

}
p{
    color: white;
}
    </style> 
    
</head>
<body>
    <form action="php/register.php" method="POST">
        <br><br><br><br><br> 
    <h1> Registrati</h1>
    <br>
    <label for="email">Email</label>
    <input type="email"  name="email" id="email" required>
    <label for="username">Username</label>
    <input type="text"  name="username" id="username" required>
    <label for="password">Password</label>
    <input type="password"  name="password" id="password" required>
    <div>
    <input type="submit" value="invia">
    </div>
    <p>Hai gia' un account? <a href="login.html">Accedi</a></p>
    <button><a href="home.php">Home</button>

    </form>

    
</body>
