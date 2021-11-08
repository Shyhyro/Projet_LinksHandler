<?php

namespace Bosqu\ProjetLinksHandler\Controller;

class ThumbalizrController
{
    function thumbalizr($url, $options = array()): string
    {
        $embed_key = 'qfeXKDdDHaX9qpeBsHnPdlQYRmh6ymc'; # replace it with you Embed API key
        $secret = 'eBJvwdOTyxoto4y3SiSYo1x1UbA'; # replace it with your Secret

        $query = 'url=' . urlencode($url);

        foreach($options as $key => $value) {
            $query .= '&' . trim($key) . '=' . urlencode(trim($value));

        }

        $token = md5($query . $secret);

        return "https://api.thumbalizr.com/api/v1/embed/$embed_key/$token/?$query";
    }
}