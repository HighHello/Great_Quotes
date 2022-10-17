<?php
include 'csvutil.php';
$arrayAuthor = csvToArray('authors.csv');
$arrayQuote = csvToArray('quotes.csv');
//print_r($arrayQuote);

?>

<!doctype html>
<html>

<head>
<title>Greate quotes</title>
</head>

<body>
    <h1>List of quotes</h1>
    
    <?php
     if(!is_logged())echo '<a href="auth/signin.php">Login</a><br>';
     else echo '<a href="/auth/signout.php">Logout</a><br>';
        if (isset($arrayQuote[0][0])) {
            for($i = 0;$i<count($arrayQuote);$i++) {
                $line = $arrayQuote[$i];
                if (isset($line)) {
                    $string = $line[1] . " - " . $arrayAuthor[$line[0]][0] . " " . $arrayAuthor[$line[0]][1];
                    echo ('<a href ="./quotes/detail.php?index=' . $i . '">' . $string . '</a></br></br>');
                }
            }
        }
        else
            echo "There are no quotes to show";


    ?>
    <br>
   
    <a href="./authors/index.php"> Author list</a><br>
    <a href="./quotes/index.php"> Quote list</a><br>
    <a href="./quotes/create.php"> Create Quote</a><br>

   

</body>

</html>