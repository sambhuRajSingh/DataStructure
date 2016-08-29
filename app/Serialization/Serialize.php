<?php

namespace DataStructure\Serialization;

use DataStructure\Serialization\ArrayToXML;

class Serialize
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
     * Serialize into the xml.
     *
     * @param   boolean  $formatted
     * @return  string
     */
    public function intoXML($formatted = true)
    {
        $arrayToXML = new ArrayToXML();

        return $arrayToXML->isFormatted($formatted)
                   ->xmlOutput($this->inputData);
    }
}
