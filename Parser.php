<?php

namespace DtParser;

class Parser
{
    protected $tags = [];

    public function parse($source): void
    {
        $source = new HtmlSource($source);
        $this->tags = $this->findTags($source->getSource());
    }

    public function getTagsAsArrayArray(array $options = []): array
    {
        return $this->tags;
    }

    public function getTagsAsArrayXml(array $options = []): string
    {
        return FormatConverter::convertToXml($this->tags, $options);
    }

    protected function findTags(string $src): array
    {
        preg_match_all('/<([^\/!][a-z1-9]*)/i', $src, $matches);

        return array_count_values($matches[1]);
    }
}
