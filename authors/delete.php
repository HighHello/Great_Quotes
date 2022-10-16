<?php
include '..\csvutil.php';
$param = $_GET['index'];
$arrayAuthor = csvToArray('..\authors.csv')[$param];
$arrayQuote = csvToArray('..\quotes.csv');

if(isset($_GET['option'])){
    if($_GET['option']=="yes"){
    echo '<script>confirm("Quote has been deleted");window.location.href = "index.php";</script>';}
    deleteRecord('..\quotes.csv',[$param]);

    for($index = 0; $index<count($arrayQuotes);$index++) {
        if($arrayQuot[$index][0]==$param){
            deleteRecord('..\quotes.csv',[$index]);
        }
    }
    deleteRecord('..\author.csv',[$param]);
    echo '<script>confirm("Author and related quotes have been deleted");window.location.href = "../index.php";</script>';

    if($_GET['option']=="no"){
    echo '<script>confirm("Quote will not be deleted");window.location.href = "index.php";</script>';
    }
}
?>
<!doctype html>
<html>
    <body>
        <h1>Are you sure you want to delete author:</h1>
        <h2><?= $arrayAuthor[0]." ".$arrayAuthor[1]?></h2>
        <h3>This will also delete all the quotes:</h3>
        <?php
            foreach ($arrayQuote as $line) {
                if($line[0]==$param){
                    echo '<h2>'.$line[1].'</h2><br>';
                }
            }
        ?>


        <a href="delete.php?index=<?=$param?>&option=yes">YES</a><br>
        <a href="delete.php?index=<?=$param?>&option=no">NO</a>
    </body>
</html>