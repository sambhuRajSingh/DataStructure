<?php

namespace DataStructure\Serialization;

use DataStructure\Serialization\ArrayToXML;
use DataStructure\Serialization\Contracts\Parsable;
use DataStructure\Serialization\Contracts\Serializable;

class Serialize implements Serializable
{
    /**
     * The input data to be parsed.
     *
     * @var array
     */
    private $inputData;

    /**
     * Creating instance of the Serialize.
     *
     * @param  array  $inputData
     * @return void
     */
    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    /**
     * Serialize input into the Parsable output
     *
     * @param   boolean  $formatted
     * @return  string
     */
    public function output(Parsable $parsable)
    {
        return $parsable->parse($this->inputData);
    }
}
