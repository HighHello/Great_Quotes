<?php
include '..\csvutil.php';
$param = $_GET['index'];
$arrayAuthor = csvToArray('..\authors.csv')[$param];
$arrayQuote = csvToArray('..\quotes.csv');

if (isset($_GET['option'])) {
    if ($_GET['option'] == "yes") {
        for ($index = 0; $index < count($arrayQuote); $index++) {
            if (isset($arrayQuote[$index][0])) {
                if ($arrayQuote[$index][0] == $param) {
                    deleteRecord('..\quotes.csv', $index);
                }
            }
        }

        
        deleteRecord('..\authors.csv', $param);
        echo '<script>confirm("Author and related quotes have been deleted");window.location.href = "../index.php";</script>';
    }
    if ($_GET['option'] == "no") {
        echo '<script>confirm("Quote will not be deleted"); window.location.href = "index.php";</script>';
    }
}
?>
<!doctype html>
<html>

<body>
    <h1>Are you sure you want to delete author:</h1>
    <h2>
        <?= $arrayAuthor[0] . " " . $arrayAuthor[1]?>
    </h2>
    <h3>This will also delete all the quotes:</h3>
    <?php
if (isset($arrayQuote[0][0])) {
    for ($i = 0; $i < count($arrayQuote); $i++) {
        $line = $arrayQuote[$i];
        if ($line[0] == $param) {
            echo $line[1];

        }
    }
}
else
    echo "No quotes<br>";
?>


    <a href="delete.php?index=<?= $param?>&option=yes">YES</a><br>
    <a href="delete.php?index=<?= $param?>&option=no">NO</a>
</body>

</html>