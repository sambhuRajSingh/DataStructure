<?php

namespace DataStructure\Serialization;

class Serialize
{
    private $inputData;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    public function xmlOutput($inputData, $output = "", $depth = 1)
    {
        return $this->inputData;
    }

    public function intoXML($formatted = true)
    {
        return $this->xmlOutput($this->inputData);
    }
}