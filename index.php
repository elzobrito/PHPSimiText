<?php

namespace PHPSimiTextApp;

use PHPSimiTextApp\CosineSimilarityCalculator\CosineSimilarityCalculator;
use PHPSimiTextApp\TextProcessor\StopWordRemoval;
use PHPSimiTextApp\TextProcessor\StopWords;
use PHPSimiTextApp\TextProcessor\TextProcessor;
use PHPSimiTextApp\TextProcessor\TextTokenizer;
use PHPSimiTextApp\TextProcessor\TextVectorizer;

require_once  __DIR__ . '/vendor/autoload.php';
class Index
{
    public function __construct(
        TextProcessor $textProcessor,
        CosineSimilarityCalculator $cosineSimilarityCalculator
    ) {
        $texts = [
            'Texto 1',
            'Texto 2',
            'Texto 3',
            'Texto 4',
        ];

        // Process texts
        $vectors = $textProcessor->processTexts($texts);

        // Vectorize main text
        $mainText = "principal";
        $mainVector = $textProcessor->processTexts([$mainText])[0];

        // Calculation of cosine similarity between main text and initial texts
        $similarities = json_decode($cosineSimilarityCalculator->calculateSimilarities($vectors, $mainVector));

        echo "Cosine similarity between main text and initial texts:<br>";
        for ($i = 0; $i < count($similarities); $i++)
            echo "Text " . ($i + 1) . ": " . number_format($similarities[$i], 4) . "<br>";
    }
}

new Index(
    new TextProcessor(
        new TextTokenizer(),
        new StopWordRemoval(StopWords::getStopWords()),
        new TextVectorizer()
    ),
    new CosineSimilarityCalculator()
);
