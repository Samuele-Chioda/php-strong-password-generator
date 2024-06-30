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
            <button class="button-85 submit" role="button">Login</button>
        </form>
        <?php
        //messaggio di errore se il metodo di richiesta è POST e $loginSuccess è false
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$loginSuccess) {
                echo '<p>Accesso negato. <br> Riprova.</p>';
            }
        }
        ?>
    </div>
</body>

</html>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    div {
        padding: 5rem;
        background-color: lightblue;
        display: flex;
        justify-content: center;
        height: 100vh;
    }

    p {
        margin: 1rem;
        color: red;
        font-size: 1.2rem;
        font-weight: bold;
    }

    form {
        font-size: 2rem;
        font-weight: bolder;
    }

    .button-85 {
        padding: 0.6em 2em;
        border: none;
        outline: none;
        color: rgb(255, 255, 255);
        background: #111;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-85:before {
        content: "";
        background: linear-gradient(45deg,
                #ff0000,
                #ff7300,
                #fffb00,
                #48ff00,
                #00ffd5,
                #002bff,
                #7a00ff,
                #ff00c8,
                #ff0000);
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        -webkit-filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing-button-85 20s linear infinite;
        transition: opacity 0.3s ease-in-out;
        border-radius: 10px;
    }

    @keyframes glowing-button-85 {
        0% {
            background-position: 0 0;
        }

        50% {
            background-position: 400% 0;
        }

        100% {
            background-position: 0 0;
        }
    }

    .button-85:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #222;
        left: 0;
        top: 0;
        border-radius: 10px;
    }
</style>