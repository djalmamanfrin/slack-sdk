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
            $message = "Field short can not be empty. Please fill the short field to create a Field Instance";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['value'])) {
            $field->setValue($params['value']);
        } else {
            $message = "Field short can not be empty. Please fill the short field to create a Field Instance";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['short'])) {
            $field->setShort($params['short']);
        } else {
            $message = "Field short can not be empty. Please fill the short field to create a Field Instance";
            throw new InvalidArgumentException($message);
        }
        return $field;
    }

    public static function toArray(array $fields): array
    {
        $result = [];
        /** @var Field[] $fields */
        foreach ($fields as $field) {
            $params = [];
            $tittle = $field->getTitle();
            if (!empty($tittle)) {
                $params['tittle'] = $tittle;
            } else {
                $message = "Field tittle can not be empty. Please set the tittle field";
                throw new InvalidArgumentException($message);
            }

            $value = $field->getValue();
            if (!empty($value)) {
                $params['value'] = $value;
            } else {
                $message = "Field value can not be empty. Please set the value field";
                throw new InvalidArgumentException($message);
            }

            $short = $field->getShort();
            if (!empty($short)) {
                $params['short'] = $short;
            } else {
                $message = "Field short can not be empty. Please set the short field";
                throw new InvalidArgumentException($message);
            }
            array_push($result, $params);
        }
        return $result;
    }
}