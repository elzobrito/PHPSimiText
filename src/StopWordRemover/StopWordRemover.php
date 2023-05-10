<?php

namespace PHPSimiTextApp\StopWordRemover;

class StopWordRemover
{
    public function removeStopWords($tokens)
    {
        try {
            return array_map(function ($textTokens) {
                return array_values(array_filter($textTokens, function ($token) {
                    return !in_array($token, STOP_WORDS);
                }));
            }, $tokens);
        } catch (\Exception $e) {
            throw new \Exception('Ocorreu um erro ao remover palavras: ' . $e->getMessage());
        }
    }
}
