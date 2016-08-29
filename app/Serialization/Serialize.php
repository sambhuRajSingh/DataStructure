<?php

namespace DataStructure\Serialization;

use DataStructure\Serialization\ArrayToXML;

class Serialize
{
    private $inputData;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    /**
     * Serialize into the xml output.
     *
     * @param   boolean  $formatted.
     * @return  string
     */
    public function intoXML($formatted = true)
    {
        $arrayToXML = new ArrayToXML();

        return $arrayToXML->isFormatted($formatted)
                   ->xmlOutput($this->inputData);
    }
}