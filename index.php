<?php
/**
 * call file and count similar strings
 */
$text = file_get_contents("alice.txt");
$texts = strtolower($text);
// $words = str_word_count($text, 1); // use this function if you only want ASCII
$words = str_word_count($texts, 1); // use this function if you care about i18n

$frequency = array_count_values($words);

arsort($frequency);
echo '<pre>';
/**
 * all strings
 */
// print_r($frequency);


/**
 * top 20
 */
print_r(array_slice($frequency, 0 ,20));



