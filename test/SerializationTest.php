<?php

namespace test;

use PHPUnit_Framework_TestCase;
use DataStructure\Serialization\Serialize;

class SerializationTest extends PHPUnit_Framework_TestCase
{
    private $serialize;

    private $inputData = array(
        'name' => 'account',
        'attr' =>
            array(
                'id' => 123456
            ),
        'children' => array(
            array(
                'name' => 'name',
                'attr' => array(),
                'children' => array(
                    'BBC'
                ),
            ),
            array(
                'name' => 'monitors',
                'attr' => array(),
                'children' => array(
                    array(
                        'name' => "monitor",
                        'attr' => array(
                            'id' => 5235632
                        ),
                        'children' => array(
                            array(
                                'name' => "url",
                                'attr' => array(),
                                'children' => array(
                                    "http://www.bbc.co.uk/"
                                )
                            )
                        )
                    ),
                    array(
                        'name' => "monitor",
                        'attr' => array(
                            'id' => 5235633
                        ),
                        'children' => array(
                            array(
                                'name' => "url",
                                'attr' => array(),
                                'children' => array(
                                    "http://www.bbc.co.uk/news"
                                )
                            )
                        )
                    )
                )
            )
        )
    );

    private $expectedXML = '<account id="123456"><name>BBC</name><monitors><monitor id="5235632"><url>http://www.bbc.co.uk/</url></monitor><monitor id="5235633"><url>http://www.bbc.co.uk/news</url></monitor></monitors></account>';

    public function setUp()
    {
        $this->serialize = new Serialize($this->inputData);
    }

    public function testInputDataGenerateXML()
    {
        $actualXML = $this->serialize->intoXML(false);

        $this->assertEquals(
            $this->expectedXML,
            $actualXML
        );
    }
}
