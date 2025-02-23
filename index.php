<?php 
    $a="127.0.0.1"; //Server address
    $b="root"; //server user
    $c=""; //user password
    $d="catalogue"; //database
    


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

            <a href="" class="linknav">User</a>
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
            <article>
                

                <!--Narazie style do nich będą w plikach styl1.css, potem styl będzie dodawany z bazy danych, 
                tak samo jak cały szablonik-->
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
                    echo "<iframe src='index$templateId.html' width='600' height='400'></iframe>";
                   
            }

            templateShow(1,$a,$b,$c,$d);
                ?>
            </article>
        </section>
    
           
    

    </main>
    <footer>

    </footer>
</body>
</html>