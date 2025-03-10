<?php
session_start();

// Usuwanie danych z sesji
session_unset();

// Zamykanie sesji
session_destroy();

// Usuwanie ciasteczek, jeśli istnieją
if (isset($_COOKIE['typeSession'])) {
    setcookie("typeSession", "", time() - 3600, "/"); // Usuwanie ciasteczka
}
if (isset($_COOKIE['username'])) {
    setcookie("username", "", time() - 3600, "/"); // Usuwanie ciasteczka
}

// Przekierowanie użytkownika na stronę główną
header("Location: index.php");
exit();
?>
