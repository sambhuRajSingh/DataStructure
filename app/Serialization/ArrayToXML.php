<?php

namespace DataStructure\Serialization;

class ArrayToXML extends Xml
{
    /**
     * Parse array into the xml data.
     *
     * @param  array    $inputData
     * @param  string   $output
     * @param  int      $depth
     * @return string
     */
    public function xmlOutput($inputData, $output = "", $depth = 1)
    {
        if (is_string($inputData)) {
            $output .= $this->tagContent($inputData, $depth);
        } elseif (is_array($inputData)) {
            $output .= $this->startTag($inputData['name'], $inputData['attr'], $depth);

            foreach ($inputData['children'] as $children) {
                $output = $this->xmlOutput($children, $output, $depth + 1);
            }

            $output .= $this->endTag($inputData['name'], $depth);
        }

        return $output;
    }
}
