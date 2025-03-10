<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje konto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div id="logo"><span>C</span>atalogue</div>
    <nav>
        <a href="index.php" class="linknav">Powrót</a>
    </nav>
</header>

<main class="account">
    <!-- Logowanie -->
    <form id="loginForm" class="login" method="POST">
        <h2>Logowanie</h2>
        <input type="text" placeholder="Login" name="login">
        <input type="password" placeholder="Hasło" name="pass">
        <input type="submit" name="submitlogin" value="Zaloguj się" class="btn">
    </form>

    <!-- Rejestracja -->
    <form id="registerForm" class="signin hidden" method="POST">
        <h2>Rejestracja</h2>
        <input type="text" placeholder="Login" name="login">
        <input type="password" placeholder="Hasło" name="pass">
        <input type="password" placeholder="Powtórz hasło" name="pass2">
        <input type="submit" name="submitregister" value="Zarejestruj się" class="btn">
    </form>

    <?php
    session_start(); // Rozpoczęcie sesji
    include 'functions.php';
    $conn = mysqli_connect($a, $b, $c, $d);

    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }

    // Obsługa rejestracji
    if (isset($_POST['submitregister'])) {
        $login = trim($_POST["login"]);
        $password = trim($_POST["pass"]);
        $password2 = trim($_POST["pass2"]);

        // Sprawdzenie czy login istnieje
        $checkUser = "SELECT IdKlienta FROM accounts WHERE login = '$login'";
        $result = mysqli_query($conn, $checkUser);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Taki użytkownik już istnieje!');</script>";
        } elseif ($password !== $password2) {
            echo "<script>alert('Hasła nie zgadzają się!');</script>";
        } elseif (strlen($password) < 6) {
            echo "<script>alert('Hasło musi mieć co najmniej 6 znaków!');</script>";
        } else {
            // Haszowanie hasła
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO accounts (login, password, type) VALUES ('$login', '$hashed_password', '1')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Rejestracja zakończona sukcesem!'); location.href='index.php';</script>";
            } else {
                echo "<script>alert('Błąd rejestracji.');</script>";
            }
        }
    }

    // Obsługa logowania
    if (isset($_POST['submitlogin'])) {
        $login = trim($_POST["login"]);
        $password = trim($_POST["pass"]);

        $query = "SELECT IdKlienta, login, password, type FROM accounts WHERE login = '$login'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user'] = $login; // Zapisanie sesji użytkownika
                $_SESSION['userId'] = $row['IdKlienta']; // Zapisanie ID użytkownika
                $_SESSION['typeSession'] = $row['type']; // Zapisanie typu sesji

                // Ustawianie ciasteczek
                setcookie("typeSession", $row['type'], time() + 36000, "/"); // Ciasteczko na 10 godzin
                setcookie("username", $login, time() + 36000, "/"); // Ciasteczko na 10 godzin

                // Przekierowanie po zalogowaniu
                if ($row['type'] == 2) {
                    // Jeżeli to admin
                    echo "<script>alert('Zalogowano jako admin!'); location.href='index.php';</script>";
                } else {
                    // Jeżeli to zwykły użytkownik
                    echo "<script>alert('Zalogowano!'); location.href='index.php';</script>";
                }
            } else {
                echo "<script>alert('Nieprawidłowe hasło!');</script>";
            }
        } else {
            echo "<script>alert('Użytkownik nie istnieje!');</script>";
        }
    }

    mysqli_close($conn);
    ?>

    <button id="toggleAuthBtn" class="btnLogSign">Przełącz na rejestrację</button>
</main>

<script>
    document.getElementById("toggleAuthBtn").addEventListener("click", function() {
        var loginForm = document.getElementById("loginForm");
        var registerForm = document.getElementById("registerForm");

        if (loginForm.classList.contains("hidden")) {
            loginForm.classList.remove("hidden");
            registerForm.classList.add("hidden");
            this.textContent = "Przełącz na rejestrację";
        } else {
            loginForm.classList.add("hidden");
            registerForm.classList.remove("hidden");
            this.textContent = "Przełącz na logowanie";
        }
    });
</script>

</body>
</html>
