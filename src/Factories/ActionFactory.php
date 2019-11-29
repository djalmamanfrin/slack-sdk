<?php

namespace Slack\Factories;

use InvalidArgumentException;
use Slack\Entities\Action;
use Slack\Entities\ActionConfirm;
use Slack\Enums\ButtonStyleEnum;
use Slack\Enums\ButtonTypeEnum;

class ActionFactory
{
    public static function createFromArray(array $params): Action
    {
        $action = new Action();
        if (!isset($params['name'])) {
            $message = "Field name can not be empty. Please fill the name field to create a Field Instance";
            throw new InvalidArgumentException($message, 422);
        }
        $action->setName($params['name']);

        if (!isset($params['text'])) {
            $message = "Field text can not be empty. Please fill the text field to create a Field Instance";
            throw new InvalidArgumentException($message, 422);
        }
        $action->setText($params['text']);

        if (isset($params['type'])) {
            ButtonTypeEnum::validate($params['type']);
            $action->setType($params['type']);
        }
        if (isset($params['style'])) {
            ButtonStyleEnum::validate($params['style']);
            $action->setStyle($params['style']);
        }
        if (isset($params['value'])) {
            $action->setValue($params['value']);
        }
        if (isset($params['confirm']) && $params['confirm'] instanceof ActionConfirm) {
            $action->setConfirm($params['confirm']);
        } elseif (isset($params['confirm']) && is_array($params['confirm'])) {
            $actionConfirm = ActionConfirmFactory::createFromArray($params['confirm']);
            $action->setConfirm($actionConfirm);
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
            if (empty($name)) {
                $message = "Field name can not be empty. Please fill the name field to create a Field Instance";
                throw new InvalidArgumentException($message);
            }
            $params['name'] = $name;

            $text = $action->getText();
            if (empty($text)) {
                $message = "Field text can not be empty. Please fill the text field to create a Field Instance";
                throw new InvalidArgumentException($message);
            }
            $params['text'] = $text;

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
                $params['confirm'] = ActionConfirmFactory::toArray($confirm);
            }
            array_push($result, $params);
        }
        return $result;
    }
}