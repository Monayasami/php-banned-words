<?php 

$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : null;
$search = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : null;
$censoredMessage = str_replace($search, '***', $message);
$counterCensoredWords = ($search !== '') ? substr_count($message, $search) : 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censura Parole</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
        }
        textarea, input, button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Censura parole</h1>
    <form action="file.php" method="GET">

        <label for="texta-area">Inserisci il testo:</label>
        <textarea id="texta-area" name="message" rows="5" cols="40"></textarea>
        <br>

        <label for="search-string">Parola da censurare:</label>
        <br>
        <input type="text" id="search-string" name="search">

        <button type="submit">Censura</button>
    </form>    

    <?php 
        if ($_GET['message'] !== null && $_GET['search'] !== null) {
            echo <<<CENSORED
            <p><strong>Censored message</strong>: $censoredMessage</p>
            <p><strong>Counter</strong>: $counterCensoredWords</p>
            CENSORED;
        }
    ?>
</body>
</html>
