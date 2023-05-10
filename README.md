# PHPSimiTextApp

PHPSimiTextApp é um projoeto PHP que calcula a similaridade do cosseno entre um texto principal e vários outros textos.

## Como funciona

O aplicativo usa várias etapas para calcular a similaridade do cosseno entre os textos:

1. Tokenização: os textos são divididos em tokens (palavras) usando a classe `Tokenizer`.
2. Remoção de palavras de parada: as palavras de parada (palavras comuns que não agregam significado) são removidas dos tokens usando a classe `StopWordRemover`.
3. Vetorização: os tokens são convertidos em vetores de frequência de palavras usando a classe `Vectorizer`.
4. Cálculo da similaridade do cosseno: a similaridade do cosseno entre o vetor do texto principal e os vetores dos outros textos é calculada usando a classe `CosineSimilarityCalculator`.

## Como usar

Para usar o aplicativo, basta instanciar a classe `Index` e fornecer os textos desejados. Aqui está um exemplo:

<?php
define('STOP_WORDS', ['a', 'de', 'é', 'um', 'para', 'o', 'e', 'do', 'da']);
$texts = [
    'texto1',
    'texto2',
    'texto3',
];

new Index($texts);
