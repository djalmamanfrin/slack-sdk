<?php


namespace Slack\Enums;


use InvalidArgumentException;
use ReflectionClass;

class ButtonStyleEnum
{
    const DEFAULT = 'default';
    const PRIMARY = 'primary';
    const DANGER = 'danger';

    public static function all()
    {
        $reflector = new ReflectionClass(__CLASS__);
        return $reflector->getConstants();
    }

    public static function validate(string $type)
    {
        if (!array_key_exists(strtoupper($type), self::all())) {
            $message = "The style field is not found in IconTypeEnum class. So, the style informed (%s) is not allowed";
            throw new InvalidArgumentException(sprintf($message, $type), 422);
        }
    }
}
