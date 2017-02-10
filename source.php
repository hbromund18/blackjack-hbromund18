<?php
session_start();
/*

if the first letter is a:

C : Clubs
H : Hearts
D : Dimond
S : Spades

The second letter/number will dictate the card of the suite




*/

$shuffled = array([]);
array ($masterlist =  ['CA', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'CJ', 'CK', 'CQ',
                       'HA', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10', 'HJ', 'HK', 'HQ',
                       'DA', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10', 'DJ', 'DK', 'DQ',
                       'SA', 'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'SJ', 'SK', 'SQ']);

#var_dump ($masterlist);


function shuffler ($masterlist){
    shuffle($masterlist);
    #var_dump ($masterlist);
    $_SESSION['shuffledDeck'] = $masterlist;

}

function start($masterlist){
    shuffler ($masterlist);
}

start ($masterlist);

var_dump($_SESSION['shuffledDeck']);

