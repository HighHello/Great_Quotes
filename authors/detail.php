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
            foreach ($arrayQuote as $line) {
                if($line[0]==$param){
                    echo '<h2>'.$line[1].'</h2><br>';
                }
            }
        ?>
    <a href="delete.php?index=<?=$param?>"> Delete author</a>
    </body>
    <a href="./index.php"> Return</a>
    
</html>