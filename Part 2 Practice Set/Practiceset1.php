<?php

function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

function modifyString(string $text): string {
    return strtolower(str_replace(' ', '', $text));
}

function checkEvenOdd(int $number): string {
    return ($number % 2 === 0) ? "The number $number is even." : "The number $number is odd.";
}


$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$total = calculateTotalPrice($items);
echo "Total price: $" . $total; 

$string = "This is a poorly written program with little structure and readability.";

$modifiedStr = modifyString($string);
echo "\nModified string: " . $modifiedStr; 

$number = 42;

echo "\n" . checkEvenOdd($number); 