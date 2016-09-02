<?php

namespace DataStructure\Serialization;

abstract class Xml
{
    /**
     * Set formatted flag.
     *
     * @var boolean
     */
    public $formatted = true;

    /**
     * To format flag.
     *
     * @param  int  $formatted
     * @return DataStructure\Serialization\ArrayToXML
     */
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
    abstract public function xmlOutput($inputData, $output = "", $depth = 1);

    /**
     * Make a formatted or unformatted content for xml tag.
     *
     * @param   string  $content
     * @param   int     $depth
     * @return  string;
     */
    public function tagContent($content, $depth)
    {
        if ($this->formatted) {
            return $this->indent($depth).trim($content)."\n";
        }

        return trim($content);
    }

    /**
     * Formatted or unformatted opening xml tag.
     *
     * @param   string    $tagName
     * @param   array     $tagAttribute
     * @param   int       $depth
     * @return  string
     */
    public function startTag($tagName, $tagAttributes, $depth)
    {
        $startTag = '<'.
                        htmlspecialchars($tagName).
                        $this->tagAttributes($tagAttributes).
                    '>';

        if ($this->formatted) {
            return $this->indent($depth). $startTag ."\n";
        }

        return $startTag;
    }

    /**
     * Make a tag attribute string.
     *
     * @param   array   $attributes
     * @return  string
     */
    public function tagAttributes($attritubes)
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
     * Formatted or unformatted closing xml tag.
     *
     * @param   string    $tagName
     * @param   int       $depth
     * @return  string
     */
    public function endTag($tagName, $depth)
    {
        $endTag = '</'.htmlspecialchars($tagName).'>';

        if ($this->formatted) {
            return $this->indent($depth). $endTag ."\n";
        }

        return $endTag;
    }

    /**
     * Return number of tabs.
     *
     * @param  int   $depth
     * @return string
     */
    public function tabs($depth)
    {
        $tabs = "";

        for ($x = 1; $x <= $depth; $x++) {
            $tabs .= "\t";
        }

        return $tabs;
    }

    /**
     * Level of indent.
     *
     * @param  int $depth
     * @return int
     */
    public function indent($depth)
    {
        return $this->tabs($depth - 1);
    }
}