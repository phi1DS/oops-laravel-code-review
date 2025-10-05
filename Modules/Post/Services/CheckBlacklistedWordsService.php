<?php

namespace Modules\Post\Services;

class CheckBlacklistedWordsService
{
    private $blacklistedWords = [
        'Laborum',
        'veritas'
    ];

    public function removeBlacklistedWordsFromString(string $string): string
    {
        foreach($this->blacklistedWords as $blacklistedWord) {
            $string = str_replace($blacklistedWord, '', $string);
        }

        return $string;
    }
}
