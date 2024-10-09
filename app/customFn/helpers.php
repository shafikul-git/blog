<?php

if (!function_exists('stringSortCut')) {
    function stringSortCut($string, $start, $end)
    {
        $mainContent = strip_tags($string);
        $words = explode(' ', $mainContent);
        $cutWord = array_slice($words, $start, $end);
        $content = implode(' ', $cutWord);
        return count($words) < $end ? $content : $content . ' ...';
    }
}
