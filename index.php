<?php

namespace PHPSimiTextApp;

use PHPSimiTextApp\CosineSimilarityCalculator\CosineSimilarityCalculator;
use PHPSimiTextApp\StopWordRemover\StopWordRemover;
use PHPSimiTextApp\TextProcessor\TextProcessor;
use PHPSimiTextApp\Tokenizer\Tokenizer;
use PHPSimiTextApp\Vectorizer\Vectorizer;

require_once  __DIR__ . '/vendor/autoload.php';

class Index
{
    public function __construct()
    {
        define('STOP_WORDS', [
            'a',
            'ao',
            'aos',
            'aquela',
            'aquelas',
            'aquele',
            'aqueles',
            'aquilo',
            'as',
            'até',
            'com',
            'como',
            'da',
            'das',
            'de',
            'dela',
            'delas',
            'dele',
            'deles',
            'desde',
            'do',
            'dos',
            'e',
            'ela',
            'elas',
            'ele',
            'eles',
            'em',
            'entre',
            'era',
            'eram',
            'essa',
            'essas',
            'esse',
            'esses',
            'esta',
            'estamos',
            'estas',
            'este',
            'estes',
            'eu',
            'foi',
            'fomos',
            'foram',
            'há',
            'isso',
            'isto',
            'já',
            'lhe',
            'lhes',
            'mais',
            'mas',
            'me',
            'mesmo',
            'meu',
            'meus',
            'minha',
            'minhas',
            'muito',
            'na',
            'não',
            'nas',
            'nem',
            'no',
            'nos',
            'nossa',
            'nossas',
            'nosso',
            'nossos',
            'num',
            'numa',
            'nunca',
            'o',
            'os',
            'ou',
            'outra',
            'outras',
            'outro',
            'outros',
            'para',
            'pela',
            'pelas',
            'pelo',
            'pelos',
            'por',
            'qual',
            'qualquer',
            'quando',
            'que',
            'quem',
            'se',
            'sem',
            'ser',
            'seu',
            'seus',
            'sob',
            'sobre',
            'sua',
            'suas',
            'talvez',
            'também',
            'te',
            'tem',
            'têm',
            'tenha',
            'ter',
            'teu',
            'teus',
            'teve',
            'tipo',
            'tive',
            'todos',
            'um',
            'uma',
            'umas',
            'uns',
            'você',
            'vocês',
            'vos',
            'seus',
        ]);
        $texts = [
            'Texto 1',
            'Texto 2',
            'Texto 3',
            'Texto 4',
        ];


        // Process texts
        $textProcessor = new TextProcessor(STOP_WORDS);
        $vectors = $textProcessor->processTexts($texts);

        // Vectorize main text
        $mainText = "principal";
        $mainVector = $textProcessor->processTexts([$mainText])[0];

        // Calculation of cosine similarity between main text and initial texts
        $cosineSimilarityCalculator = new CosineSimilarityCalculator();
        
        $similarities = json_decode($cosineSimilarityCalculator->calculateSimilarities($vectors, $mainVector));

        echo "Cosine similarity between main text and initial texts:<br>";
        for ($i = 0; $i < count($similarities); $i++)
            echo "Text " . ($i + 1) . ": " . number_format($similarities[$i], 4) . "<br>";
    }
}

new Index();
