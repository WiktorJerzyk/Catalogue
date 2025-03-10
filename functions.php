<?php
    $a="127.0.0.1"; //Server address
    $b="root"; //server user
    $c=""; //user password
    $d="catalogue"; //database
    function userHandler($typeSession) {
        // Pierwszy raz na stronie
        if ($typeSession == 0) {
            echo '<a href="Account.php" class="linknav">Zaloguj się</a>';
        } else {
            // Pobieramy nazwę użytkownika z ciasteczka
            $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : 'Użytkownik';
        }
    
        // Zalogowany wcześniej
        if ($typeSession == 1) {
            echo "<div class='drop'>
                    <button class='usrbtn'>$username</button>
                    <div class='drop-content'>
                        <a href='accountPanel.php' class='linknav'>Panel użytkownika</a>
                        <a href='logout.php' class='linknav'>Wyloguj się</a>
                    </div>
                  </div>";
        }
        
        // Typ sesji 2 - Admin
        if ($typeSession == 2) {
            echo "<div class='drop'>
                    <button class='usrbtn'>Witaj, Adminie</button>
                    <div class='drop-content'>
                        <a href='logout.php' class='linknav'>Wyloguj się</a>
                    </div>
                  </div>";
        }
    }
    



    ?>