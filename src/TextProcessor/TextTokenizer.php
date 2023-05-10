<?php

namespace PHPSimiTextApp\TextProcessor;

class TextTokenizer
{
    public function tokenizeTexts($texts)
    {
        // Tokenize each text
        $tokens = [];
        foreach ($texts as $text) {
            $tokens[] = $this->tokenizeText($text);
        }

        return $tokens;
    }

    private function tokenizeText($text)
    {
        // Split text into tokens
        return explode(' ', strtolower($text));
    }
}
