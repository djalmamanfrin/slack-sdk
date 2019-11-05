<?php

namespace Slack\Factories;

use DateTime;
use InvalidArgumentException;
use Slack\Entities\Attachment;

class AttachmentFactory
{
    public static function createFromArray(array $params): Attachment
    {
        $attachment = new Attachment();
        if (isset($params['fallback'])) {
            $attachment->setFallback($params['fallback']);
        }
        if (isset($params['text'])) {
            $attachment->setText($params['text']);
        } else {
            $message = "Field text can not be empty. Please fill the text field";
            throw new InvalidArgumentException($message);
        }

        if (isset($params['image_url'])) {
            $attachment->setImageUrl($params['image_url']);
        }

        if (isset($params['thumb_url'])) {
            $attachment->setThumbUrl($params['thumb_url']);
        }

        if (isset($params['pretext'])) {
            $attachment->setPretext($params['pretext']);
        }

        if (isset($params['color'])) {
            $attachment->setColor($params['color']);
        }

        if (isset($params['footer'])) {
            $attachment->setFooter($params['footer']);
        }

        if (isset($params['footer_icon'])) {
            $attachment->setFooterIcon($params['footer_icon']);
        }

        if (isset($params['ts'])) {
            $attachment->setTimestamp($params['ts']);
        } else {
            $attachment->setTimestamp(new DateTime());
        }

        $attachment->setMarkdownFields([]);
        if (isset($params['mrkdwn_in'])) {
            $attachment->setMarkdownFields($params['mrkdwn_in']);
        }

        if (isset($params['title'])) {
            $attachment->setTitle($params['title']);
        }

        if (isset($params['title_link'])) {
            $attachment->setTitleLink($params['title_link']);
        }

        if (isset($params['author_name'])) {
            $attachment->setAuthorName($params['author_name']);
        }

        if (isset($params['author_link'])) {
            $attachment->setAuthorLink($params['author_link']);
        }
        if (isset($params['author_icon'])) {
            $attachment->setAuthorIcon($params['author_icon']);
        }

        $attachment->setActions([]);
        if (isset($params['actions'])) {
            $attachment->setActions($params['actions']);
        }

        $attachment->setFields([]);
        if (isset($params['fields'])) {
            $attachment->setFields($params['fields']);
        }
        return $attachment;
    }

    public static function toArray(array $attachments): array
    {
        $result = [];
        /** @var Attachment[] $attachments */
        foreach ($attachments as $attachment) {
            $params = [];
            $fallback = $attachment->getFallback();
            if (!empty($fallback)) {
                $params['fallback'] = $fallback;
            }

            $text = $attachment->getText();
            if (!empty($text)) {
                $params['text'] = $text;
            } else {
                $message = "Field callback can not be empty. Please fill the callback field";
                throw new InvalidArgumentException($message);
            }

            $imageUrl = $attachment->getImageUrl();
            if (!empty($imageUrl)) {
                $params['image_url'] = $imageUrl;
            }

            $thumbUrl = $attachment->getThumbUrl();
            if (!empty($thumbUrl)) {
                $params['thumb_url'] = $thumbUrl;
            }

            $preText = $attachment->getPretext();
            if (!empty($preText)) {
                $params['pretext'] = $preText;
            }

            $color = $attachment->getColor();
            if (!empty($color)) {
                $params['color'] = $color;
            }
            $footer = $attachment->getFooter();
            if (!empty($footer)) {
                $params['footer'] = $footer;
            }
            $footerIcon = $attachment->getFooterIcon();
            if (!empty($footerIcon)) {
                $params['footer_icon'] = $footerIcon;
            }
            $timestamp = $attachment->getTimestamp();
            if (!empty($timestamp)) {
                $params['ts'] = $timestamp;
            }

            $mrkdwnIn = $attachment->getMarkdownFields();
            if (!empty($mrkdwnIn)) {
                $params['mrkdwn_in'] = $mrkdwnIn;
            }
            $title = $attachment->getTitle();
            if (!empty($title)) {
                $params['title'] = $title;
            }
            $titleLink = $attachment->getTitleLink();
            if (!empty($titleLink)) {
                $params['title_link'] = $titleLink;
            }
            $authorName = $attachment->getAuthorName();
            if (!empty($authorName)) {
                $params['author_name'] = $authorName;
            }
            $authorLink = $attachment->getAuthorLink();
            if (!empty($authorLink)) {
                $params['author_link'] = $authorLink;
            }
            $authorIcon = $attachment->getAuthorIcon();
            if (!empty($authorIcon)) {
                $params['author_icon'] = $authorIcon;
            }

            $actions = $attachment->getActions();
            if (is_array($actions) && count($actions) > 0) {
                $params['actions'] = $actions;
            }

            $fields = $attachment->getFields();
            if (is_array($fields) && count($fields) > 0) {
                $params['fields'] = $fields;
            }
            array_push($result, $params);
        }
        return $result;
    }
}