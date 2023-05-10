<?php

namespace PHPSimiTextApp;

use PHPSimiTextApp\CosineSimilarityCalculator\CosineSimilarityCalculator;
use PHPSimiTextApp\StopWordRemover\StopWordRemover;
use PHPSimiTextApp\Tokenizer\Tokenizer;
use PHPSimiTextApp\Vectorizer\Vectorizer;

require_once  __DIR__ . '/vendor/autoload.php';

class Index
{
    public function __construct()
    {
        define('STOP_WORDS', ['a', 'de', 'é', 'um', 'para', 'o', 'e', 'do', 'da']);
        $texts = [
            'Texto 1',
            'Texto 2',
            'Texto 3',
            'Texto 4',
        ];

        // Tokenize texts
        $tokenizer = new Tokenizer();
        $tokens = $tokenizer->tokenizeTexts($texts);

        // Remove stop words
        $stopWordRemover = new StopWordRemover();
        $tokens = $stopWordRemover->removeStopWords($tokens);

        // Vectorize texts
        $vectorizer = new Vectorizer();
        $vectors = $vectorizer->vectorizeTexts($tokens);

        // Vectorize main text
        $main_text = "Texto principal";
        $main_vector = $vectorizer->vectorizeText(explode(' ', strtolower($main_text)));

        // Calculation of cosine similarity between main text and initial texts
        $cosineSimilarityCalculator = new CosineSimilarityCalculator();
        $similarities = json_decode($cosineSimilarityCalculator->calculateSimilarities($vectors, $main_vector));

        echo "Cosine similarity between main text and initial texts:<br>";
        for ($i = 0; $i < count($similarities); $i++) {
            echo "Text " . ($i + 1) . ": " . number_format($similarities[$i], 4) . "<br>";
        }    }
}

new Index();
