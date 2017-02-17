<?php
session_start();
echo "<form>";
/*

if the first letter is a:

C : Clubs
H : Hearts
D : Dimond
S : Spades

The second letter/number will dictate the card of the suite




*/

array ($masterlist =  ['CA', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'CJ', 'CK', 'CQ',
                       'HA', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10', 'HJ', 'HK', 'HQ',
                       'DA', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10', 'DJ', 'DK', 'DQ',
                       'SA', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'SJ', 'SK', 'SQ']);

/*
if (isset($_SESSION['shuffledDeck'])){
    if (isset($_GET['Shuffle'])) {
        shuffle($masterlist);
        $_SESSION['shuffledDeck'] = ($masterlist);
    }
    else {

    }
}

*/
?>

<input type="submit" value = "Shuffle" name = "action">

<input type="submit" value = "Start" name = "action">

<input type="submit" value = "Hit" name = "action">

<input type="submit" vaule = "Pass" name = "action">
<?php

$shuffled = array([]);

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'Shuffle':
            shuffle($masterlist);
            $_SESSION['shuffledDeck'] = ($masterlist);
            break;
        case 'Start':

            break;
    }
}






/*
if (isset($_GET)){
    if (!isset($_SESSION['shuffledDeck'])) {
        shuffle($masterlist);
        $_SESSION['shuffledDeck'] = ($masterlist);
    }
    else{

    }
}
*/
var_dump($_SESSION['shuffledDeck']);
echo "</form>";
#var_dump ($masterlist);



