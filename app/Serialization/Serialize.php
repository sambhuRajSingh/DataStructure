<?php

namespace DataStructure\Serialization;

class Serialize
{
    protected $inputData;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    public function xmlOutput()
    {
        return "";
    }

    public function intoXML()
    {
        return $this->xmlOutput();
    }
}