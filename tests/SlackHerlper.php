<?php

namespace Tests;

use DateTime;

class SlackHerlper
{
    public static function getOnlyATextMessage(): array
    {
        return ["text" => "This is a line of text.\nAnd this is another one."];
    }

    public static function getMessageWithSimpleAttachment(): array
    {
        return [
            "text" => "This is a line of text",
            "attachments" => [
                [
                    "text" => "And here’s an attachment!"
                ]
            ]
        ];
    }

    public static function getMessageWithTwoSimpleAttachment(): array
    {
        return [
            "text" => "This is the text of message",
            "attachments" => [
                [
                    "text" => "And here’s the first attachment!"
                ],
                [
                    "text" => "And here’s the second attachment!"
                ]
            ]
        ];
    }

    public static function getMessageWithFullAttachment(): array
    {
        return [
            "text" => "This is a line of text",
            "attachments" => [
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
                    "ts" => (new DateTime())->getTimestamp()
                ]
            ]
        ];
    }

    public static function getMessageWithAttachmentAndField(): array
    {
        return [
            "text" => "This is a line of text",
            "attachments" => [
                [
                    "text" => "And here’s an attachment!",
                    "fields" => [
                        [
                            "title" => "Priority",
                            "value" => "High",
                            "short" => false
                        ]
                    ]
                ]
            ]
        ];
    }

    public static function getMessageWithAttachmentAndTwoFields(): array
    {
        return [
            "text" => "This is a line of text",
            "attachments" => [
                [
                    "text" => "And here’s an attachment!",
                    "fields" => [
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
                    ]
                ]
            ]
        ];
    }

    public static function getMessageWithAttachmentAndAction(): array
    {
        return [
            "text" => "Would you like to play a game?",
            "attachments" => [
                [
                    "text" => "Choose a game to play",
                    "fallback" => "You are unable to choose a game",
                    "callback_id" => "wopr_game",
                    "color" => "#3AA3E3",
                    "attachment_type" => "default",
                    "actions" => [
                        [
                            "name" => "game",
                            "text" => "Chess",
                            "type" => "button",
                            "value" => "chess"
                       ]
                    ]
               ]
            ]
        ];
    }

    public static function getMessageWithAttachmentAndTwoActions(): array
    {
        return [
            "text" => "Would you like to play a game?",
            "attachments" => [
                [
                    "text" => "Choose a game to play",
                    "fallback" => "You are unable to choose a game",
                    "callback_id" => "wopr_game",
                    "color" => "#3AA3E3",
                    "attachment_type" => "default",
                    "actions" => [
                        [
                            "name" => "game",
                            "text" => "Chess",
                            "type" => "button",
                            "value" => "chess"
                        ],
                        [
                            "name" => "game",
                            "text" => "Falkens Maze",
                            "type" => "button",
                            "value" => "maze"
                        ]
                    ]
                ]
            ]
        ];
    }

    public static function getMessageWithAttachmentAndActionConfirm(): array
    {
        return [
            "text" => "Would you like to play a game?",
            "attachments" => [
                [
                    "text" => "Choose a game to play",
                    "fallback" => "You are unable to choose a game",
                    "callback_id" => "wopr_game",
                    "color" => "#3AA3E3",
                    "attachment_type" => "default",
                    "actions" => [
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
                            "confirm" => [
                                "title" => "Are you sure?",
                                "text" => "Wouldn't you prefer a good game of chess?",
                                "ok_text" => "Yes",
                                "dismiss_text" => "No"
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}