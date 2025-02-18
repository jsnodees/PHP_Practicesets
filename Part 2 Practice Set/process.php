<?php

function stopsWord(): array
{
    $stopWords = file('stopwords.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('strtolower', $stopWords);
}

function inputText(): string
{
    return ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST['text'] : '';
}

function wordText(string $text): array|false
{
    return preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
}

function calculatedWordFrequencies(array $words, array $stopWords): array
{
    $wordCount = [];
    
    foreach ($words as $word) {
        if (!in_array($word, $stopWords)) {
            $wordCount[$word] = isset($wordCount[$word]) ? $wordCount[$word] + 1 : 1;
        }
    }
    
    return $wordCount;
}

function sortWords(array $wordCount, string $sortOrder): array
{
    $sortOrder == 'asc' ? asort($wordCount) : arsort($wordCount);
    return $wordCount;
}
