<?php
include '..\csvutil.php';
$arrayAuthor = csvToArray('..\authors.csv');
$arrayQuote = csvToArray('..\quotes.csv');
//print_r($arrayQuote);



if (!empty($_POST)){
    $quote = $_POST["quote"];
    $author = $_POST["author"];
    newRecord('..\quotes.csv',array($author,$quote));
    echo '<script>confirm("Quote has been created");window.location.href = "index.php";</script>';
}


?>

<!doctype html>
<html>
<head>

</head>

<body>
<h1>List of quotes</h1>

<form action="" method="post">
Quote: <input type="text" name="quote" id ="quote"><br>

<label for="author">Choose an author:</label>
<select name="author" id="author">
<?php
for($id=0;$id<count($arrayAuthor);$id++){
    $author = $arrayAuthor[$id];
    
    echo('<option value='.$id.'>'.$author[0].' '.$author[1].'</option>');
}

?>
</select>

<input type="submit">
</form>

</body>

</html>