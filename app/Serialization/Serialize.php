<?php

namespace DataStructure\Serialization;

class Serialize
{
    private $inputData;

    private $formatted;

    public function __construct($inputData)
    {
        $this->inputData = $inputData;
    }

    public function xmlOutput($inputData, $output = "", $depth = 1)
    {
        if (is_string($inputData)) {

        } elseif (is_array($inputData)) {
            $output .= $this->startTag($inputData['name'], $depth);
        }

        return $output;
    }

    private function startTag($tagName, $depth)
    {
        return $this->tabs($depth - 1).'<'.htmlspecialchars($tagName).'>'."\n";
    }

    public function tabs($depth)
    {
        $tabs = "";

        for($x = 1; $x <= $depth; $x++) {
            $tabs .= "\t";
        }

        return $tabs;
    }

    public function intoXML($formatted = true)
    {
        $this->formatted  = $formatted;
        return $this->xmlOutput($this->inputData);
    }
}