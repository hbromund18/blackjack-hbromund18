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

    </br >

Welcome to BlackJack, press start to begin a new game.
    </br >

    </br >

    </br >

    <input type="submit" value = "Start" name = "action">

    &nbsp &nbsp &nbsp &nbsp

    <input type="submit" value = "Shuffle" name = "action">

    &nbsp &nbsp &nbsp &nbsp







    </br >

    </br >

<?php

$shuffled = array([]);

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'Shuffle':
            shuffle($masterlist);
            $_SESSION['shuffledDeck'] = ($masterlist);
            break;
        case 'Start':
            $_SESSION['dealNumber'] = 0;
            $_SESSION['shuffledDeck'] = $masterlist;
            $_SESSION['playerHand'] = [];
            shuffle($_SESSION['shuffledDeck']);

            ?> Your two starting cards are: &nbsp<?php
            $card1 = DEAL();
            echo cardText($card1);
            array_push($_SESSION['playerHand'], $card1);
            ?> &nbsp <?php
            $card1 = DEAL();
            echo cardText($card1);
            array_push($_SESSION['playerHand'], $card1);
            #var_dump ($_SESSION['playerHand']);
            echo "</br >";
            echo "</br >";
            $_SESSION['dealerHand'] = [];
            echo "The dealers revealed card is: ";
            $card1 = DEAL();
            echo cardText($card1);
            array_push($_SESSION['dealerHand'], $card1);
            $card1 = DEAL();
            array_push($_SESSION['dealerHand'], $card1);
            echo "</br >";
            echo "</br >";
            echo "Would you like to Hit or pass?";
            ?>
            </br >

            </br >

            <input type="submit" value = "Hit" name = "action">
            &nbsp &nbsp &nbsp &nbsp
            <input type="submit" vaule = "Pass" name = "action">

            </br >
            <?php
            var_dump($_SESSION);
            break;
        case 'Hit':

    }
}
function cardText($card){
    #echo $card;
    $output = "";
    if ($card[1] == "A"){
        $output = $output. "The Ace of ";
    }
    if ($card[1] == "2"){
        $output = $output. "The Two of";
    }
    if ($card[1] == "3"){
        $output = $output. "The Three of";
    }
    if ($card[1] == "4"){
        $output = $output. "The Four of";
    }
    if ($card[1] == "5"){
        $output = $output. "The Five of";
    }
    if ($card[1] == "6"){
        $output = $output. "The Six of";
    }
    if ($card[1] == "7"){
        $output = $output. "The Seven of";
    }
    if ($card[1] == "8"){
        $output = $output. "The Eight of";
    }
    if ($card[1] == "9"){
        $output = $output. "The Nine of";
    }
    if ($card[1] == "1"){
        $output = $output. "The Ten of";
    }
    if ($card[1] == "J"){
        $output = $output. "The Jack of";
    }
    if ($card[1] == "Q"){
        $output = $output. "The Queen of";
    }
    if ($card[1] == "K"){
        $output = $output. "The King of";
    }
    if ($card[0] == "D"){
        $output = $output. " Diamonds";
    }
    if ($card[0] == "C"){
        $output = $output. " Clubs";
    }
    if ($card[0] == "H"){
        $output = $output. " Hearts";
    }
    if ($card[0] == "S"){
        $output = $output. " Spades";
    }
    return $output;
}

function DEAL (){
    #echo $_SESSION['playerHand'];
    $intermediate = $_SESSION['shuffledDeck'];
    $test = $_SESSION['playerHand'];
    #echo ($intermediate[$_SESSION['dealNumber']]);
    #var_dump($intermediate);
    #$_SESSION['playerHand'] = array_Push($test, $intermediate[$_SESSION['dealNumber']]);
    $_SESSION['dealNumber']++;
    return ($intermediate[$_SESSION['dealNumber']]);
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

var_dump($_SESSION['shuffledDeck']);
echo "</form>";
#var_dump ($masterlist);

*/

