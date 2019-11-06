<?php

namespace Slack\Entities;

class ActionConfirm
{
    /** @var string $title */
    protected $title;

    /** @var string $text */
    protected $text;

    /** @var string $okText */
    protected $okText;

    /** @var string $dismissText */
    protected $dismissText;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getText():string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getOkText()
    {
        return $this->okText;
    }

    public function setOkText(string $okText)
    {
        $this->okText = $okText;
    }

    public function getDismissText()
    {
        return $this->dismissText;
    }

    public function setDismissText(string $dismissText)
    {
        $this->dismissText = $dismissText;
    }
}
