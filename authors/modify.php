<?php
include '..\csvutil.php';
$param = $_GET['index'];
$arrayAuthor = csvToArray('..\authors.csv');
$arrayQuote = csvToArray('..\quotes.csv');
$author = csvToArray('..\authors.csv')[$param];

if (!empty($_POST)) {
    $first = $_POST["first"];
    $last = $_POST["last"];
    modifyAtIndex('..\authors.csv', array($first, $last), $param);
    echo '<script>confirm("Author has been modified");window.location.href = "index.php";</script>';
}




?>
<!doctype html>
<!doctype html>
<html>

<head>

</head>

<body>
    <h1>Modify Author <?= $author[0]." ".$author[1]?></h1>

    <form action="" method="post">
        Author first name (<?= $author[0]?>): <input type="text" name="first" id="first"><br>
        Author last name (<?= $author[1]?>): <input type="text" name="last" id="last"><br>
        <input type="submit">
    </form>

</body>

</html>

</html>