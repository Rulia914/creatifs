<?php
namespace Core\Helpers;

function truncate($text, $limit = 100)
{
    if (strlen($text) <= $limit) return $text;


    // Coupe à la limite
    $text = substr($text, 0, $limit);
    // Recherche la position du dernier espace dans la chaîne tronquée
    $last_space = strrpos($text, ' ');
    // Recoupe la chaîne à cet espace
    return substr($text, 0, $last_space) . '...';
}
function slugify(string $string): string{
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);    
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);
    $string = trim($string, '-');
    return $string;
}
function dateFormator(string $date, string $format = "d/m/Y") : string{
    return date($format, strtotime($date));
}
