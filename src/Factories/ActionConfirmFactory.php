<?php


namespace Slack\Factories;


use InvalidArgumentException;
use Slack\Entities\ActionConfirm;

class ActionConfirmFactory
{
    public static function createFromArray(array $params):ActionConfirm
    {
        $confirm = new ActionConfirm();
        if (isset($params['title'])) {
            $confirm->setTitle($params['title']);
        } else {
            $message = "Field title can not be empty. Please set the title field";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['text'])) {
            $confirm->setText($params['text']);
        } else {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['ok_text'])) {
            $confirm->setOkText($params['ok_text']);
        } else {
            $message = "Field ok_text can not be empty. Please set the ok_text field";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['dismiss_text'])) {
            $confirm->setDismissText($params['dismiss_text']);
        } else {
            $message = "Field dismiss_text can not be empty. Please set the dismiss_text field";
            throw new InvalidArgumentException($message);
        }
        return $confirm;
    }

    public static function toArray(ActionConfirm $confirm):array
    {
        $params = [];
        $title = $confirm->getTitle();
        if (!empty($title)) {
            $params['title'] = $title;
        } else {
            $message = "Field title can not be empty. Please set the title field";
            throw new InvalidArgumentException($message);
        }

        $text = $confirm->getText();
        if (!empty($text)) {
            $params['text'] = $text;
        } else {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message);
        }

        $okText = $confirm->getOkText();
        if (!empty($okText)) {
            $params['ok_text'] = $okText;
        } else {
            $message = "Field ok_text can not be empty. Please set the ok_text field";
            throw new InvalidArgumentException($message);
        }

        $dismissText = $confirm->getDismissText();
        if (!empty($dismissText)) {
            $params['dismiss_text'] = $dismissText;
        } else {
            $message = "Field dismiss_text can not be empty. Please set the dismiss_text field";
            throw new InvalidArgumentException($message);
        }
        return $params;
    }
}