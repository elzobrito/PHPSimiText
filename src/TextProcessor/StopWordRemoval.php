<?php

namespace PHPSimiTextApp\TextProcessor;

class StopWordRemoval
{
    private $stopWords;

    public function __construct($stopWords)
    {
        $this->stopWords = $stopWords;
    }

    public function removeStopWords($tokens)
    {
        // Remove stop words from each set of tokens
        $filteredTokens = [];
        foreach ($tokens as $textTokens) {
            $filteredTokens[] = array_values(array_filter($textTokens, function ($token) {
                return !in_array($token, $this->stopWords);
            }));
        }

        return $filteredTokens;
    }
}