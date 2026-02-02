<?php
function getRandomKaradocQuote() {
    $jsonFile = __DIR__ . '/../public/assets/karadoc.json';
    if (!file_exists($jsonFile)) return "Karadoc est silencieux...";

    $quote = json_decode(file_get_contents($jsonFile), true);
    if (!$quote || count($quote) === 0) return "Karadoc est silencieux...";

    $randomIndex = array_rand($quote);
    return $quote[$randomIndex]['quote'];
}
