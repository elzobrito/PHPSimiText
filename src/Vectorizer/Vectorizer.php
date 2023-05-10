<?php
namespace PHPSimiTextApp\Vectorizer;

class Vectorizer
{
    public function vectorizeTexts($tokens)
    {
        return array_map(function ($textTokens) {
            return array_count_values($textTokens);
        }, $tokens);
    }

    public function vectorizeText($tokens)
    {
        return array_count_values($tokens);
    }
}
