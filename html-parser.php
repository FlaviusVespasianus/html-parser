<?php

class HtmlSource
{
    private $src;

    public function getSrc() {
        return $this->src;
    }

    public function __construct($src)
    {
        if (is_file($src) || filter_var($src, FILTER_VALIDATE_URL)) {
            $s = file_get_contents($src);
        } elseif (is_string($src)) {
            $s = $src;
        } else {
            $s = '';
        }
        $this->src = trim(preg_replace('/\s+/', ' ', $s));
    }

}

class Parser
{
    private static function convertToXml(array $foundAr): string {
        $xmlObj = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        foreach($foundAr as $tag => $count ) {
            $xmlObj->addChild("$tag",htmlspecialchars("$count"));
        }

        return $xmlObj->asXML();
    }

    private static function findTags(string $src): array {
        preg_match_all('/<([^\/!][a-z1-9]*)/i', $src, $matches);
        $foundAr = array_count_values($matches[1]);

        return $foundAr;
    }

    private static function returnFormat(array $foundAr, string $format) {
        if ($format == 'html') {
            $foundHtml = '<div><table>';
            foreach ($foundAr as $tag => $count) {
                $foundHtml .= '<tr><td>' . $tag  .  '</td><td>' . $count  .  '</td></tr>';
            }
            $foundHtml .= '</table></div>';

            return $foundHtml;

        } elseif ($format == 'xml') {
            $foundXml = self::convertToXml($foundAr);

            return $foundXml;
        }
    }

    public static function parse(HtmlSource $src, string $format = 'array') {
        $foundAr = self::findTags($src->getSrc());
        if ($format != 'array') {
            $toReturn = self::returnFormat($foundAr, $format);
        } else {
            $toReturn = $foundAr;
        }

        return $toReturn;
    }
}
