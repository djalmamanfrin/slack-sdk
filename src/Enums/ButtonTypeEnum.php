<?php

namespace Slack\Enums;

use InvalidArgumentException;
use ReflectionClass;

class ButtonTypeEnum
{
    const BUTTON = 'button';
    const SELECT = 'select';

    public static function all()
    {
        $reflector = new ReflectionClass(__CLASS__);
        return $reflector->getConstants();
    }

    public static function validate($type)
    {
        return array_key_exists(strtoupper($type), self::all());
    }
}
