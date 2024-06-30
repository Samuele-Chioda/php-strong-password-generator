<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session Login</title>
</head>

<body>
    <div>
        <h1>Accesso Consentito!</h1>
        <h2>
            <?php

            session_start();

            // isset ontrolla che la variabile username sia impostata!!!
            if (isset($_SESSION['username'])) {
            } else {
                // Se non è impostata, rimando utente a pagina di login
                header('Location: login.php');
                exit();
            }
            echo "Benvenuto, " . $_SESSION['username'] . '!';
            
            ?>
        </h2>
    </div>
</body>

</html>

<style>
    body {
        background-color: red;
    }

    div {
        padding: 5rem;
        background-color: lightblue;
        display: flex;
        justify-content: center;
        height: 100vh;
        font-size: 2rem;
        font-weight: bolder;
        flex-direction: column;
        align-items: center;
    }
</style>