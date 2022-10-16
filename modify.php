<?php
include 'csvutil.php';
$param = $_GET['index'];
if (isset($_GET['option'])) {
    if ($_GET['option'] == "yes") {
        echo '<script>confirm("Quote has been deleted");window.location.href = "index.php";</script>';
    }
    deleteRecord('authors.csv', [$param]);
    deleteRecord('quotes.csv', [$param]);
    if ($_GET['option'] == "no") {
        echo '<script>confirm("Quote will not be deleted"); window.location.href = "index.php";</script>';
    }
}
$arrayAuthor = csvToArray('authors.csv');
$arrayQuote = csvToArray('quotes.csv');
$author = csvToArray('authors.csv')[$param];
$quote = csvToArray('quotes.csv')[$param];

?>
<!doctype html>
<html>

<body>
    <h1>Modify quote:</h1>


    <form action="" method="post">

        <b>Original quote:
            <?= $quote[1]?>
        </b><br>
        Change to: <input type="text" name="quote" id="quote"><br><br>
        <b>Original author:
            <?= $author[0] . " " . $author[1]?>
        </b><br>
        <label for="author">Choose an author:</label>
        <select name="author" id="author">
        <?php
            for ($id = 0; $id < count($arrayAuthor); $id++) {
                $author = $arrayAuthor[$id];
                echo ('<option value=' . $id . '>' . $author[0] . ' ' . $author[1] . '</option>');
            }

            ?>
        </select>
        <input type="submit">
    </form>


</body>

</html>