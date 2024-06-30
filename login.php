<?php
session_start();

// Recupero dati dal form. l'operatore (??) da una stringa vuota se la chiave non esiste altrimeti ho errori in pagina!!
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

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

$loginSuccess = false;

// Itero attraverso array di utenti per verificare credenziali
foreach ($utenti as $utente) {
    if ($utente['nome'] == $username && $utente['password'] == $password) {
        // Se c'è uguaglianza, imposto variabile di sessione e reindirizzo a index.php
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    }
}

// Se il metodo di richiesta è POST, imposto $loginSuccess su false per indicare che il login è fallito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginSuccess = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <?php
        //messaggio di errore se il metodo di richiesta è POST e $loginSuccess è false
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$loginSuccess) {
                echo '<p>Accesso negato. Riprova.</p>';
            }
        }
        ?>
    </div>
</body>

</html>