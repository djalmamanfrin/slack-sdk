<?php


namespace Tests\Factories;


use DateTime;

class FactoryHelper
{
    public static function getActionConfirm(): array
    {
        return [
            "title" => "Are you sure?",
            "text" => "Would not you prefer a good game of chess?",
            "ok_text" => "Yes",
            "dismiss_text" => "No"
        ];
    }

    public static function getActions(): array
    {
        return [
            [
                "name" => "game",
                "text" => "Chess",
                "type" => "button",
                "value" => "chess"
            ],
            [
                "name" => "game",
                "text" => "Thermonuclear War",
                "style" => "danger",
                "type" => "button",
                "value" => "war",
                "confirm" => self::getActionConfirm()
            ]
        ];
    }

    public static function getFields()
    {
        return [
            [
                "title" => "Priority",
                "value" => "High",
                "short" => false
            ],
            [
                "title" => "Danger",
                "value" => "Medium",
                "short" => false
            ]
        ];
    }

    public static function getAttachments()
    {
        return [
            [
                "fallback" => "Required plain-text summary of the attachment.",
                "color" => "#36a64f",
                "pretext" => "Optional text that appears above the attachment block",
                "author_name" => "Bobby Tables",
                "author_link" => "http://flickr.com/bobby/",
                "author_icon" => "http://flickr.com/icons/bobby.jpg",
                "title" => "Slack API Documentation",
                "title_link" => "https://api.slack.com/",
                "text" => "Optional text that appears within the attachment",
                "image_url" => "http://my-website.com/path/to/image.jpg",
                "thumb_url" => "http://example.com/path/to/thumb.png",
                "footer" => "Slack API",
                "footer_icon" => "https://platform.slack-edge.com/img/default_application_icon.png",
                "ts" => new DateTime()
            ],
            [
                "fallback" => "Required plain-text summary of the attachment.",
                "color" => "#36a64f",
                "pretext" => "Optional text that appears above the attachment block",
                "author_name" => "Bobby Tables",
                "author_link" => "http://flickr.com/bobby/",
                "author_icon" => "http://flickr.com/icons/bobby.jpg",
                "title" => "Slack API Documentation",
                "title_link" => "https://api.slack.com/",
                "text" => "Optional text that appears within the attachment",
                "image_url" => "http://my-website.com/path/to/image.jpg",
                "thumb_url" => "http://example.com/path/to/thumb.png",
                "footer" => "Slack API",
                "footer_icon" => "https://platform.slack-edge.com/img/default_application_icon.png",
                "ts" => new DateTime(),
                "fields" => self::getFields(),
                "actions" => self::getActions()
            ]
        ];
    }

    public static function getMessage()
    {
        return [
            "text" => "This is the text of message",
            "attachments" => self::getAttachments()
        ];
    }
}