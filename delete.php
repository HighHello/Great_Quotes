<?php
include 'csvutil.php';
$param = $_GET['index'];
if(isset($_GET['option'])){
    if($_GET['option']=="yes"){
    echo '<script>confirm("Quote has been deleted");window.location.href = "index.php";</script>';}
    deleteRecord('authors.csv',[$param]);
    deleteRecord('quotes.csv',[$param]);
    if($_GET['option']=="no"){
    echo '<script>confirm("Quote will not be deleted");window.location.href = "index.php";</script>';
    }
}
$arrayAuthor = csvToArray('authors.csv')[$param];
$arrayQuote = csvToArray('quotes.csv')[$param];

?>
<!doctype html>
<html>
    <body>
        <h1>Are you sure you want to delete quote:</h1>
        <h2><?= $arrayQuote[1]?></h2>
        <h2>- <?= $arrayAuthor[0]." ".$arrayAuthor[1]?></h2>
        <br>
        <a href="delete.php?index=<?=$param?>&option=yes">YES</a><br>
        <a href="delete.php?index=<?=$param?>&option=no">NO</a>
    </body>
</html>