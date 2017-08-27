<?php

namespace DtParser;

class FormatConverter
{
    public static function convertToXml(array $tags, array $options = []): string
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        foreach($tags as $tag => $count ) {
            $xml->addChild($tag, htmlspecialchars($count));
        }

        return $xml->asXML();
    }

}
