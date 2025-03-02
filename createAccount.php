<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje konto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="login" method="POST" action="index.php">
        <label>Podaj Login:<input type="text" name="login"></label>
        <label>Podaj Hasło:<input type="text" name="pass1"></label>
        <label>Potwierdź hasło:<input type="text" name="pass2"></label>
        <input type="submit" value="Zaloguj się">
    </form>

    <form class="signin" method="POST" action="index.php">
        <label>Podaj Login:<input type="text" name="newlogin"></label>
        <label>Podaj Hasło:<input type="text" name="newpass1"></label>
        <label>Potwierdź hasło:<input type="text" name="newpass2"></label>
        <input type="submit" value="Zarejestruj się">
    </form>
    <?php
        



    ?>

    
</body>
</html>