<?php

namespace PHPSimiTextApp\Vectorizer;

class Vectorizer
{
    public function vectorizeTexts($tokens)
    {
        try {
            return array_map(function ($textTokens) {
                return array_count_values($textTokens);
            }, $tokens);
        } catch (\Exception $e) {
            throw new \Exception('Ocorreu um erro ao vetorizar os textos: ' . $e->getMessage());
        }
    }

    public function vectorizeText($tokens)
    {
        try {
            return array_count_values($tokens);
        } catch (\Exception $e) {
            throw new \Exception('Ocorreu um erro ao vetorizar os textos: ' . $e->getMessage());
        }
    }
}
