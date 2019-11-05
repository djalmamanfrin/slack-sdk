<?php

namespace MM\Notifier;

use MM\Notifier\Entities\Message;
use MM\Notifier\Factories\MessageFactory;

class Slack
{
    /**
     * The Slack incoming webhook endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Instantiate a new Slack.
     *
     * @param string $endpoint
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function send(Message $message):bool
    {
        // ok
        // invalid_payload
        //
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
