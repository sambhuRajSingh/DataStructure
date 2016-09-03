<?php

namespace DataStructure\Serialization\Contracts;

use DataStructure\Serialization\Contracts\Parsable;

interface Serializable
{
    public function output(Parsable $parsable);
}
