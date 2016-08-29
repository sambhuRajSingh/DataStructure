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

            $output .= $this->endTag($inputData['name'], $depth);
        }

        return $output;
    }

    /**
     * Formatted or unformatted opening xml tag
     *
     * @param string    $tagName
     * @param int       $depth
     * @return string
     */
    private function startTag($tagName, $depth)
    {
        $startTag = '<'.htmlspecialchars($tagName).'>';

        if ($this->formatted) {
            return $this->tabs($depth - 1). $startTag ."\n";
        } else {
            return $startTag;
        }
    }

    /**
     * Formatted or unformatted closing xml tag
     *
     * @param string    $tagName
     * @param int       $depth
     * @return string
     */
    private function endTag($tagName, $depth)
    {
        $endTag = '</'.htmlspecialchars($tagName).'>';

        if ($this->formatted) {
            return $this->tabs($depth - 1). $endTag ."\n";
        } else {
            return $endTag;
        }
    }

    /**
     * Return number of tabs.
     *
     * @param int   $depth
     * @return string
     */
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