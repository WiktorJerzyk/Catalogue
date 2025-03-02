<?php 
    $a="127.0.0.1"; //Server address
    $b="root"; //server user
    $c=""; //user password
    $d="catalogue"; //database
    
    session_start();
    
    //Ciasteczko, które sprawdza kto był ostatnio zalogowany, narazie utworzę je tutaj
    setcookie("typeSession","1",time()+36000,"/");
    setcookie("username","Wiktor",time()+36000,"/");
    //Typ sesji 0 - niezalogowany
    //typ sesji 1 - zalogowany wcześniej
    //typ sesji 2 - admin

    if(isset($_COOKIE['typeSession'])){
        $_SESSION['typeSession']=$_COOKIE['typeSession'];
    }
    else{
        $_SESSION['typeSession']=0;
    }

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



        //Admin - narazie pominę
    }


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATALOGUE</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <header>
        <div id="logo"><span>C</span>atalogue</div>
        <nav>
            <a href="" class="linknav">Zacznij tworzyć</a>
                
            <a href="" class="linknav">Panel projektów</a>

            <?php userHandler($_SESSION['typeSession'])?>
        </nav>
        
    </header>
    <main>
        <section class="row-1">
            <section>
                <h1>Czym jest Catalogue?</h1>
                <article>
                    Catalogue to interaktywne narzędzie, które umożliwia tworzenie własnych stron.
                    Strony stworzone za pomocą Catalogue, pozwalają na przejżyste przechowywanie plików, linków i wielu innych rzeczy.

                </article>
            </section>
        
            <section>
                <h1>Pierwsze kroki</h1>
                <article>
                    Obsługa programu jest prosta. Kreator znajdujący się pod zakładką "Zacznij tworzyć" w intuicyjny sposób pozwala szybko i sprawnie stworzyć twój własny katalog.

                </article>
            </section>

            <section>
                <h1>Wygoda</h1>
                <article>
                    Twoje wszystkie stronki są przechowywane u nas. Gdy stwierdzisz że wszystko jest już gotowe, wystarczy że klikniesz w panel projektów i wyeksportujesz swój katalog.
                </article>
            </section>

        </section>

        <section class="row-2">
            <h1>Szablony</h1>
            <article>Zanim zaczniesz tworzyć, sprawdź który szablon pasuje najlepiej do twojego katalogu:</article>
            <article id="templateContainer">
                <?php


                    function templateShow($templateId,$a,$b,$c,$d){
                        $tconn = mysqli_connect($a,$b,$c,$d);
                        mysqli_set_charset($tconn, "utf8mb4");

                    if (!$tconn) {
                        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                    }

                    $result = mysqli_query($tconn, "SELECT * FROM template WHERE IdTemplate=$templateId");
                    $row=mysqli_fetch_row($result);
                    $file = fopen("index$templateId.html",'w');
                    fwrite($file,
                    '<html><head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Tamplate</title>
                        <style>'.$row[2].'</style>
                    </head>'.'<body>'.$row[1].'</body></html>'
                );
                    
                    echo "<div class='templateExample'>";
                    echo "<iframe src='index$templateId.html' ></iframe>";
                    echo "<div class=iframeHover>
                        <form method='post'>
                            <button type='submit' name='pickBtn$templateId' id='pickBtn$templateId' class='pick'>Wybierz</button>
                        </form>
                        
                        <button type='submit' id='showkBtn$templateId' onclick='fullScreenShow($templateId)'  class='show'>Podgląd</button>
                        
                    </div>";
                    echo "</div>";
                   
            }
    

            templateShow(1,$a,$b,$c,$d);
            templateShow(2,$a,$b,$c,$d);
            templateShow(3,$a,$b,$c,$d);
                ?>
            </article>
        </section>
    
           
    

    </main>
    <footer>

    </footer>

    <div class='bg' id="bg">
            
            
    </div>
</body>
<script>
function fullScreenShow(x){
    let newIframe = document.createElement("iframe");
    document.getElementById("bg").style.display="flex";
    document.getElementById("bg").style.height="100%";
    document.getElementById("bg").style.width="100%";
    newIframe.src="index"+x+".html";
    newIframe.id="tempChild";
    
    document.getElementById("bg").appendChild(newIframe);
}


bg.addEventListener("click",function (){
    document.getElementById("tempChild").remove();   
    document.getElementById("bg").style.display="none";
    document.getElementById("bg").style.height="0%";
    document.getElementById("bg").style.width="0%";
})
</script>
</html>