<?php

namespace MM\Notifier\Factories;

use InvalidArgumentException;
use MM\Notifier\Entities\Action;
use MM\Notifier\Entities\ActionConfirm;
use MM\Notifier\Enums\ButtonTypeEnum;

class ActionFactory
{
    public static function createFromArray(array $params): Action
    {
        $action = new Action();
        if (isset($params['name'])) {
            $action->setName($params['name']);
            $action->setType(ButtonTypeEnum::DEFAULT);
        } else {
            $message = "Field name can not be empty. Please fill the name field to create a Field Instance";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['text'])) {
            $action->setText($params['text']);
        } else {
            $message = "Field text can not be empty. Please fill the text field to create a Field Instance";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['style'])) {
            $action->setStyle($params['style']);
        }

        if (isset($params['value'])) {
            $action->setValue($params['value']);
        }

        if (ButtonTypeEnum::validate($params['type'])) {
            $action->setType($params['type']);
        }

        $action->setConfirm([]);
        if (isset($params['confirm'])) {
            $action->setConfirm($params['confirm']);
        }
        return $action;
    }

    public static function toArray(array $actions): array
    {
        $result = [];
        /** @var Action[] $actions */
        foreach ($actions as $action) {
            $params = [];
            $name = $action->getName();
            if (!empty($name)) {
                $params['name'] = $name;
            } else {
                $message = "Field name can not be empty. Please fill the name field to create a Field Instance";
                throw new InvalidArgumentException($message);
            }

            $text = $action->getText();
            if (!empty($text)) {
                $params['text'] = $text;
            } else {
                $message = "Field text can not be empty. Please fill the text field to create a Field Instance";
                throw new InvalidArgumentException($message);
            }

            $style = $action->getStyle();
            if (!empty($style)) {
                $params['style'] = $style;
            }

            $type = $action->getType();
            if (!empty($type)) {
                $params['type'] = $type;
            }

            $value = $action->getValue();
            if (!empty($value)) {
                $params['value'] = $value;
            }

            $confirm = $action->getConfirm();
            if ($confirm instanceof ActionConfirm) {
                $params['confirm'] = ActionConfirmFactory::toArray($confirm);;
            }
            array_push($result, $params);
        }
        return $result;
    }
}