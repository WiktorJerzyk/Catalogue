<?php include 'functions.php'; session_start();
    

    if(isset($_POST['editThis'])){
        $forCookie = $_POST['editThis'];
        $_SESSION["idOfInterest"] = $_POST['editThis'];
    }
    else{
        $forCookie=0;
    }
    setcookie("whatId",$_SESSION["idOfInterest"],time()+3600,"/");

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDYTOR SZABLONÓW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div id="logo"><span>C</span>atalogue</div>
        <nav>
            <a href="index.php" class="linknav">Powrót</a>
                


            <?php 
            
            userHandler($_SESSION['typeSession'])?>
        </nav>
        
    </header>

<main>
   <section>
   <h2>Kod HTML</h2>
        <article>
            <form method="POST">
                    <textarea class="bigInput" name="htmlContent">

                    <?php 
                    
                    $hconn = mysqli_connect($a,$b,$c,$d);
                    mysqli_set_charset($hconn, "utf8mb4");

                    if (!$hconn) {
                        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                    }
                    if(isset($_POST['editThis'])){
                        $whatId = $_POST['editThis'];
                    }
                    else{
                        //Z ciasteczka Id które po odświeżeniu może zniknąć z POSTA :(
                        $whatId = $_COOKIE['whatId'];
 
                    }
                    $htmlgetquery = "SELECT TemplateHtml FROM template WHERE IdTemplate = $whatId";

                    $html = mysqli_query($hconn, $htmlgetquery);

                    $row=mysqli_fetch_row($html);

                    

                    $htmlValue = htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8');

                    echo "$htmlValue ";

                
                    
                    ?>
                    </textarea>

                

                
                    <input type="submit" value="Zapisz" name="htmlSave">
                
            </form>
            <?php
                if(isset($_POST['htmlSave'])){
                    $newHtml = $_POST['htmlContent'];
                    
                    $htmlPostQuery = "UPDATE `template` SET `TemplateHtml`='$newHtml' WHERE IdTemplate=$whatId";
                    
                    mysqli_query($hconn,$htmlPostQuery);

                    mysqli_close($hconn);
                    header("Refresh:0");

                }
            ?>
        </article>
    <h2>Kod CSS</h2>
        <article>
            <form method="POST">
            
                
                <textarea name="cssContent" class="bigInput">

                <?php 
                    
                    $cconn = mysqli_connect($a,$b,$c,$d);
                    mysqli_set_charset($cconn, "utf8mb4");

                    if (!$cconn) {
                        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
                    }
                    if(isset($_POST['editThis'])){
                        $whatId = $_POST['editThis'];
                    }
                    else{
                        //Z ciasteczka Id które po odświeżeniu może zniknąć z POSTA :(
                        $whatId = $_COOKIE['whatId'];
 
                    }
                    $htmlgetquery = "SELECT TemplateStyle FROM template WHERE IdTemplate = $whatId";
                    

                    $css = mysqli_query($cconn, $htmlgetquery);

                    $row=mysqli_fetch_row($css);

                    

                    $cssValue = htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8');

                    echo "$cssValue ";

                
                    
                    ?>
                </textarea>

                <input type="submit" value="Zapisz" name="cssSave">
             
            </form>
            <?php
                if(isset($_POST['cssSave'])){
                    $newCss = $_POST['cssContent'];
                    
                    $cssPostQuery = "UPDATE `template` SET `TemplateStyle`='$newCss' WHERE IdTemplate=$whatId";
                    
                    mysqli_query($cconn,$cssPostQuery);

                    mysqli_close($cconn);
                    header("Refresh:0");

                }
            ?>
        </article>
    </section>
    


</main>
    
</body>
</html>