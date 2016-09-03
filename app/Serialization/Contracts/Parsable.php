<?php

namespace DataStructure\Serialization\Contracts;

interface Parsable
{
    /**
     * Parse array into the xml data.
     *
     * @param  array|xml $inputData
     * @param  string   $output
     * @param  int      $depth
     * @return xml|json
     */
    public function parse($inputData, $output = "", $depth = 1);
}