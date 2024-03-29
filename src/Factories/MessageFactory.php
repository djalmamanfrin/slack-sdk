<?php

namespace Slack\Factories;

use InvalidArgumentException;
use Slack\Entities\Message;
use Slack\Enums\IconTypeEnum;

class MessageFactory
{
    public static function createFromArray(array $params): Message
    {
        $message = new Message();

        if (!isset($params['text'])) {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message, 422);
        }
        $message->setText($params['text']);

        if (isset($params['channel'])) {
            $message->setChannel($params['channel']);
        }

        if (isset($params['username'])) {
            $message->setUsername($params['username']);
        }

        if (isset($params['iconEmoji'])) {
            $message->setIconEmoji($params['iconEmoji']);
            $message->setIconType(IconTypeEnum::ICON_EMOJI);
        }

        if (isset($params['iconUrl'])) {
            $message->setIconUrl($params['iconUrl']);
            $message->setIconType(IconTypeEnum::ICON_URL);
        }

        $message->setAttachments([]);
        if (isset($params['attachments'])) {
            $message->setAttachments($params['attachments']);
        }
        return $message;
    }

    public static function toArray(Message $message): array
    {
        $response = [];

        $text = $message->getText();
        if (empty($text)) {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message, 422);
        }
        $response['text'] = $text;

        $channel = $message->getChannel();
        if (!empty($channel)) {
            $response['channel'] = $channel;
        }

        $username = $message->getUsername();
        if (!empty($username)) {
            $response['username'] = $username;
        }

        $iconType = $message->getIconType();
        if (!empty($iconType)) {
            IconTypeEnum::validate($iconType);
        }

        $iconUrl = $message->getIconUrl();
        if (!empty($iconUrl) && $iconType === IconTypeEnum::ICON_URL) {
            $response['icon_url'] = $iconUrl;
        }

        IconTypeEnum::validate($message->getIconType());

        $iconEmoji = $message->getIconEmoji();
        if (!empty($iconEmoji)) {
            $response['icon_emoji'] = $iconEmoji;
        }

        $attachments = $message->getAttachments();
        if (is_array($attachments) && count($attachments) > 0) {
            $response['attachments'] = $attachments;
        }
        return $response;
    }
}