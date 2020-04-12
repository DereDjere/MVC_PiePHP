<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php 
    /* session_start(); */
    echo $_SESSION['email'] ?></h1>
    <form action="/SC_Project/Project/MVC_PiePHP/user/updatepage">
    <button type="submit">Modifier</button>
    </form>
    <form action="/SC_Project/Project/MVC_PiePHP/disconnected">
    <button type="submit">Disconnect</button>
    </form>
    
    
</body>
</html>