<?php


namespace Slack\Factories;


use InvalidArgumentException;
use Slack\Entities\Field;

class FieldFactory
{
    public static function createFromArray(array $params): Field
    {
        $field = new Field();
        if (!isset($params['title'])) {
            $message = "Field title can not be empty. Please set the title field";
            throw new InvalidArgumentException($message, 422);
        }
        $field->setTitle($params['title']);

        if (!isset($params['value'])) {
            $message = "Field value can not be empty. Please set the value field";
            throw new InvalidArgumentException($message, 422);
        }
        $field->setValue($params['value']);

        if (!isset($params['short'])) {
            $message = "Field short can be bool. Please set the short field correctly";
            throw new InvalidArgumentException($message, 422);
        }
        $field->setShort((bool) $params['short']);
        return $field;
    }

    public static function toArray(array $fields): array
    {
        $result = [];
        /** @var Field[] $fields */
        foreach ($fields as $field) {
            $params = [];
            $title = $field->getTitle();
            if (empty($title)) {
                $message = "Field title can not be empty. Please set the title field";
                throw new InvalidArgumentException($message, 422);
            }
            $params['title'] = $title;

            $value = $field->getValue();
            if (empty($value)) {
                $message = "Field value can not be empty. Please set the value field";
                throw new InvalidArgumentException($message, 422);
            }
            $params['value'] = $value;

            $short = $field->getShort();
            if (!is_bool($short)) {
                $message = "Field short can be bool. Please set the short field correctly";
                throw new InvalidArgumentException($message, 422);
            }
            $params['short'] = $short;
            array_push($result, $params);
        }
        return $result;
    }
}