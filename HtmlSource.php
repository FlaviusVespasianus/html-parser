<?php

namespace DtParser;

use DtParser\Exception\BadResourceTypeException;

class HtmlSource
{
    protected $source;

    public function __construct($source)
    {
        if (is_file($source) || filter_var($source, FILTER_VALIDATE_URL)) {
            $this->source = file_get_contents($source);
        } elseif (is_string($source)) {
            $this->source = trim(preg_replace('/\s+/', ' ', $source));
        } else {
            throw new BadResourceTypeException($source);
        }
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

}
