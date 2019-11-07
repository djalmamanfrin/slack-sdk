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

    public static function validate(string $type)
    {
        if (!array_key_exists(strtoupper($type), self::all())) {
            $message = "The type field is not found in IconTypeEnum class. So, the type informed (%s) is not allowed";
            throw new InvalidArgumentException(sprintf($message, $type), 422);
        }
    }
}
