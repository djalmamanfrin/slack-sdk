<?php

namespace MM\Notifier\Entities;

use DateTime;
use InvalidArgumentException;
use MM\Notifier\Factories\ActionFactory;
use MM\Notifier\Factories\FieldFactory;

class Attachment
{
    /** @var string $fallback */
    protected $fallback;

    /** @var string $text */
    protected $text;

    /** @var string $imageUrl */
    protected $imageUrl;

    /** @var string $thumbUrl */
    protected $thumbUrl;

    /** @var string $pretext */
    protected $pretext;

    /** @var string $title */
    protected $title;

    /** @var string $titleLink */
    protected $titleLink;

    /** @var string $authorName */
    protected $authorName;

    /** @var string $authorLink */
    protected $authorLink;

    /** @var string $authorIcon */
    protected $authorIcon;

    /** @var string $color */
    protected $color;

    /** @var string $footer */
    protected $footer;

    /** @var string $footerIcon */
    protected $footerIcon;

    /** @var DateTime $timestamp */
    protected $timestamp;

    /** @var Field[] $fields */
    protected $fields;

    /** @var array $markdownFields */
    protected $markdownFields;

    /** @var Action[] $actions */
    protected $actions;

    public function getFallback()
    {
        return $this->fallback;
    }

    public function setFallback(string $fallback)
    {
        $this->fallback = $fallback;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    public function setThumbUrl(string $thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;
    }

    public function getPretext()
    {
        return $this->pretext;
    }

    public function setPretext(string $pretext)
    {
        $this->pretext = $pretext;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitleLink()
    {
        return $this->titleLink;
    }

    public function setTitleLink(string $titleLink)
    {
        $this->titleLink = $titleLink;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAuthorName(string $authorName)
    {
        $this->authorName = $authorName;
    }

    public function getAuthorLink()
    {
        return $this->authorLink;
    }

    public function setAuthorLink(string $authorLink)
    {
        $this->authorLink = $authorLink;
    }

    public function getAuthorIcon()
    {
        return $this->authorIcon;
    }

    public function setAuthorIcon(string $authorIcon)
    {
        $this->authorIcon = $authorIcon;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function setFooter(string $footer)
    {
        $this->footer = $footer;
    }

    public function getFooterIcon()
    {
        return $this->footerIcon;
    }

    public function setFooterIcon(string $footerIcon)
    {
        $this->footerIcon = $footerIcon;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp->getTimestamp();
    }

    public function setTimestamp(DateTime $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getMarkdownFields(): array
    {
        return $this->markdownFields;
    }

    public function setMarkdownFields(array $markdownFields)
    {
        $this->markdownFields = $markdownFields;
    }

    public function getFields(): array
    {
        return FieldFactory::toArray($this->fields);
    }

    public function setFields(array $fields)
    {
        $this->fields = [];
        foreach ($fields as $field) {
            if ($field instanceof Field) {
                array_push($this->fields, $field);
                continue;
            }
            if (is_array($field) && !empty($field)) {
                $field = FieldFactory::createFromArray($field);
                array_push($this->fields, $field);
                continue;
            }

            $message = 'The parameter field must be an instance of Field or a keyed array';
            throw new InvalidArgumentException($message);
        }
    }

    public function getActions(): array
    {
        return ActionFactory::toArray($this->actions);
    }

    public function setActions(array $actions)
    {
        $this->actions = [];
        foreach ($actions as $action) {
            if ($action instanceof Action) {
                array_push($this->actions, $action);
                continue;
            }
            if (is_array($action) && !empty($action)) {
                $action = ActionFactory::createFromArray($action);
                array_push($this->actions, $action);
                continue;
            }

            $message = 'The parameter field must be an instance of Action or a keyed array';
            throw new InvalidArgumentException($message);
        }
    }
}