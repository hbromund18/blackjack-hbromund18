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
            $_SESSION['playerHandValue'] = 0;
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
            <input type="submit" value = "Pass" name = "action">

            </br >
            <?php
            #var_dump($_SESSION);
            break;
        case 'Hit':
            echo "</br >";
            echo "Your new hand is:  ";
            $card1 = DEAL();
            array_push($_SESSION['playerHand'], $card1);
            for ($x = 0; $x < count($_SESSION['playerHand']); $x++) {
                $intermediate = $_SESSION['playerHand'];
                echo cardText($intermediate[$x]);
                echo "&nbsp &nbsp &nbsp";
            }
            echo "</br >";
            echo "</br >";
            echo "The Dealers revealed card is:   ";
            echo cardText($_SESSION['dealerHand'][0]);
            #var_dump($_SESSION);
            $_SESSION['playerHandValue'] = handValue($_SESSION['playerHand']);
            if ($_SESSION['playerHandValue'] > 21){
                echo "<br/ > <br/ > Your score is over 21, and the Dealers hand is: ";
                #var_dump ($_SESSION['dealerHand']);
                for ($x = 0; $x < count($_SESSION['dealerHand']); $x++) {
                    $intermediate = $_SESSION['dealerHand'];
                    echo cardText($intermediate[$x]);
                    echo "&nbsp &nbsp &nbsp";
                }
                while (handValue($_SESSION['dealerHand']) < 17){
                    #var_dump ($_SESSION['dealerHand']);
                    echo "<br/ > <br/ > The Dealer will hit";
                    $card1 = DEAL();
                    array_push($_SESSION['dealerHand'], $card1);
                    echo "<br/ > <br/ > The Dealers new hand is: ";
                    for ($x = 0; $x < count($_SESSION['dealerHand']); $x++) {
                        $intermediate = $_SESSION['dealerHand'];
                        echo cardText($intermediate[$x]);
                        echo "&nbsp &nbsp &nbsp";
                    }
                }
                if (handValue($_SESSION['dealerHand']) > 21){
                    echo "<br/ > <br/ >";
                    echo "The Dealer has busted. The Game is a Draw. Please press START to begin a new game.";
                    ?>

                    </br >
                    </br >

                    <input type="submit" value = "Start" name = "action">

                    &nbsp &nbsp &nbsp &nbsp

                    <?php
                }
                else {
                    echo "<br/ > <br/ >";
                    echo "The Dealer has won the game. Please press START to begin a new game.";
                    ?>

                    </br >
                    </br >

                    <input type="submit" value = "Start" name = "action">

                    &nbsp &nbsp &nbsp &nbsp

                    <?php
                    }
            }
            if ($_SESSION['playerHandValue'] < 21){
                ?>
                <br/><br/>
                Your score is bellow 21. You may Hit or Pass again.
                <br/> <br/>
                <input type="submit" value = "Hit" name = "action">
                &nbsp &nbsp &nbsp &nbsp
                <input type="submit" value = "Pass" name = "action">
                <?php
            }
            break;
        case 'Pass':
            echo "Your Hand is: ";
            for ($x = 0; $x < count($_SESSION['playerHand']); $x++) {
                $intermediate = $_SESSION['playerHand'];
                echo cardText($intermediate[$x]);
                echo "&nbsp &nbsp &nbsp";
            }
            echo "</br > </br >";
            echo "The Dealers Hand is: ";
            for ($x = 0; $x < count($_SESSION['dealerHand']); $x++) {
                $intermediate = $_SESSION['dealerHand'];
                echo cardText($intermediate[$x]);
                echo "&nbsp &nbsp &nbsp";
            }
            while (handValue($_SESSION['dealerHand']) < 17){
                #var_dump ($_SESSION['dealerHand']);
                echo "</br > </br > The Dealer will hit";
                $card1 = DEAL();
                array_push($_SESSION['dealerHand'], $card1);
                echo "<br/ > <br/ > The Dealers new hand is:  ";
                for ($x = 0; $x < count($_SESSION['dealerHand']); $x++) {
                    $intermediate = $_SESSION['dealerHand'];
                    echo cardText($intermediate[$x]);
                    echo "&nbsp &nbsp &nbsp";
                }
            }
            if (handValue($_SESSION['dealerHand']) > 21){
                $playerhandvalue = handValue($_SESSION['playerHand']);
                if ($playerhandvalue < 21) {
                    echo "</br > </br >";
                    echo "Congratulations you have won the Game";
                }
                else if (handValue($_SESSION['playerHand']) > 21){
                    echo "</br > </br >";
                    echo "The Game is a Draw";
                }
            }
            if (handValue($_SESSION['dealerHand']) < 21){
                $playerhandvalue = handValue($_SESSION['playerHand']);
                if ($playerhandvalue < 21) {
                    $playerValue = (21 - handValue($_SESSION['playerHand']));
                    $dealerValue = (21 - handValue($_SESSION['dealerHand']));
                    if ($playerValue < $dealerValue){
                        echo "</br > </br >";
                        echo "Congratulations you have won the Game";
                    }
                    else if ($playerValue == $dealerValue){
                        echo "</br > </br >";
                        echo "The Game is a Draw";
                    }
                    else{
                        echo "</br > </br >";
                        echo "The Dealer has won the game";
                    }
                }
                if (handValue($_SESSION['playerHand']) > 21){
                    echo "The Dealer has won the game.";
                }
            }
            break;
    }
}

function handValue($hand){
    $value = 0;
    $count = 0;
    #var_dump ($hand);
    for ($x = 0; $x < count($hand); $x++){
       $card = $hand[$x];
       if ($card[1] == 1 || $card[1] == 'J' || $card[1] == 'Q' || $card[1] == 'K'){
           $value = $value + 10;
       }
       if ($card[1] == 'A'){
           if ($count == 0) {
               $value = $value + 11;
           }
           else{
               $value = $value + 1;
           }
       }
       else{
           $value = $value + $card[1];
       }
    }
    return $value;
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
    $intermediate = $_SESSION['shuffledDeck'];
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

