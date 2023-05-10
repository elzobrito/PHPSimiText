<?php

namespace PHPSimiTextApp\TextProcessor;

class TextProcessor
{
    private $textTokenizer;
    private $stopWordRemoval;
    private $textVectorizer;

    public function __construct(
        TextTokenizer $textTokenizer,
        StopWordRemoval $stopWordRemoval,
        TextVectorizer $textVectorizer
    ) {
        $this->textTokenizer = $textTokenizer;
        $this->stopWordRemoval = $stopWordRemoval;
        $this->textVectorizer = $textVectorizer;
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