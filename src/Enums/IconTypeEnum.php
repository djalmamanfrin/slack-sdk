<?php

namespace Slack\Enums;

use InvalidArgumentException;
use ReflectionClass;

class IconTypeEnum
{
    const ICON_URL = 'icon_url';
    const ICON_EMOJI = 'icon_emoji';

    public static function all()
    {
        $reflector = new ReflectionClass(__CLASS__);
        return $reflector->getConstants();
    }

    public static function validate($type)
    {
        if (!array_key_exists(strtoupper($type), self::all())) {
            $message = "The iconType field is not found in IconTypeEnum class. So, the type informed (%s) is not allowed";
            throw new InvalidArgumentException(sprintf($message, $type));
        }
    }
}
