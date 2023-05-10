# PHPSimiTextApp

PHPSimiTextApp é um projoeto PHP que calcula a similaridade do cosseno entre um texto principal e vários outros textos.

## Instalação

Para instalar o PHPSimiTextApp, clone este repositório e execute o comando `composer install` para instalar as dependências.

## Como usar

Para usar o PHPSimiTextApp, crie uma instância da classe `Index` e passe para o construtor dois objetos: um objeto `TextProcessor` e um objeto `CosineSimilarityCalculator`. O objeto `TextProcessor` é criado passando três objetos para o seu construtor: um objeto `TextTokenizer`, um objeto `StopWordRemoval` e um objeto `TextVectorizer`. O objeto `StopWordRemoval` é criado passando um array de palavras de parada para o seu construtor.

<?php
use PHPSimiTextApp\CosineSimilarityCalculator\CosineSimilarityCalculator;
use PHPSimiTextApp\Index;
use PHPSimiTextApp\TextProcessor\StopWordRemoval;
use PHPSimiTextApp\TextProcessor\StopWords;
use PHPSimiTextApp\TextProcessor\TextProcessor;
use PHPSimiTextApp\TextProcessor\TextTokenizer;
use PHPSimiTextApp\TextProcessor\TextVectorizer;

require_once __DIR__ . '/vendor/autoload.php';

$index = new Index(
    new TextProcessor(
        new TextTokenizer(),
        new StopWordRemoval(StopWords::getStopWords()),
        new TextVectorizer()
    ),
    new CosineSimilarityCalculator()
);

Quando a instância da classe Index é criada, o construtor é chamado e a similaridade do cosseno entre o texto principal e os textos iniciais é calculada e impressa na tela.

## Licença
PHPSimiTextApp é licenciado sob a licença MIT.
