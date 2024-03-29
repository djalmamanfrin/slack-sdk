<?php

namespace Slack\Entities;

use InvalidArgumentException;
use Slack\Enums\ButtonStyleEnum;
use Slack\Enums\ButtonTypeEnum;
use Slack\Factories\ActionConfirmFactory;

class Action
{
    /** @var string $name */
    protected $name;

    /** @var string $text */
    protected $text;

    /** @var string $style */
    protected $style;

    /** @var string $type */
    protected $type;

    /** @var string $value */
    protected $value;

    /** @var ActionConfirm $confirm */
    protected $confirm;

    public function getName():string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getText():string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setStyle(string $style)
    {
        $this->style = $style;
    }

    public function getType():string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getConfirm()
    {
        return  $this->confirm;
    }

    public function setConfirm(ActionConfirm $actionConfirm)
    {
        $this->confirm = $actionConfirm;
    }
}
