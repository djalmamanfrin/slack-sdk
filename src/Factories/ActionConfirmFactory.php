<?php


namespace Slack\Factories;


use InvalidArgumentException;
use Slack\Entities\ActionConfirm;

class ActionConfirmFactory
{
    public static function createFromArray(array $params):ActionConfirm
    {
        $confirm = new ActionConfirm();
        if (!isset($params['text'])) {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message, 422);
        }
        $confirm->setText($params['text']);

        if (isset($params['title'])) {
            $confirm->setTitle($params['title']);
        }
        if (isset($params['ok_text'])) {
            $confirm->setOkText($params['ok_text']);
        }
        if (isset($params['dismiss_text'])) {
            $confirm->setDismissText($params['dismiss_text']);
        }
        return $confirm;
    }

    public static function toArray(ActionConfirm $confirm):array
    {
        $params = [];
        $text = $confirm->getText();
        if (empty($text)) {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message, 422);
        }
        $params['text'] = $text;

        $title = $confirm->getTitle();
        if (!empty($title)) {
            $params['title'] = $title;
        }
        $okText = $confirm->getOkText();
        if (!empty($okText)) {
            $params['ok_text'] = $okText;
        }
        $dismissText = $confirm->getDismissText();
        if (!empty($dismissText)) {
            $params['dismiss_text'] = $dismissText;
        }
        return $params;
    }
}