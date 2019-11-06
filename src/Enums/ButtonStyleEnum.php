<?php


namespace Slack\Enums;


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

    public static function validate($type)
    {
        return array_key_exists(strtoupper($type), self::all());
    }
}
