<?php


namespace Slack\Factories;


use InvalidArgumentException;
use Slack\Entities\Field;

class FieldFactory
{
    public static function createFromArray(array $params): Field
    {
        $field = new Field();
        if (isset($params['title'])) {
            $field->setTitle($params['title']);
        } else {
            $message = "Field title can not be empty. Please set the title field";
            throw new InvalidArgumentException($message, 422);
        }

        if (isset($params['value'])) {
            $field->setValue($params['value']);
        } else {
            $message = "Field value can not be empty. Please set the value field";
            throw new InvalidArgumentException($message, 422);
        }

        if (isset($params['short'])) {
            $field->setShort((bool) $params['short']);
        } else {
            $message = "Field short can be bool. Please set the short field correctly";
            throw new InvalidArgumentException($message, 422);
        }
        return $field;
    }

    public static function toArray(array $fields): array
    {
        $result = [];
        /** @var Field[] $fields */
        foreach ($fields as $field) {
            $params = [];
            $title = $field->getTitle();
            if (!empty($title)) {
                $params['title'] = $title;
            } else {
                $message = "Field title can not be empty. Please set the title field";
                throw new InvalidArgumentException($message, 422);
            }

            $value = $field->getValue();
            if (!empty($value)) {
                $params['value'] = $value;
            } else {
                $message = "Field value can not be empty. Please set the value field";
                throw new InvalidArgumentException($message, 422);
            }

            $short = $field->getShort();
            if (is_bool($short)) {
                $params['short'] = $short;
            } else {
                $message = "Field short can be bool. Please set the short field correctly";
                throw new InvalidArgumentException($message, 422);
            }
            array_push($result, $params);
        }
        return $result;
    }
}