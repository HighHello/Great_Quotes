<?php
include '..\csvutil.php';
$param = $_GET['index'];
$arrayAuthor = csvToArray('..\authors.csv')[$param];
$arrayQuote = csvToArray('..\quotes.csv');

?>
<!doctype html>
<html>
    <body>
        <h1>Quotes by author <?= $arrayAuthor[0].' '.$arrayAuthor[1]?></h1>
        <?php
            if(isset($arrayQuote[0][0])){
            for($i = 0;$i<count($arrayQuote);$i++) {
                $line = $arrayQuote[$i];
                if ($line[0]==$param) {
                    echo $line[1];
                    
                }
            }
        }else echo "No quotes";
 
        ?>
    <br>
    <a href="delete.php?index=<?=$param?>"> Delete author</a><br>
    <a href="modify.php?index=<?=$param?>"> Modify author</a><br>
    <a href="./index.php"> Return</a>
    </body>
    
    
</html>