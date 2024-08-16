<?php

namespace App\Traits;

trait emailParseTrait
{
    public function emailParse($data)
    {
        $linebreaks = str_replace(['<br>', '<br/>', '<br />', '</p>', '<p>'], ["\n", "\n", "\n", "\n", "\n"], $data);
        $parseData = strip_tags($linebreaks);

        return $parseData;
    }
}
