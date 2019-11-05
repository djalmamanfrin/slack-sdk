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

    public function getTitle():string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getShort(): bool
    {
        return is_bool($this->short) ?: false;
    }

    public function setShort(string $value)
    {
        $this->short = (bool) $value;
    }
}
