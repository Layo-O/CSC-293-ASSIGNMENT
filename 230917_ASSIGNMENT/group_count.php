<?php
function wordsFromFile($filename) {
  // Read the file contents into a string
  $fileContents = file_get_contents($filename);

  // Split the contents into an array of words
  $words = explode(' ', $fileContents);

  // Count the occurrence of each word
  $wordCount = array_count_values($words);

  // Group the words by their count
  $wordGroups = array();
  foreach ($wordCount as $word => $count) {
    $wordGroups[$count][] = $word;
}

// Sort the groups by count in descending order
arsort($wordGroups);

// Return the grouped words
return $wordGroups;
}

$filename = 'PhPFrameWork.txt';
$wordGroups = wordsFromFile($filename);

// Display the grouped words
foreach ($wordGroups as $count => $words) {
echo "Count $count: " . implode(', ', $words) . PHP_EOL;
}
?>