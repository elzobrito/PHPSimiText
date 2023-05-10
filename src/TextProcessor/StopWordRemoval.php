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
        // Convert stop words to a set (associative array)
        $stopWordsSet = array_flip($this->stopWords);

        // Remove stop words from each set of tokens
        $filteredTokens = [];
        foreach ($tokens as $textTokens) {
            $filteredTextTokens = [];
            foreach ($textTokens as $token) {
                if (!isset($stopWordsSet[$token])) {
                    $filteredTextTokens[] = $token;
                }
            }
            $filteredTokens[] = $filteredTextTokens;
        }

        return $filteredTokens;
    }
}
