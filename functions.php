<?php
    $a="127.0.0.1"; //Server address
    $b="root"; //server user
    $c=""; //user password
    $d="catalogue"; //database
function userHandler($typeSession){
        //Pierszy raz na stronie
        if($typeSession==0){
            echo '<a href="createAccount.php" class="linknav">Zaloguj się</a>';
        }
        else{
            $username=$_COOKIE['username'];
        }

        //Zalogowany kiedyś
        if($typeSession==1){
            echo "<a href='accountPanel' class='linknav'>Cześć! $username
                
            </a>";
        }
        if($typeSession==2){
            echo "Admin";
        }



        //Admin - narazie pominę
    }



    ?>