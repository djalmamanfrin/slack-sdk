<?php

namespace MM\Notifier\Entities;

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

    public function getTitle():string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function getText():string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    public function getOkText():string
    {
        return $this->okText;
    }

    public function setOkText(string $okText)
    {
        $this->okText = $okText;
        return $this;
    }

    public function getDismissText():string
    {
        return $this->dismissText;
    }

    public function setDismissText(string $dismissText)
    {
        $this->dismissText = $dismissText;
        return $this;
    }
}
