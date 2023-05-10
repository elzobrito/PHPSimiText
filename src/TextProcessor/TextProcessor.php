<?php

namespace PHPSimiTextApp\TextProcessor;

use PHPSimiTextApp\TextProcessor\TextTokenizer;
use PHPSimiTextApp\TextProcessor\StopWordRemoval;
use PHPSimiTextApp\TextProcessor\TextVectorizer;

class TextProcessor
{
    private $textTokenizer;
    private $stopWordRemoval;
    private $textVectorizer;

    public function __construct($stopWords)
    {
        $this->textTokenizer = new TextTokenizer();
        $this->stopWordRemoval = new StopWordRemoval($stopWords);
        $this->textVectorizer = new TextVectorizer();
    }

    public function processTexts($texts)
    {
        // Tokenize texts
        $tokens = $this->textTokenizer->tokenizeTexts($texts);

        // Remove stop words
        $tokens = $this->stopWordRemoval->removeStopWords($tokens);

        // Vectorize texts
        $vectors = $this->textVectorizer->vectorizeTexts($tokens);

        return $vectors;
    }
}