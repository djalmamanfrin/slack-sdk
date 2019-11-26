<?php

namespace Slack\Entities;

use Slack\Factories\FieldFactory;

class Field
{
    /** @var string $title */
    protected $title;

    /** @var string $value */
    protected $value;

    /** @var bool $short */
    protected $short;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getShort()
    {
        return $this->short;
    }

    public function setShort(bool $short)
    {
        $this->short = $short;
    }
}
