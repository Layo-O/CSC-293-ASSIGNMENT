<?php
// A program to iteration a sentence using iteration
$sentence = "The Lord is my Shrepherd, I shall not want";

function reverseSentence($sentence) {
    $length = strlen($sentence);
    $reversed = '';
    for ($i = $length - 1; $i >= 0; $i--) {
        $reversed .= $sentence[$i];
    }
    return $reversed;
}

$reversedIterative = reverseSentence($sentence);
echo  $reversedIterative;
?>
