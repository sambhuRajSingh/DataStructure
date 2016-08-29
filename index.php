<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require 'vendor/autoload.php';

    use DataStructure\Serialization\Serialize;

    $inputData = array (
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

    $serialize = new Serialize($inputData);

    echo $serialize->intoXML();

