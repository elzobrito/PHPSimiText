<?php

namespace PHPSimiTextApp\Tokenizer;

class Tokenizer
{
    public function tokenizeTexts($texts)
    {
        try {
            return array_map(function ($text) {
                return explode(' ', strtolower($text));
            }, $texts);
        } catch (\Exception $e) {
            throw new \Exception('Ocorreu um erro ao tokerizar os textos: ' . $e->getMessage());
        }
    }
}
