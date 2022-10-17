<?php
include '..\csvutil.php';
$arrayAuthor = csvToArray('..\authors.csv');
$arrayQuote = csvToArray('..\quotes.csv');
//print_r($arrayQuote);



if (!empty($_POST)){
    $first = $_POST["first"];
    $last = $_POST["last"];
    newRecord('..\author.csv',array($first,$last));
    echo '<script>confirm("Author has been created");window.location.href = "index.php";</script>';
}


?>

<!doctype html>
<html>
<head>

</head>

<body>
<h1>Create author</h1>

<form action="" method="post">
Author first name: <input type="text" name="first" id ="first"><br>
Author last name: <input type="text" name="last" id ="last"><br>
<input type="submit">
</form>

</body>

</html>