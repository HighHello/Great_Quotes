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
        if (isset($arrayAuthor[0][0])) {
            for($i = 0;$i<count($arrayAuthor);$i++) {
               
                    $string = $arrayAuthor[$i][0] . " " . $arrayAuthor[$i][1];
                    echo ('<a href ="detail.php?index=' . $i . '">' . $string . '</a></br></br>');
                
            }
        }
        else
            echo "There are no authors to show";


    ?>
    <a href="../index.php"> Return to index</a>

</body>

</html>