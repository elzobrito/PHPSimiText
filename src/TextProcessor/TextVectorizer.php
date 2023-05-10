<?php

namespace PHPSimiTextApp\TextProcessor;

class TextVectorizer
{
    public function vectorizeTexts($tokens)
    {
        // Vectorize each set of tokens
        $vectors = [];
        foreach ($tokens as $textTokens) {
            $vectors[] = $this->vectorizeText($textTokens);
        }

        return $vectors;
    }

    private function vectorizeText($tokens)
    {
        // Count the occurrences of each token
        return array_count_values($tokens);
    }
}