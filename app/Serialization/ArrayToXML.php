<?php

namespace DataStructure\Serialization;

class ArrayToXML
{
    private $formatted = true;

    public function isFormatted($formatted)
    {
        $this->formatted = $formatted;

        return $this;
    }

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
            if ($this->formatted) {
                $output .= $this->tabs($depth - 1).trim($inputData)."\n";
            } else {
                $output .= trim($inputData);
            }
        } elseif (is_array($inputData)) {
            $output .= $this->startTag($inputData['name'], $inputData['attr'], $depth);

            foreach ($inputData['children'] as $children) {
                $output = $this->xmlOutput($children, $output, $depth + 1);
            }

            $output .= $this->endTag($inputData['name'], $depth);
        }

        return $output;
    }

    /**
     * Formatted or unformatted opening xml tag
     *
     * @param   string    $tagName
     * @param   array     $tagAttribute
     * @param   int       $depth
     * @return  string
     */
    private function startTag($tagName, $tagAttributes, $depth)
    {
        $startTag = '<'.
                        htmlspecialchars($tagName).
                        $this->tagAttributes($tagAttributes).
                    '>';

        if ($this->formatted) {
            return $this->tabs($depth - 1). $startTag ."\n";
        } else {
            return $startTag;
        }
    }

    /**
     * Make a tag attribute string.
     *
     * @param array $attributes
     * @return string
     */
    private function tagAttributes($attritubes)
    {
        $string = "";

        if (count($attritubes) > 0) {
            foreach ($attritubes as $key => $attribute) {
                $string .= ' ' . $key . '="' . $attribute . '"';
            }
        }

        return $string;
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
}