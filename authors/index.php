<?php
include '..\csvutil.php';
$arrayAuthor = csvToArray('..\authors.csv');
$arrayQuote = csvToArray('..\quotes.csv');
//print_r($arrayQuote);

?>

<!doctype html>
<html>

<head>

</head>

<body>
    <h1>List of authors</h1>
    <?php
        if (isset($arrayQuote[0][0])) {
            foreach ($arrayQuote as $line) {
                if (isset($line)) {
                    $string =$arrayAuthor[$line[0]][0] . " " . $arrayAuthor[$line[0]][1];
                    echo ('<a href ="./detail.php?index=' . $line[0] . '">' . $string . '</a></br></br>');
                }
            }
        }
        else
            echo "There are no quotes to show";


    ?>
    <a href="../index.php"> Return to index</a>

</body>

</html>