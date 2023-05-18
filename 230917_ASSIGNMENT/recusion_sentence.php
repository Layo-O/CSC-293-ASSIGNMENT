<?php
// A program to reverse a sentence using recursion

$sentence = "The Lord is my Shrepherd, I shall not want";
function sentenceReverseRecursion($sentence){

  if(strlen($sentence) == 0){

    return $sentence;
  } else{
    return sentenceReverseRecursion(substr($sentence,1)) .$sentence[0];
  }
}

$reserveSentence = sentenceReverseRecursion($sentence);
echo $reserveSentence;
?>