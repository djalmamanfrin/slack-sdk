<?php

namespace Slack\Entities;

use InvalidArgumentException;
use Slack\Factories\AttachmentFactory;

class Message
{
    /** @var string $text */
    protected $text;

    /** @var string $channel */
    protected $channel;

    /** @var string $username */
    protected $username;

    /** @var string $iconType */
    protected $iconType;

    /** @var string $iconUrl */
    protected $iconUrl;

    /** @var string $iconEmoji */
    protected $iconEmoji;

    /** @var Attachment[] $attachments */
    protected $attachments;

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function setChannel(string $channel)
    {
        $this->channel = $channel;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getIconType()
    {
        return $this->iconType;
    }

    public function setIconType(string $iconType)
    {
        $this->iconType = $iconType;
    }

    public function getIconUrl()
    {
        return $this->iconUrl;
    }

    public function setIconUrl(string $icon)
    {
        $this->iconUrl = $icon;
    }

    public function getIconEmoji()
    {
        return $this->iconEmoji;
    }

    public function setIconEmoji(string $iconEmoji)
    {
        $this->iconEmoji = $iconEmoji;
    }

    public function getAttachments(): array
    {
        return AttachmentFactory::toArray($this->attachments);
    }

    public function setAttachments(array $attachments)
    {
        $this->attachments = [];
        foreach ($attachments as $attachment) {
            if ($attachment instanceof ActionConfirm) {
                array_push($this->attachments, $attachment);
                continue;
            }
            if (is_array($attachment) && !empty($attachment)) {
                $attachment = AttachmentFactory::createFromArray($attachment);
                array_push($this->attachments, $attachment);
                continue;
            }

            $message = 'The parameter field must be an instance of Attachment or a keyed array';
            throw new InvalidArgumentException($message);
        }
    }
}
