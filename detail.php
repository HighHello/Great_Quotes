<?php
include 'csvutil.php';
$param = $_GET['index'];
$arrayQuote = csvToArray('quotes.csv')[$param];
$arrayAuthor = csvToArray('authors.csv')[$arrayQuote[0]];


?>
<!doctype html>
<html>
    <body>
        <h1><?= $arrayQuote[1]?></h1>
        <h2>- <?= $arrayAuthor[0]." ".$arrayAuthor[1]?></h2>
        <br>
        <a href="delete.php?index=<?=$param?>">DELETE QUOTE</a><br>
        <a href="modify.php?index=<?=$param?>">MODIFY QUOTE</a>
    </body>
</html>