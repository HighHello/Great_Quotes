<?php
 
 //we use PHP built in fgetcsv method.
 //We check a few conditions and turn blank lines into empty arrays to avoid NULLs when converting from array back to csv
//csvToArray() takes url, reads file referenced by url and returns array
 function csvToArray($csvFile){
 
    $file_to_read = fopen($csvFile, 'r');
 
    while (!feof($file_to_read) ) {
        $result = fgetcsv($file_to_read, 1000, ',');
        if(array(null)!==$result){
            $lines[] = $result;
        }
        else $lines[] = array("");
 
    }
    fclose($file_to_read);
    return $lines;
}
//we use PHP build in method fputcsv, but it doesn't work well with empyty arrays so we use fwrite() and format our own csv instead
//arrayToCsv() takes url, reads file referenced by url and returns array
function arrayToCsv($csvFile, $array){  
    // Open a file in write mode ('w')
    $fp = fopen($csvFile, 'w');
    // Loop through file pointer and a line
    for($j=0;$j<count($array);$j++) {
        $fields = $array[$j];
            for($i=0;$i<count($fields);$i++){
                if($i!=count($fields)-1){
                fwrite($fp,$fields[$i].',');
                }else fwrite($fp,$fields[$i]);
            }
        
        if($j<count($array)-1){
            fwrite($fp,PHP_EOL);#we do not create new line if all data has already been written.
        }
    }

    
    fclose($fp);
}

//Takes url and index and returns the line of the file referenced by the index. File must be formated csv
function csvAtIndex($csvFile,$index){
    $array = csvToArray($csvFile);
    return $array[$index];
}
//adds new record in the form of a new line in a csv file
function newRecord($csvFile,$recordArray){
    $array = csvToArray($csvFile);
    if($array[0]==0)$array = array($recordArray);
    else 
    array_push($array,$recordArray);
    //print_r($array);
    arrayToCsv($csvFile,$array);
}

//Modifies a line in a csv file
function modifyAtIndex($csvFile,$recordArray,$index){
    $array = csvToArray($csvFile);
    $array[$index] = $recordArray;
    //print_r($array);
    arrayToCsv($csvFile,$array);
}

//clears a line in a csv file, line is left blank

function clearRecord($csvFile,$index){
    $array = csvToArray($csvFile);
    $array[$index] = array("");
    //print_r($array);
    arrayToCsv($csvFile,$array);
}

//delets a line in a csv file, line is filled in with next line.
//This is problematic if we were to delete from author as author does not have seperate index that refers to their quotes as per specification.

function deleteRecord($csvFile,$index){
    
    $array = csvToArray($csvFile);
    unset($array[$index]);#this does not change the indexs of the array, as such, we reorder the indexes of the array as well
    $array = array_values($array);
    //print_r($array);
    arrayToCsv($csvFile,$array);
}
//print_r(csvToArray('authors.csv'));
//deleteRecord('quotes.csv',0);



?>