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

        if (isset($params['text'])) {
            $message->setText($params['text']);
        } else {
            $message = "Field text can not be empty. Please set the text field";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['channel'])) {
            $message->setChannel($params['channel']);
        }

        if (isset($params['username'])) {
            $message->setUsername($params['username']);
        }

        if (isset($params['iconEmoji']) && $params['iconType'] == IconTypeEnum::ICON_EMOJI) {
            $message->setIconEmoji($params['iconEmoji']);
            $message->setIconType(IconTypeEnum::ICON_EMOJI);
        }

        if (isset($params['iconUrl']) && $params['iconType'] == IconTypeEnum::ICON_URL) {
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
        if (!empty($text)) {
            $response['text'] = $text;
        } else {
            throw new InvalidArgumentException("Field text can not be empty. Please fill callback text field");
        }

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

        $iconEmoji = $message->getIconEmoji();
        if (!empty($iconEmoji) && $iconType === IconTypeEnum::ICON_EMOJI) {
            $response['icon_emoji'] = $iconEmoji;
        }

        $attachments = $message->getAttachments();
        if (is_array($attachments) && count($attachments) > 0) {
            $response['attachments'] = $attachments;
        }
        return $response;
    }
}