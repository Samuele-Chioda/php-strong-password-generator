<?php


$utenti = [
    [
        'nome' => 'utenteUno',
        'password' => 'passwordUno'
    ],
    [
        'nome' => 'utenteDue',
        'password' => 'passwordDue'
    ],
    [
        'nome' => 'utenteTre',
        'password' => 'passwordTre'
    ]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="./index.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>