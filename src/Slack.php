<?php

namespace MM\Notifier;

use MM\Notifier\Entities\Message;
use MM\Notifier\Factories\MessageFactory;

class Slack
{
    /** @var string */
    protected $endpoint;

    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function send(Message $message):bool
    {
        try {
            $json = json_encode(MessageFactory::toArray($message));
            $command = "curl -X POST -H 'Content-type: application/json' --data '";
            $command .= $json . "' " . $this->endpoint;
            $response = shell_exec($command);
            $response = ("ok" === $response) ?: false;
        } catch (\Exception $e) {
            $response = false;
        }
        return $response;
    }
}
