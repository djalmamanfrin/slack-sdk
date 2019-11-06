<?php

namespace Tests;

use Slack\Factories\MessageFactory;
use Slack\Slack;
use Tests\Factories\FactoryHelper;

class SlackTest extends \PHPUnit\Framework\TestCase
{
    /** @var Slack $slack */
    private $slack;

    public function setUp(): void
    {
        parent::setUp();
        $url = getenv('SLACK_END_POINT');
        $this->slack = new Slack($url);
    }

    public function testInstantiation()
    {
        $this->assertInstanceOf(Slack::class, $this->slack);
    }

    /**
     * ATENTION: This test need a webhook to run. So i recommend to run in your local environment
     */
//    public function testSendAFullMessage()
//    {
//        $payload = FactoryHelper::getMessage();
//        $message = MessageFactory::createFromArray($payload);
//        $result = $this->slack->send($message);
//        self::assertTrue($result);
//    }
}