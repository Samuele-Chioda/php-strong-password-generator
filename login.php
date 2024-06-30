<?php
session_start();


$username = $_POST['name'];
$password = $_POST['password'];

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

foreach ($utenti as $utente) {
    if ($utente['nome'] == $username && $utente['password'] == $password) {
        $_SESSION['username'] = $username;
        header('location: index.php');
        exit();
    }
}

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
        <form action="./login.php" method="post">
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