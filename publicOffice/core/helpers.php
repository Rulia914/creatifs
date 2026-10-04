<?php
namespace Core\Helpers;

// Fonctions utilitaires pour manipuler du texte et des dates.

// Coupe un texte en gardant une phrase cohérente.
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

// Convertit une chaîne en slug lisible pour les URLs.
function slugify(string $string): string{
    // Remplace les caractères accentués par leurs équivalents sans accent.
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);    
    // Met la chaîne en minuscules.
    $string = strtolower($string);
    // Remplace les caractères autres que les lettres et chiffres par des tirets.
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);
    // Supprime les tirets au début et à la fin.
    $string = trim($string, '-');
    return $string;
}

// Formate une date selon le format demandé.
function dateFormator(string $date, string $format = "d/m/Y") : string{
    return date($format, strtotime($date));
}
