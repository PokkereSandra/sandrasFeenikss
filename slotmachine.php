<?php

$symbolFirst = new stdClass();
$symbolFirst->type = "X";
$symbolFirst->value = 0.10;

$symbolSecond = new stdClass();
$symbolSecond->type = "O";
$symbolSecond->value = 0.10;

$symbolThird = new stdClass();
$symbolThird->type = "A";
$symbolThird->value = 0.20;

$symbolFourth = new stdClass();
$symbolFourth->type = "B";
$symbolFourth->value = 0.30;

$symbolFifth = new stdClass();
$symbolFifth->type = "C";
$symbolFifth->value = 0.50;

$symbolSixth = new stdClass();
$symbolSixth->type = "D";
$symbolSixth->value = 0.20;

$symbolSeventh = new stdClass();
$symbolSeventh->type = "E";
$symbolSeventh->value = 0.30;

$symbolEighth = new stdClass();
$symbolEighth->type = "F";
$symbolEighth->value = 0.40;

$yourBet = [0.10, 0.20, 0.30, 0.50, 1.00];

$symbols = [$symbolFirst, $symbolSecond, $symbolThird, $symbolFourth, $symbolFifth, $symbolSixth, $symbolSeventh,$symbolEighth];

function getRandomSymbol(array $symbols): string
{
    shuffle($symbols);
    foreach ($symbols as $symbol) {
        $random = $symbol->type;
    }
    return $random;
}

$board = [
    [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)],
    [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)],
    [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)]
];

function displayBoard(array $board): void
{
    echo "SPIN TO WIN! PRESS y TO ROLL, n TO CASH OUT \n";
    echo "  {$board[0][0]}  |  {$board[0][1]}  |  {$board[0][2]}  |  {$board[0][3]}  |  {$board[0][4]} \n";
    echo " ----+-----+-----+-----+----\n";
    echo "  {$board[1][0]}  |  {$board[1][1]}  |  {$board[1][2]}  |  {$board[1][3]}  |  {$board[1][4]} \n";
    echo " ----+-----+-----+-----+----\n";
    echo "  {$board[2][0]}  |  {$board[2][1]}  |  {$board[2][2]}  |  {$board[2][3]}  |  {$board[2][4]} \n";
}

function payLines(array $board, string $spinSymbol): bool
{
    //1.līnija vidū
    if ($board[1][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[1][2] === $spinSymbol
        && $board[1][3] === $spinSymbol && $board[1][4] === $spinSymbol) {
        return true;
    }
    //2.līnija augšā
    if ($board[0][0] === $spinSymbol && $board[0][1] === $spinSymbol && $board[0][2] === $spinSymbol
        && $board[0][3] === $spinSymbol && $board[0][4] === $spinSymbol) {
        return true;
    }
    //3.līnija apakšā
    if ($board[2][0] === $spinSymbol && $board[2][1] === $spinSymbol && $board[2][2] === $spinSymbol
        && $board[2][3] === $spinSymbol && $board[2][4] === $spinSymbol) {
        return true;
    }
    //4.līnija \/
    if ($board[0][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[2][2] === $spinSymbol
        && $board[1][3] === $spinSymbol && $board[0][4] === $spinSymbol) {
        return true;
    }
    //5.līnija /\
    if ($board[2][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[0][2] === $spinSymbol
        && $board[1][3] === $spinSymbol && $board[2][4] === $spinSymbol) {
        return true;
    }
    return false;
}

function fourSymbolsInPayLine(array $board, string $spinSymbol): bool
{
    if ($board[1][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[1][2] === $spinSymbol &&
        $board[1][3] === $spinSymbol) {
        return true;
    }
    if ($board[0][0] === $spinSymbol && $board[0][1] === $spinSymbol && $board[0][2] === $spinSymbol &&
        $board[0][3] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[2][1] === $spinSymbol && $board[2][2] === $spinSymbol &&
        $board[2][3] === $spinSymbol) {
        return true;
    }
    if ($board[0][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[2][2] === $spinSymbol &&
        $board[1][3] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[0][2] === $spinSymbol &&
        $board[1][3] === $spinSymbol) {
        return true;
    }
    return false;
}

function threeSymbolsInPayLine(array $board, string $spinSymbol): bool
{
    if ($board[1][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[1][2] === $spinSymbol) {
        return true;
    }
    if ($board[0][0] === $spinSymbol && $board[0][1] === $spinSymbol && $board[0][2] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[2][1] === $spinSymbol && $board[2][2] === $spinSymbol) {
        return true;
    }
    if ($board[0][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[2][2] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[1][1] === $spinSymbol && $board[0][2] === $spinSymbol) {
        return true;
    }
    return false;
}

function twoSymbolsInPayLine(array $board, $spinSymbol): bool
{
    if ($board[0][0] === $spinSymbol && $board[0][1] === $spinSymbol) {
        return true;
    }
    if ($board[1][0] === $spinSymbol && $board[1][1] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[2][1] === $spinSymbol) {
        return true;
    }
    if ($board[0][0] === $spinSymbol && $board[1][1] === $spinSymbol) {
        return true;
    }
    if ($board[2][0] === $spinSymbol && $board[1][1] === $spinSymbol) {
        return true;
    }
    return false;
}

$gamblerChoice = "";
$credits = (int)readline("Add money here: ");
echo "Choose Your bet: " . PHP_EOL;
foreach ($yourBet as $key=>$bet) {
    echo "$key - $bet" . PHP_EOL;
}
foreach ($yourBet as $bet){
    $multiplier = $bet * 10;
}
$betChoice = (int)readline("enter your choice 0-4: ");
if (array_key_exists($betChoice, $yourBet)) {
    $bet = $yourBet[$betChoice];
}
echo "Your bet is " . $bet . PHP_EOL;
echo "Credits are " . $credits . PHP_EOL;
while ($gamblerChoice !== "n") {
    $board = [
        [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)],
        [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)],
        [getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols), getRandomSymbol($symbols)]
    ];
    displayBoard($board);

    foreach ($symbols as $symbol) {
        $current = $symbol->type;
        if (payLines($board, $current)) {
            $x = $symbol->value * 5 * $multiplier;
            $credits += $x;
            echo "You won " . $x . PHP_EOL;
        } else if (fourSymbolsInPayLine($board, $current)) {
            $x = $symbol->value * 4 * $multiplier;
            $credits += $x;
            echo "You won " . $x . PHP_EOL;
        } else if (threeSymbolsInPayLine($board, $current)) {
            $x = $symbol->value * 3 * $multiplier;
            $credits += $x;
            echo "You won " . $x . PHP_EOL;
        } else if (twoSymbolsInPayLine($board, $current)) {
            $x = $symbol->value * 2 * $multiplier;
            $credits += $x;
            echo "You won " . $x . PHP_EOL;
        }
    }

    $credits = $credits - $bet;
    if ($credits < $bet) {
        echo "not enough credits to spin";
        $wannaAdd = (readline("Add credit? yes / no ? "));
        if ($wannaAdd === "yes") {
            $loseMore = (int)readline("enter sum: ");
            $credits += $loseMore;
        } else {
            exit("See You next time!");
        }
    }
    echo "BET: " . $bet . PHP_EOL;
    echo "CREDITS: " . $credits . PHP_EOL;
    $gamblerChoice = readline("One more spin?");
}
echo str_repeat("-", 20) . PHP_EOL;
echo "Cash out: " . $credits;