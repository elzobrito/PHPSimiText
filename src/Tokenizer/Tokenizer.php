<?php
namespace PHPSimiTextApp\Tokenizer;

class Tokenizer
{
    public function tokenizeTexts($texts)
    {
        return array_map(function ($text) {
            return explode(' ', strtolower($text));
        }, $texts);
    }
}